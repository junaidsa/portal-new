<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }
        $profile = DB::table('users')
        ->where('users.id', $id)
        ->select('users.*')
        ->first();
        $levels = $profile->level ? json_decode($profile->level, true) : [];
        $subjects =  Subjects::all();
        return view('auth.profile',compact('profile','subjects', 'levels'));
    }
    public function updateProfilepic(Request $request)
{
    $id = Auth::user()->id;
    $validator = Validator::make($request->all(), [
        'image' => 'required|mimes:jpeg,png,jpg|max:2048',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'error' => $validator->errors(),
        ]);
    }
    $image = $request->file('image');
    $imageName = $id . '-' . time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('/profile/'), $imageName);
    $oldImage = Auth::user()->image;
    if ($oldImage) {
        $image->move(public_path('/profile/'), $imageName);
    }
    User::where('id', $id)->update(['profile_pic' => $imageName]);
    session()->flash('success', 'Profile image updated successfully.');
    return response()->json([
        'status' => true,
        'errors' => [], 
    ]);
}
public function checkPassword(Request $request){
    try{

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:5|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }catch (\Exception $e) {
        return response()->json(['error' =>  $e->getMessage(),'line'=> $e->getLine(),'File'=> $e->getFile()], 500);
    }
}
public function updatePassword(Request $request){
    try{
        $rules = [
            'id' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
        $user  = User::find($request->id);

        $user->password = Hash::make($request->new_password);
        $user->save();
        session()->flash('success', 'Your Password Change successfully');
        return response()->json([
           'status' => true,
        ]);
    }catch (\Exception $e) {
        return response()->json(['error' =>  $e->getMessage(),'line'=> $e->getLine(),'File'=> $e->getFile()], 500);
    }
}


public function update(Request $request)
{
    $id = $request->input('id');
    $validated = $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);



    if ($validated) {
        $user = User::find($id);
        if ($user) {
            $file = $user->resume;
            if ($request->hasFile('resume')) {
                if ($file && file_exists(public_path('files/' . $file))) {
                    unlink(public_path('files/' . $file));
                }
                $document = $request->file('resume');
                $name = now()->format('Y-m-d_H-i-s') . '-cv';
                $file = $name . '.' . $document->getClientOriginalExtension();
                $targetDir = public_path('files');
                $document->move($targetDir, $file);
            }
            $subjects = [];
            if ($request->has('subject')) {
                $subjectArray = $request->input('subject');

                if (is_array($subjectArray)) {
                    foreach ($subjectArray as $subjectJson) {
                        $decodedSubject = json_decode($subjectJson, true);
                        if (is_array($decodedSubject)) {
                            $subjects = array_merge($subjects, array_column($decodedSubject, 'value'));
                        }
                    }
                } else {
                    $decodedSubject = json_decode($subjectArray, true);
                    if (is_array($decodedSubject)) {
                        $subjects = array_column($decodedSubject, 'value');
                    }
                }
            }
            $levels = [];
            if ($request->has('level')) {
                $levelArray = $request->input('level');
                if (is_array($levelArray)) {
                    foreach ($levelArray as $levelJson) {
                        $decodedLevel = json_decode($levelJson, true);
                        if (is_array($decodedLevel)) {
                            $levels = array_merge($levels, array_column($decodedLevel, 'value'));
                        }
                    }
                } else {
                    $decodedLevel = json_decode($levelArray, true);
                    if (is_array($decodedLevel)) {
                        $levels = array_column($decodedLevel, 'value');
                    }
                }
            }
            $user->name = $request->input('name') !== $user->name ? $request->input('name') : $user->name;
            $user->phone_number = $request->input('phone_number') ?? $user->phone_number;
            $user->parent_name = $request->input('parent_name') ?? $user->parent_name;
            $user->email = $request->input('email') !== $user->email ? $request->input('email') : $user->email;
            $user->cnic = $request->input('cnic') ?? $user->cnic;
            $user->date_of_birth = $request->input('date_of_birth') ?? $user->date_of_birth;
            $user->qualifications = $request->input('qualifications') ?? $user->qualifications;
            $user->experience = $request->input('experience') ?? $user->experience;
            $user->availability = $request->input('availability') ?? $user->availability;
            $user->note = $request->input('note') ?? $user->note;
            $user->resume = $file;
            $user->subject =json_encode($subjects);
            $user->level = json_encode($levels);
            $user->address = $request->address ?? $user->address;
            $user->payment_information = $request->input('payment_information')  ?? $user->payment_information;
            $user->role_description = $request->input('role_description') ?? $user->role_description;
            $user->save();
            $redirectUrl = $request->has('order_place')
                ? 'place/order/' . $request->order_place
                : 'profile/update-about/' . $id;

            return redirect($redirectUrl)->with('success', 'Profile updated successfully.');
        } else {
            return redirect('profile/' . $id)->with('error', 'User not found.');
        }
    } else {
        return redirect()->back()->withErrors($validated)->withInput();
    }
}
}
