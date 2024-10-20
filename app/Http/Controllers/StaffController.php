<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Mail\StaffMail;
use App\Models\Branches;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    //
    public function index(){
        $staffs = User::with('branch')
        ->where('role', 'staff')
        ->when(Auth::user()->role !== 'super', function ($query) {
            return $query->where('branch_id', Auth::user()->branch_id);
        })
        ->get();
       return view('staff.index',compact('staffs'));
   }
    public function create(){
        $branch = Branches::where('status',1)->get();
       return view('staff.create',compact('branch'));
   }
   public function edit($id)    {
        $staffs = User::find($id);
        if ($staffs) {
            $branch =  Branches::orderBy('id','desc')->get();
            return view('staff.edit', compact('staffs','branch'));
        }else{
            abort('404');
        }
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'cnic' => 'required',
        ]);

        // Check if the email already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
        }

        $branch = $request->input('branch');

        if (blank($branch)) {
            if (Auth::check()) {
                $branch = Auth::user()->branch_id;
            } else {
                throw new \Exception('No authenticated user to retrieve branch information');
            }
        }

        $staff = new User();
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->branch_id = $branch;
        $staff->cnic = $request->input('cnic');
        $plainPassword = $request->password;
        $staff->password = Hash::make($plainPassword);
        $staff->status = 1;
        $staff->user_id = Auth::id();
        $staff->role = 'staff';
        $staff->role_description = $request->role_description;
        $staff->save();

        $branch = Branches::find($staff->branch_id);
        Mail::to($staff->email)->send(new StaffMail($staff, $plainPassword, $branch->branch));
        return redirect('staffs')->with('success', 'Staff Account created successfully.');
    }


public function delete($id){
    $tuition = User::find($id);
    if ($tuition) {
        $tuition->delete();
        return redirect()->back()->with('success', 'Staff Deleted successfully');
    }else {
        abort('404');
    }
}
public function update(Request $request){
    $id = $request->id;
    $validated = $request->validate([
        'name' => 'required',
        'id' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:5',
        'branch' => 'required',
    ]);

    if ($validated) {
       $user =  User::find($id);
       if ($user) {
        $user->name = $request->name;
        $user->email = $request->email;
       }
       if ($request->filled('password')) {
        $plainPassword = $request->password;
        $user->password = Hash::make($plainPassword);
    }
    $user->branch_id = $request->branch;
    $user->role_description = $request->role_description;
    $user->note = $request->note;
    }
        $user->save();
            $branch = Branches::find($user->branch_id);
            // Mail::to($user->email)->send(new AdminUpdateMail($user, $plainPassword, $branch->branch));

// Redirect back with a success message
return redirect('staffs')->with('success', 'Staff account updated successfully.');
}
}

