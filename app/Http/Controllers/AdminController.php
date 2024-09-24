<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Mail\TeacherCreatedMail;
use App\Models\Branches;
use App\Models\Subjects;
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
     $teachers = User::with('branch')->where('role','teacher')->get();
    return view('teacher.index',compact('teachers'));
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
       $subjects = Subjects::all();
        return view('teacher.create',compact('subjects'));
    }


    public function teacherStore(Request  $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:unique:users,email',
            'phone_number' => 'required|min:5',
            'cnic' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'subject' => 'required|array',
            'availability' => 'required',
            'resume' => 'required',
            'payment_information' => 'required',
        ]);

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
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $plainPassword =  substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()'), 0, 12);
            $user->password = Hash::make($plainPassword);
            $user->cnic = $request->cnic;
            $user->experience = $request->experience;
            $user->availability = $request->availability;
            $user->payment_information = $request->payment_information;
            $user->note = $request->note;
            $user->address = $request->address;
            $user->status = 1;
            $user->subject =json_encode($request->subject);
            $user->resume = $file;
            $user->note = $request->note;
            $user->role = 'teacher';
            $user->user_id = Auth::id();
            $user->save();
            Mail::to($user->email)->send(new TeacherCreatedMail($user, $plainPassword));
            return redirect('teacher')->with('success', 'Teacher Account created successfully.');
        }else{
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }


    public function studentRegister(){
        return view('student.register');
    }

}
