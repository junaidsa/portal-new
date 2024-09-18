<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Branches;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Break_;

class SuperAdminController extends Controller
{

    public function branch(){
       $branches =  Branches::orderBy('id','desc')->get();
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
        ]);
        if ($validated) {
            $medicine = new Branches();
            $medicine->branch = $request->input('branch_name');
            $medicine->status = $request->input('status');
            $medicine->user_id = Auth::id();
            $medicine->save();
            return redirect('branch')->with('success', 'Branch add successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
    public function branchDelete($id)
    {
     $branches = Branches::find($id);
        if (@$branches) {
            $branches->delete();
            return redirect()->back()->with('success', 'Branch status deleted');
        }

}
}
