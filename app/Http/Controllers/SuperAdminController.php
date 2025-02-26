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
        $level = Levels::get();
        $branch = Branches::find($id);
        $selectedLevels = json_decode($branch->level_id, true) ?? [];
        return view('super_admin.branch.edit', compact('branch', 'level', 'selectedLevels'));
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
            $branch->registration_fee = $request->input('registration_fee') ?? 0.00;
            $branch->meterical_fee = $request->input('meterical_fee') ?? 0.00;
            $branch->uuid = Str::uuid()->toString();
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
            'branch_code' => 'required',
            'id' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        if ($validated) {
            $branch = Branches::find($request->input('id'));
            if (!$branch) {
                return redirect()->back()->with('success', 'Branch  Not Found!');
            }
            $branch->branch = $request->input('branch_name');
            $branch->branch_code = $request->input('branch_code');
            $branch->city = $request->input('city');
            $branch->address = $request->input('address');
            $branch->status = $request->input('status');
            $branch->registration_fee = $request->input('registration_fee');
            $branch->meterical_fee = $request->input('meterical_fee');
            $branch->user_id = Auth::id();
            $branch->save();

            return redirect('branch')->with('success', 'Branch updated successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

 public function branchDetail($id)
    {
        if($id){
        return view('super_admin.branch.branch_details',compact('id'));
        }
        abort('404');
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
        $level =  Levels::with('branch')->get();
        $branch = Branches::where('status', 1)->get();
        $subject = subjects::find($id);
        return view('subjects.edit', compact('subject', 'level', 'branch'));
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
    // public function subjectUpdate(Request $request)
    // {
    //     $validated = $request->validate([
    //         'subject_name' => 'required|string|max:255',
    //         'id' => 'required|exists:subjects,id',
    //         'level_id' => 'nullable|exists:levels,id',
    //         'branch' => 'nullable|exists:branches,id',
    //     ]);
    //     $subject = Subjects::find($request->input('id'));
    //     if (!$subject) {
    //         return redirect()->back()->with('error', 'Subject not found!');
    //     }
    //     $subject->subject = $request->input('subject_name');
    //     if ($request->has('level_id')) {
    //         $subject->level_id = $request->input('level_id');
    //     }
    //     if ($request->has('branch')) {
    //         $subject->branch_id = $request->input('branch');
    //     }
    //     $subject->status = $request->input('status', $subject->status);
    //     $subject->user_id = Auth::id();
    //     $subject->save();

    //     return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    // }
    public function subjectUpdate(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required',
            'id' => 'required',
            'level_id' => 'required',
            'branch' => 'required',
        ]);
        $subject = Subjects::find($request->input('id'));
        if ($validated) {

            $subject->subject = $request->input('subject_name');
            $subject->levels_id = $request->input('level_id');
            $subject->branch_id = $request->input('branch');
            $subject->status = $request->input('status');
            $subject->user_id = Auth::id();  // Assuming you want to keep track of the user who updated the subject
            $subject->save();

            return redirect('subject')->with('success', 'Subject updated successfully.');
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
        $branch =  Branches::get();
        return view('super_admin.levels.edit', compact('level', 'branch'));
    }
    public function levelStore(Request  $request)
    {
        $validated = $request->validate([
            'level_name' => 'required',
            'prices' => 'required',
            'class_type_id' => 'required',
            'branch' => 'required_if:class_type_id,4',
            'quantity' => 'nullable|integer|required_if:class_type_id,3', 
            'date' => 'nullable|date|required_if:class_type_id,3',       
            'time' => 'nullable|date_format:H:i|required_if:class_type_id,3',
        ]);
        if ($validated) {
            $level = new Levels();
            $level->user_id = Auth::id();
            $level->branch_id = $request->input('branch') ?? 1;
            $level->name = $request->input('level_name');
            $level->year = $request->input('years');
            $level->price = $request->input('prices');
            $level->status = $request->input('status');
            $level->class_type_id = $request->input('class_type_id');
            if ($request->input('class_type_id') == 3) {
                $level->quantity = $request->input('quantity');
                $level->date = $request->input('date');
                $level->time = $request->input('time');
            }
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
            'level_name' => 'required',
            'prices' => 'required',
            'branch' => 'required',
            'class_type_id' => 'required',
        ]);

        if ($validated) {
            $level = Levels::find($request->input('id'));
            if (!$level) {
                return redirect()->back()->with('success', 'Level  Not Found!');
            }
            $level->user_id = Auth::id();
            $level->branch_id = $request->input('branch');
            $level->name = $request->input('level_name');
            $level->year = $request->input('year');
            $level->price = $request->input('prices');
            $level->status = $request->input('status');
            $level->class_type_id = $request->input('class_type_id');
            $level->save();

            return redirect('level')->with('success', 'Level updated successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }


    public function bankCreate()
    {
        $b =   Bank::find(1);
        // if (!$b) {
        //     abort('404');
        // }
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
