<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Mail\AdminUpdateMail;
use App\Mail\TeacherCreatedMail;
use App\Models\Branches;
use App\Models\Subjects;
use App\Models\Tuitions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Symfony\Contracts\Service\Attribute\Required;
use App\Http\Services\PermissionService;
use App\Models\Levels;

class AdminController extends Controller
{
    public function index(){
     $admins = User::with('branch')->where('role','admin')->get();
    return view('admin.index',compact('admins'));
}
    public function teacher(){
        $branch = Branches::where('id',Auth::user()->branch_id)->first();
        if ($branch) {
            if(Auth::user()->role == 'super') {
        $teachers = User::with('branch')->where('role','teacher')->get();
        } else {
        $teachers = User::with('branch')->where('role','teacher')->where('branch_id',Auth::user()->branch_id)->get();
        }
        $uuid = $branch->uuid;
        return view('teacher.index',compact('teachers','uuid'));
     }
}
    //
    public function register(){
        $branch = Branches::where('status',1)->where('super',0)->get();
        return view('admin.register',compact('branch'));
    }

    public function adminStore(Request  $request, PermissionService $permissionService)
    {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'branch' => 'required',
            ]);
            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
            }    
            if ($validated) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $plainPassword = $request->password;
                $user->password = Hash::make($plainPassword);
                $user->branch_id = $request->branch;
                $user->role_description = $request->role_description;
                $user->note = $request->note;
                $user->role = 'admin';
                $user->save();
                $permissionService->assignPermissions($user->id, $user->role);
                $branch = Branches::find($user->branch_id);
                Mail::to($user->email)->send(new AdminCreatedMail($user, $plainPassword,$branch->branch));
                return redirect('admin')->with('success', 'Admin Account created successfully.');
            } else {

                return redirect()->back()->withErrors($validated)->withInput();
            }
    }

    public function edit($id)    {
        $admin = User::find($id);
        if ($admin) {
            $branch =  Branches::orderBy('id','desc')->get();
            $subject = subjects::all();
            return view('admin.edit', compact('subject','admin','branch'));
        }else{
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
                Mail::to($user->email)->send(new AdminUpdateMail($user, $plainPassword, $branch->branch));
    return redirect('admin')->with('success', 'Admin account updated successfully.');
    }


    public function teacherCreate($uuid){
        $branch = Branches::where('uuid',$uuid)->first();
        if ($branch) {
            # code...

            $subjects = Subjects::all();
             return view('teacher.create',compact('subjects','branch'));
            }else{
                abort('404');

        }
    }

    public function teacherEdit($id){
        $user = User::find($id);
        return view('teacher.edit',compact('user'));
    }
    public function teacherStore(Request $request,PermissionService $permissionService)
{
    $validated = $request->validate([
        'name' => 'required',
        'branch_id' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required|min:5',
        'cnic' => 'required',
        'qualification' => 'required',
        'experience' => 'required',
        'subject' => 'required|array',
        'availability' => 'required',
        'resume' => 'required',
        'payment_information' => 'required',
        'date_of_birth' => 'required|date', 
        'city' => 'required|string|max:255',
    ]);
    if (User::where('email', $request->email)->exists()) {
        return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
    }

    if ($validated) {
        $file = null;
        if ($request->hasFile('resume')) {
            $document = $request->file('resume');
            $name = now()->format('Y-m-d_H-i-s') . '-cv';
            $file = $name . '.' . $document->getClientOriginalExtension();
            $targetDir = public_path('./files');
            $document->move($targetDir, $file);
        }

        $user = new User();
        $user->name = $request->name;
        $user->branch_id = $request->branch_id;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $plainPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()'), 0, 12);
        $user->password = Hash::make($plainPassword);
        $user->cnic = $request->cnic;
        $user->experience = $request->experience;
        $user->availability = $request->availability;
        $user->payment_information = $request->payment_information;
        $user->note = $request->note;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->city = $request->city;
        $user->status = 1;
        $user->subject = json_encode($request->subject);
        $user->resume = $file;
        $user->role = 'teacher';
        $user->save();
        $permissionService->assignPermissions($user->id, $user->role);
        Mail::to($user->email)->send(new TeacherCreatedMail($user, $plainPassword));

        return redirect('teacher')->with('success', 'Teacher Account created successfully.');
    } else {
        return redirect()->back()->withErrors($validated)->withInput();
    }
}

    public function adminDelete($id)    {
        $user = User::find($id);
        if (@$user) {
            $user->delete();
            return redirect()->back()->with('success', 'Admin delete successfully');
        }
    }

#############################################################################
// ************************************* Tuition *****************************
#############################################################################
public function tuitionShow(){
    $tuitions = Tuitions::when(Auth::user()->role !== 'super', function ($query) {
        return $query->where('branch_id', Auth::user()->branch_id);
    })->get();

 return view('tuition.index',compact('tuitions'));
}
public function tuitionEdit($id){
    $tuition = Tuitions::find($id);
    if ($tuition) {
        # code...
        $branch = Branches::where('status',1)->where('super',0)->get();
        return view('tuition.edit',compact('tuition','branch'));
    }else{
        abort('404');
    }
}


public function tuitionCreate(){
    $level = Levels::get();
    $branch = Branches::where('status',1)->where('super',0)->get();
    return view('tuition.create',compact('branch','level'));

}

public function tuitionStore(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'branch' => 'required',
        'price' => 'required',
        'type' => 'required',
        'status' => 'required',
        'level_id' => 'required',
    ]);
    if ($validated) {
        $tuition = new Tuitions();
        $tuition->user_id = Auth::id();
        $tuition->name = $request->input('name');
        $tuition->branch_id  = $request->input('branch');
        $tuition->price = $request->input('price');
        $tuition->type = $request->input('type');
        $tuition->status = $request->input('status');
        $tuition->year = $request->input('year');
        $tuition->level_id = $request->input('level_id');
        $tuition->save();
        return redirect('tuitions')->with('success', 'Tuition Package Add  successfully.');
    } else {
        return redirect()->back()->withErrors($validated)->withInput();
    }
}

public function tuitionUpdate(Request $request){
    $validated = $request->validate([
        'id' => 'required',
        'name' => 'required',
        'branch' => 'required',
        'price' => 'required',
        'type' => 'required',
        'status' => 'required',
    ]);
    if ($validated) {
        $id = $request->input('id');
        $tuition = Tuitions::find($id);
        if ($tuition) {
            # code...
            $tuition->name = $request->input('name');
            $tuition->branch_id  = $request->input('branch');
            $tuition->price = $request->input('price');
            $tuition->type = $request->input('type');
            $tuition->status = $request->input('status');
            $tuition->year = $request->input('year');
            $tuition->user_id = Auth::id();
            $tuition->save();
            return redirect('tuitions')->with('success', 'Tuition Package Update  successfully.');
        }else{
            return redirect('tuitions')->with('error', 'Tuitions Not Found.');

        }
    } else {
        return redirect()->back()->withErrors($validated)->withInput();
    }
}

public function tuitionDelete($id){
    $tuition = Tuitions::find($id);
    if ($tuition) {
        $tuition->delete();
        return redirect()->back()->with('success', 'Subject status deleted');
    }else {
        abort('404');
    }
}

public function student(){
    return view('student.edit');
}



}
