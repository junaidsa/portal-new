<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\Tuitions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branches::where('id',Auth::user()->branch_id)->first();
        if ($branch) {
        $students = User::with('branch')->where('role','student')->get();
        $uuid = $branch->uuid;
        return view('student.index',compact('students','uuid'));
        }
    }
    public function create($id = null){
        if ($id) {
            # code...
            $branch = Branches::where('uuid',$id)->first();
            return view('student.create',compact('branch'));
        }
        $tuitions = Tuitions::all();
        return view('student.create',compact('tuitions'));

    }
    public function postStep1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'name' => 'required',
            'parent_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
         $request->session()->put('form_data.step1', $request->only('branch_id','name', 'email', 'parent_name', 'date_of_birth', 'phone_number', 'note'));
                        return redirect()->route('form.step2');
        }
    }
    // public function createStep2(){

    //     return view('student.create');
    // }
    // public function createStep3(){

    //     return view('student.create');
    // }

}
