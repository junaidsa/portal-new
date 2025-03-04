<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\PermissionService;
use App\Models\AssignClass;
use App\Models\ScheduleTiming;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherCreatedMail;
use App\Models\Branches;
use App\Models\Subjects;

class TeacherController extends Controller
{
    public function assignClasses()
    {
        $assign = AssignClass::with(
            'schedule_timing',
            'schedule_timing.teacher',
            'schedule_timing.schedule.subject',
            'schedule_timing.classType'
        )->where('teacher_id',Auth::id())->get();
        return view('teacher.assign_classes',compact('assign'));
    }
    public function teacherEdit($id)
    {
        $user = User::find($id);
        return view('teacher.edit', compact('user'));
    }
    public function teacherStore(Request $request, PermissionService $permissionService)
    {
        $validated = $request->validate([
            'name' => 'required',
            'branch_id' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:5',
            'cnic' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'subject' => 'required|array',
            'level' => 'required|array',
            'availability' => 'required',
            'resume' => 'required',
            'payment_information' => 'required',
            'date_of_birth' => 'required|date',
            'city' => 'required|string|max:255',
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
        }

        if ($validated) {
            $subjectJson = $request->input('subject')[0];
            $decodedSubjects = json_decode($subjectJson, true);
            $subjects = array_column($decodedSubjects, 'value');
            $levelJson = $request->input('level')[0];
            $decodedlevels = json_decode($levelJson, true);
            $levels = array_column($decodedlevels, 'value');
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
            $user->branch_id = $request->branch_id;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->qualifications = $request->qualification;
            $plainPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()'), 0, 12);
            $user->password = Hash::make($plainPassword);
            $user->cnic = $request->cnic;
            $user->experience = $request->experience;
            $user->availability = $request->availability;
            $user->payment_information = $request->payment_information;
            $user->note = $request->note;
            $user->address = $request->address;
            $user->date_of_birth = $request->date_of_birth;
            $user->city = $request->city;
            $user->status = 1;
            $user->subject = json_encode($subjects);
            $user->level = json_encode($levels);
            $user->resume = $file;
            $user->role = 'teacher';
            $user->save();
            $permissionService->assignPermissions($user->id, $user->role);
            Mail::to($user->email)->send(new TeacherCreatedMail($user, $plainPassword));
            $branch = Branches::find($user->branch_id);
            $data = [
                'user_id' => Auth::check() ?? Auth::user()->id,
                'branch_id' => $request->branch_id,
                'title' => "Teacher Account Created",
                'message' => "A new Teacher  account for {$user->name} has been assign in the {$branch->branch} branch.",
            ];
            $this->createNotification($data);
            if(Auth::check())
            {
                return redirect('teacher')->with('success', 'Teacher Account created successfully.');
            }else{
                return redirect()->back()->with('success', 'Your account has been created. Please check your email and log in');
            }
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function teacherReport()
    {
        return view("teacher.teacher_payments");
    }

    public function search(Request $request)

    {

        $user = Auth::user();
        $query = User::where('role', 'teacher');
        if (in_array($user->role, ['admin', 'staff'])) {
            $query->where('branch_id', $user->branch_id);
        }
        if ($user->role !== 'super' && $request->filled('branch_id')) {
            $query->where('branch_id', $request->branch_id);
        }
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        $teachers = $query->select('id', 'name','qualifications','email')->get();
        return response()->json($teachers->map(function ($teacher) {
            return [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'qualifications' => $teacher->qualifications,
                'email' => $teacher->email
            ];
        }));
    }

    public function teacherBase(Request $request)
    {
        $student_id = $request->student_id;
        // dd($student_id);
        $teacherdata = $request->teacherdata;
        $sheduletimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
            ->where('teacher_id', $student_id);
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')) {
            $branch_id = Auth::user()->branch_id;
            $sheduletimings->whereHas('schedule', function ($query) use ($branch_id) {
                $query->where('branch_id', $branch_id);
            });
        }
        if (!empty($teacherdata)) {
            $dateParts = explode('-', $teacherdata);
            if (count($dateParts) === 2) {
                $year = $dateParts[0];
                $month = $dateParts[1];
                $sheduletimings->whereYear('schedule_date', $year)->whereMonth('schedule_date', $month);
            }
            }
        $sheduletimings = $sheduletimings->get();
        $view = view('teacher.classesList', compact('student_id', 'sheduletimings'))->render();
        return response()->json(['html' => $view]);
    }

     public function teacherDelete($id)
    {
        $user = User::find($id);
        if (@$user) {
            $user->delete();
            return redirect()->back()->with('success', 'Teacher delete successfully');
        }
    }

    public function teacherCreate($uuid)
    {
        $branch = Branches::where('uuid', $uuid)->first();
        if ($branch) {
            # code...

            $subjects = Subjects::all();
            return view('teacher.create', compact('subjects', 'branch'));
        } else {
            abort('404');
        }
    }
}
