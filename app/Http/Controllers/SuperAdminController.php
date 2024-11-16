<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Bank;
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
    public function branch()
    {
        $branches =  Branches::where('super', 0)->orderBy('id', 'desc')->get();
        return view('super_admin.branch.index', compact('branches'));
    }
    public function branchCreate()
    {

        $level = Levels::get();
        return view('super_admin.branch.create', compact('level'));
    }
    public function branchEdit($id)
    {
        $branch = Branches::find($id);
        return view('super_admin.branch.edit', compact('branch'));
    }
    public function branchStore(Request $request)
    {

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
            $branch->registration_fee = $request->input('registration_fee');
            $branch->meterical_fee = $request->input('meterical_fee');
            $branch->uuid = Str::uuid()->toString();
            $branch->level_id = json_encode($request->input('level', []));
            $branch->user_id = Auth::id();
            $branch->save();
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
    public function branchUpdate(Request $request)
    {

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

    public function subjects()
    {
        $subjects =  Subjects::orderBy('id', 'desc')->with('branch', 'level')->get();
        return view('subjects.subjects', compact('subjects'));
    }
    public function subjectCreate()
    {
        $level =  Levels::all();
        $branch = Branches::where('status', 1)->get();
        return view('subjects.create', compact('level', 'branch'));
    }
    public function subjectEdit($id)
    {
        $subject = subjects::find($id);
        return view('subjects.edit', compact('subject'));
    }
    public function subjectStore(Request $request)
    {

        $validated = $request->validate([
            'subject_name' => 'required',
            'level_id' => 'required',
            'branch' => 'required',
        ]);
        if ($validated) {
            $subject = new Subjects();
            $subject->subject = $request->input('subject_name');
            $subject->levels_id = $request->input('level_id');
            $subject->branch_id = $request->input('branch');
            $subject->status = $request->input('status');
            $subject->user_id = Auth::id();
            $subject->save();
            return redirect('subject')->with('success', 'Subject add successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
    public function subjectDelete($id)
    {
        $subjects = subjects::find($id);
        if (@$subjects) {
            $subjects->delete();
            return redirect()->back()->with('success', 'Subject status deleted');
        }
    }
    public function subjectUpdate(Request $request)
    {

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


    public function level()
    {
        $level =  Levels::with('classType', 'branch')->orderBy('id', 'Desc')->get();
        return view('super_admin.levels.level', compact('level'));
    }
    public function levelCreate()
    {
        $branch =  Branches::get();

        return view('super_admin.levels.create', compact('branch'));
    }
    public function levelEdit($id)
    {
        $level = Levels::find($id);
        return view('super_admin.levels.edit', compact('level'));
    }
    public function levelStore(Request  $request)
    {
        $validated = $request->validate([
            'level_name' => 'required',
            'prices' => 'required',
            'branch' => 'required',
            'class_type_id' => 'required',
        ]);
        if ($validated) {
            $level = new Levels();
            $level->user_id = Auth::id();
            $level->branch_id = $request->input('branch');
            $level->name = $request->input('level_name');
            $level->year = $request->input('years');
            $level->price = $request->input('prices');
            $level->status = $request->input('status');
            $level->class_type_id = $request->input('class_type_id');
            $level->save();
            return redirect('level')->with('success', 'Level created successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function levelDelete($id)
    {
        $level = Levels::find($id);
        if (@$level) {
            $level->delete();
            return redirect()->back()->with('success', 'Level status deleted');
        }
    }
    public function levelUpdate(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'level_name' => 'required',
            'year' => 'required',
            'prices' => 'required',

        ]);
        if ($validated) {
            $level = Levels::find($request->input('id'));
            if (!$level) {
                return redirect()->back()->with('success', 'Level  Not Found!');
            }
            $level->name = $request->input('level_name');
            $level->year = $request->input('year');
            $level->price = $request->input('prices');
            $level->status = $request->input('status');
            $level->user_id = Auth::id();
            $level->save();
            return redirect('level')->with('success', 'Level Update successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function bankCreate()
    {
        $b =   Bank::find(1);
        if (!$b) {
            abort('404');
        }
        return view('super_admin.bank.create', compact('b'));
    }
    public function bankStore(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'account_holdername' => 'required',
            'account_number' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // image is now optional
        ]);

        if ($validated) {
            $bank = Bank::find(1);

            if (!$bank) {
                return redirect()->route('bank.create')->with('error', 'Bank record not found.');
            }
            $file = $bank->image;
            if ($request->hasFile('image')) {
                $oldFilePath = public_path('./files/' . $bank->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
                $document = $request->file('image');
                $name = now()->format('Y-m-d_H-i-s') . '-bank';
                $file = $name . '.' . $document->getClientOriginalExtension();
                $targetDir = public_path('./files');
                $document->move($targetDir, $file);
            }
            $bank->bank_name = $request->input('bank_name');
            $bank->account_holdername = $request->input('account_holdername');
            $bank->account_number = $request->input('account_number');
            $bank->image = $file;
            $bank->save();

            return redirect()->route('bank.create')->with('success', 'Bank updated successfully.');
        } else {
            return back()->withErrors($validated)->withInput();
        }
    }
}
