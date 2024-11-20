<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleTiming;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function index()
    {
       $schedules = ScheduleTiming::class::with('schedule', 'teacher','student','classType')->get();
       $teacher = User::class::with('branch')->where('role','teacher')->get();
       $subject = Subjects::get();
        return view('student.schedule',compact('schedules','teacher','subject'));
    }
    public function bankPayment()
    {
            $schedule = Schedule::where('payment_type','Bank')->orderBy('id', 'Desc')->get();
            return view("bankpayment.index", compact('schedule'));
    }
    
}
