<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignClass;
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
            'schedule_timing.student',
            'schedule_timing.schedule.subject',
            'schedule_timing.classType'
        ])->where('teacher_id',Auth::id())->get();
        return view('teacher.assign_classes',compact('assign'));
    }
}
