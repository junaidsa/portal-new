<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Models\Branches;
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

class AdminController extends Controller
{
    public function index(){
     $admins = User::with('branch')->where('role','admin')->get();
    return view('admin.index',compact('admins'));
}
    public function teacher(){
     $teacher = User::with('branch')->where('role','teacher')->get();
    return view('teacher.index',compact('teacher'));
}
    //
    public function register(){
        $branch = Branches::where('status',1)->get();
        return view('admin.register',compact('branch'));
    }

    public function adminStore(Request  $request)
    {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email:unique:users,email',
                'password' => 'required|min:5',
                'branch' => 'required',
            ]);
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
                $branch = Branches::find($user->branch_id);
                Mail::to($user->email)->send(new AdminCreatedMail($user, $plainPassword,$branch->branch));
                return redirect('admin')->with('success', 'Admin Account created successfully.');
            } else {

                return redirect()->back()->withErrors($validated)->withInput();
            }
    }


    public function teacherCreate(){
        return view('teacher.create');
    }

}
