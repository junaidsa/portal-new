<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ScheduleTiming;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function index()
    {
       $schedules = ScheduleTiming::class::with('schedule', 'teacher','student','classType')->get();
       $teacher = User::class::with('branch')->get();
        return view('student.schedule',compact('schedules','teacher'));
    }
    
}
