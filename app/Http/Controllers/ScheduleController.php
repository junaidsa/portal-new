<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ScheduleTiming;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function index()
    {
       $schedules = ScheduleTiming::class::with('schedule', 'teacher','student','classType')->get();
        return view('student.schedule',compact('schedules'));
    }
    
}
