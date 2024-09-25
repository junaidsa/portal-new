<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Branches;
use App\Models\Levels;
use App\Models\Packages;
use App\Models\Subjects;
use App\Models\Tuitions;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Monolog\Level;
use PhpParser\Node\Stmt\Break_;

class SuperAdminController extends Controller
{
    public function branch(){
       $branches =  Branches::where('super',0)->orderBy('id','desc')->get();
        return view('super_admin.branch.index',compact('branches'));
    }
    public function branchCreate(){
        return view('super_admin.branch.create');
    }
    public function branchEdit($id){
      $branch = Branches::find($id);
        return view('super_admin.branch.edit',compact('branch'));
    }
    public function branchStore(Request $request){

        $validated = $request->validate([
            'branch_name' => 'required',
            'branch_code' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        if ($validated) {
            $branch = new Branches();
            $branch->branch = $request->input('branch_name');
            $branch->branch_code = $request->input('branch_code');
            $branch->city = $request->input('city');
            $branch->address = $request->input('address');
            $branch->status = $request->input('status');
            $branch->uuid = Str::uuid()->toString();
            $branch->user_id = Auth::id();
            $branch->save();
            return redirect('branch')->with('success', 'Branch add successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
    public function branchDelete($id){
     $branches = Branches::find($id);
        if (@$branches) {
            $branches->delete();
            return redirect()->back()->with('success', 'Branch status deleted');
        }
    }
    public function branchUpdate(Request $request){

        $validated = $request->validate([
            'branch_name' => 'required',
            'id' => 'required',

        ]);
        if ($validated) {
            $branch = Branches::find($request->input('id'));
            if (!$branch) {
                return redirect()->back()->with('success', 'Branch  Not Found!');
            }
                $branch->branch = $request->input('branch_name');
                $branch->status = $request->input('status');
                $branch->user_id = Auth::id();
                $branch->save();
            return redirect('branch')->with('success', 'Branch Update successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    //********** Branches The End **********//
    //********** Subjects Start **********//

    public function subjects(){
        $subjects =  Subjects::orderBy('id','desc')->with('branch','tuition')->get();
         return view('subjects.subjects',compact('subjects'));
    }
    public function subjectCreate(){
    $tuitions =  Tuitions::all();
    $branch = Branches::where('status',1)->get();
    return view('subjects.create',compact('tuitions','branch'));
    }
    public function subjectEdit($id){
       $subject = subjects::find($id);
        return view('subjects.edit',compact('subject'));
    }
    public function subjectStore(Request $request){

         $validated = $request->validate([
             'subject_name' => 'required',
             'package' => 'required',
             'branch' => 'required',
         ]);
         if ($validated) {
             $subject = new Subjects();
             $subject->subject = $request->input('subject_name');
             $subject->tuition_id = $request->input('package');
             $subject->branch_id = $request->input('branch');
             $subject->status = $request->input('status');
             $subject->user_id = Auth::id();
             $subject->save();
             return redirect('subject')->with('success', 'Subject add successfully.');
         } else {
             return redirect()->back()->withErrors($validated)->withInput();
         }
    }
     public function subjectDelete($id){
      $subjects = subjects::find($id);
         if (@$subjects) {
             $subjects->delete();
             return redirect()->back()->with('success', 'Subject status deleted');
         }
    }
    public function subjectUpdate(Request $request){

        $validated = $request->validate([
            'subject_name' => 'required',
            'id' => 'required',

        ]);
        if ($validated) {
            $subject = Subjects::find($request->input('id'));
            if (!$subject) {
                return redirect()->back()->with('success', 'Subject  Not Found!');
            }
                $subject->subject = $request->input('subject_name');
                $subject->status = $request->input('status');
                $subject->user_id = Auth::id();
                $subject->save();
            return redirect('subject')->with('success', 'Subject Update successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
    //********** Subjects The End **********//
    //********** Level Start **********//

    public function level(){
        $level =  Packages::orderBy('id','Desc')->get();
         return view('super_


         .levels.level',compact('level'));
    }
    public function levelCreate(){
        return view('super_admin.levels.create');
    }
    public function levelEdit($id){
        $level = Packages::find($id);
        return view('super_admin.levels.edit',compact('level'));
    }
    public function levelStore(Request $request){
         $validated = $request->validate([
             'level_name' => 'required',
             'years' => 'required',
             'prices' => 'required',
         ]);
         if ($validated) {
             $level = new Packages();
             $level->name = $request->input('level_name');
             $level->years = $request->input('years');
             $level->prices = $request->input('prices');
             $level->status = $request->input('status');
             $level->user_id = Auth::id();
             $level->save();
             return redirect('level')->with('success', 'Level add successfully.');
         } else {
             return redirect()->back()->withErrors($validated)->withInput();
         }
    }
     public function levelDelete($id){
      $level = Packages::find($id);
         if (@$level) {
             $level->delete();
             return redirect()->back()->with('success', 'Level status deleted');
         }
    }
    public function levelUpdate(Request $request){

        $validated = $request->validate([
            'id' => 'required',
            'level_name' => 'required',
             'years' => 'required',
             'prices' => 'required',

        ]);
        if ($validated) {
            $level = Packages::find($request->input('id'));
            if (!$level) {
                return redirect()->back()->with('success', 'Category  Not Found!');
            }
            $level->name = $request->input('level_name');
            $level->years = $request->input('years');
            $level->prices = $request->input('prices');
            $level->status = $request->input('status');
            $level->user_id = Auth::id();
            $level->save();
            return redirect('level')->with('success', 'Level Update successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

}
