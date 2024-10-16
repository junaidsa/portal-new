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
        $profile = DB::table('users')
        ->where('users.id', $id)
        ->select('users.*')
        ->first();
        $subjects =  Subjects::all();
        return view('auth.profile',compact('profile','subjects'));
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
            'old_password' => 'required|min:5|max:100',
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
        if (Hash::check($request->old_password,Auth::user()->password) == false) {
            session()->flash('error','Your old password is incorrect');
            return response()->json([
               'status' => true,
            ]);
        }

        $user  = User::find(Auth::user()->id);
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

    // Validation: ensure email is unique, except for the current user's email
    $validated = $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,  // Exclude current user's email
    ]);

    if ($validated) {
        // Fetch the user by ID
        $user = User::find($id);
        if ($user) {
            // Handle the resume upload
            $file = $user->resume;
            if ($request->hasFile('resume')) {
                $document = $request->file('resume');
                $name = now()->format('Y-m-d_H-i-s') . '-cv';
                $file = $name . '.' . $document->getClientOriginalExtension();
                $targetDir = public_path('./files');
                $document->move($targetDir, $file);
            }

            // Update user data
            $user->name = $request->input('name');
            $user->phone_number = $request->input('phone_number');
            $user->email = $request->input('email');
            $user->cnic = $request->input('cnic');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->qualifications = $request->input('qalifications');
            $user->experience = $request->input('experience');
            $user->availability = $request->input('availability');
            $user->note = $request->input('note');
            $user->resume = $file;
            $user->subject = json_encode($request->subject);
            $user->address = $request->address;
            $user->payment_information = json_encode($request->payment_information);
            $user->user_id = Auth::id();

            // Save the updated user
            $user->save();

            if ($request->has('order_place')) {
               $id = $request->order_place;
                return redirect('place/order/' .$id)->with('success', 'Profile updated successfully.');
            }

            // Redirect with success message
            return redirect('profile/update-about/' . $id)->with('success', 'Profile updated successfully.');
        } else {
            return redirect('profile/' . $id)->with('error', 'User not found.');
        }
    } else {
        return redirect()->back()->withErrors($validated)->withInput();
    }
}
}
