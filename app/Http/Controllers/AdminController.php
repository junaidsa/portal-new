<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminCreatedMail;
use App\Mail\AdminUpdateMail;

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
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Symfony\Contracts\Service\Attribute\Required;
use App\Http\Services\PermissionService;
use App\Mail\ResetPasswordEmail;
use App\Models\Levels;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::with('branch')->where('role', 'admin')->orderBy('id', 'desc')->get();
        return view('admin.index', compact('admins'));
    }
    public function teacher()
    {
        $branch = Branches::find(Auth::user()->branch_id);
        if ($branch) {
            $teachers = User::with('branch')
                ->where('role', 'teacher')
                ->when(Auth::user()->role !== 'super', function ($query) {
                    $query->where('branch_id', Auth::user()->branch_id);
                })
                ->get();
            $uuid = $branch->uuid;
            return view('teacher.index', compact('teachers', 'uuid'));
        } else {
            abort(404, 'Branch not found');
        }
    }


    public function register()
    {
        $branch = Branches::where('status', 1)->where('super', 0)->get();
        return view('admin.register', compact('branch'));
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
            Mail::to($user->email)->send(new AdminCreatedMail($user, $plainPassword, $branch->branch));
            $data = [
                'user_id' => Auth::user()->id,
                'branch_id' => 1,
                'title' => "Admin Account Created",
                'message' => "A new admin account for {$user->name} has been assign in the {$branch->branch} branch.",
            ];
            $this->createNotification($data);
            return redirect('admin')->with('success', 'Admin Account created successfully.');
        } else {

            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function edit($id)
    {
        $admin = User::find($id);
        if ($admin) {
            $branch =  Branches::orderBy('id', 'desc')->get();
            $subject = subjects::all();
            return view('admin.edit', compact('subject', 'admin', 'branch'));
        } else {
            abort('404');
        }
    }

    public function update(Request $request)
    {
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
        if(Auth::check()){
            return redirect('admin')->with('success', 'Admin account updated successfully.');
        }else{
            return redirect()->back()->with('success', 'Your Account has been Created .Please check your email.');
        }
 
    }
    public function adminDelete($id)
    {
        $user = User::find($id);
        if (@$user) {
            $user->delete();
            return redirect()->back()->with('success', 'Admin delete successfully');
        }
    }
    public function student()
    {
        return view('student.edit');
    }
    public function forgotpassword()
    {
        return view('auth.forgot-password');
    }
    public function processForgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);
        if ($validator->fails()) {
            return redirect()->route('forgot.password')->withInput()->withErrors($validator);
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send Email Here
        $user = User::where('email', $request->email)->first();
        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'You have requested to Reset your password'
        ];
        Mail::to($request->email)->send(new ResetPasswordEmail($formData));
        return Redirect()->route('forgot.password')->with('success', 'Please check your Email inbox to reset your password');
    }
    public function resetPassword($token)
    {
        $tokenExist = DB::table('password_reset_tokens')->where('token', $token)->first();
        if ($tokenExist == null) {
            return redirect()->route('forgot.password')->with('error', 'Invalid Request');
        }

        return view('auth.reset_password', [
            'token' => $token
        ]);
    }
    public function processResetPassword(Request $request)
    {
        $token = $request->token;
        $tokenObj = DB::table('password_reset_tokens')->where('token', $token)->first();
        if ($tokenObj == null) {
            return redirect()->route('forgot.password')->with('error', 'Invalid Request');
        }
        $user = User::where('email', $tokenObj->email)->first();

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);
        if ($validator->fails()) {
            return redirect()->route('reset.password', $token)->withErrors($validator);
        }
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        return Redirect()->route('login')->with('success', 'You have successfully updated your password and are now logged in.');
    }
}
