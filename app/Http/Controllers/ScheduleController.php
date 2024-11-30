<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleTiming;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    //
    public function index()
    {
       $schedules = ScheduleTiming::class::with('schedule', 'teacher','student','classType')->orderBy('id','desc')->get();
       
       $teacher = User::class::with('branch')->where('branch_id',Auth::user()->branch_id)->where('role','teacher')->get();

       $subject = Subjects::get();
        return view('student.schedule',compact('schedules','teacher','subject'));
    }
    public function bankPayment()
    {
        $schedule = Schedule::where('payment_type','Banks')->orderBy('id', 'Desc')->get();
        return view("bankpayment.index", compact('schedule'));
    }
    public function sendReminder($id)
    {
        $scheduleTiming = ScheduleTiming::with('schedule', 'teacher', 'student', 'classType')->find($id);
        if (!$scheduleTiming) {
            return response()->json(['success' => false, 'message' => 'Invalid schedule.']);
        }
        if ($scheduleTiming->status == 1 || $scheduleTiming->reminder_sent_at) {
            return response()->json(['success' => false, 'message' => 'Reminder already sent or schedule invalid.']);
        }
        try {
            $isPhysical = $scheduleTiming->classType->name === 'Physical';
            Mail::to($scheduleTiming->teacher->email)
                ->send(new \App\Mail\SendReminder($scheduleTiming, 'teacher', $isPhysical));
            Mail::to($scheduleTiming->student->email)
                ->send(new \App\Mail\SendReminder($scheduleTiming, 'student', $isPhysical));
            $scheduleTiming->update(['reminder_sent_at' => now()]);
            return response()->json(['success' => true, 'message' => 'Reminder sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error sending reminder.']);
        }
    }




    }
