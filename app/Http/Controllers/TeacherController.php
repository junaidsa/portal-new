<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignClass;
use App\Models\ScheduleTiming;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function assignClasses()
    {
        $assign = AssignClass::with([
            'schedule_timing' => function($query) {
                $query->orderBy('schedule_date');
            },
            'schedule_timing.teacher',
            'schedule_timing.schedule.subject',
            'schedule_timing.classType'
        ])->where('teacher_id',Auth::id())->get();
        return view('teacher.assign_classes',compact('assign'));
    }

    public function payment_approve()
    {


    }

    public function teacherTrancsaction()
    {
        // $schedule = Schedule::where('payment_type', 0)->orderBy('id', 'Desc')->get();
        // return view("teacher.transaction", compact('schedule'));
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
        $sheduletimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
            ->where('teacher_id', $student_id);
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')) {
            $branch_id = Auth::user()->branch_id;
            $sheduletimings->whereHas('schedule', function ($query) use ($branch_id) {
                $query->where('branch_id', $branch_id);
            });
        }
        $sheduletimings = $sheduletimings->get();
        $view = view('teacher.classesList', compact('student_id', 'sheduletimings'))->render();
        return response()->json(['html' => $view]);
    }
}
