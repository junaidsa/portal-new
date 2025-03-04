<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ScheduleTiming;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $teacher = [];
        $user = Auth::user(); 
        if ($user->role === 'admin' || $user->role === 'staff') {
            $schedules = ScheduleTiming::with('schedule', 'teacher', 'student', 'classType')
                ->where('branch_id', $user->branch_id)              ->where('class_type_id', 4)
                ->orderBy('id', 'desc')
                ->get();
        } elseif ($user->role === 'super') {
            $schedules = ScheduleTiming::with('schedule', 'teacher', 'student', 'classType')->where('class_type_id','!=',4)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $schedules = ScheduleTiming::orderBy('id', 'desc')->get();
        }
        if ($user->role === 'admin' || $user->role === 'staff') {
            $teacher = User::with('branch')
                ->where('branch_id', $user->branch_id)
                ->where('role', 'teacher')
                ->get();
            } else {
            $teacher = User::with('branch')
                ->where('role', 'teacher')
                ->get();
        }    
       $subject = Subjects::get();
        return view('student.schedule',compact('schedules','teacher','subject'));
    }
    public function bankPayment()
    {
        $schedule = Schedule::with('branch','level','classType')->where('payment_type','Banks')->orderBy('id', 'Desc')->get();
        return view("bankpayment.index", compact('schedule'));
    }
    public function sendReminder($id)
    {
        $scheduleTiming = ScheduleTiming::with('schedule','schedule.branch', 'teacher', 'student', 'classType')->find($id);
        try {
            Mail::to($scheduleTiming->teacher->email)
                ->send(new \App\Mail\SendReminder($scheduleTiming, 'teacher'));
            Mail::to($scheduleTiming->student->email)
                ->send(new \App\Mail\SendReminder($scheduleTiming, 'student'));
            $scheduleTiming->update(['reminder_sent_at' => 1,
            'status' => 1
        ]);
            return response()->json(['success' => true, 'message' => 'Reminder sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error sending reminder.']);
        }
    }

    public function paymentStatus(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
    
        if ($schedule) {
            $schedule->payment_status = 1;
            $schedule->save();
            DB::table('schedule_timings')
                ->where('schedule_id', $schedule->id)
                ->update(['payment_status' => 1]);
    
            return response()->json([
                'success' => true,
                'message' => 'Your payment status has been updated successfully. Thank you for your payment.',
            ]);
        } else {
            abort(404, 'Schedule not found.');
        }
    }


    public function autoReminder()
    {        
        dd('Auto reminder function called');
        $scheduleTimings = ScheduleTiming::with('schedule', 'schedule.branch', 'teacher', 'student', 'classType')
            // ->where('reminder_sent_at',0)
            ->get();
        if ($scheduleTimings->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No schedules found to send reminders.']);
        }
    
        foreach ($scheduleTimings as $scheduleTiming) {
            try {
                Mail::to($scheduleTiming->teacher->email)
                    ->send(new \App\Mail\SendReminder($scheduleTiming, 'teacher'));
                Mail::to($scheduleTiming->student->email)
                    ->send(new \App\Mail\SendReminder($scheduleTiming, 'student'));
                $scheduleTiming->update([
                    'reminder_sent_at' => 1,
                    'status' => 1,
                ]);
    
            } catch (\Exception $e) {
                // Log the error instead of using dd
                Log::error("Failed to send reminder for Schedule ID: {$scheduleTiming->id}. Error: {$e->getMessage()}");
            }
        }
    
        return response()->json(['success' => true, 'message' => 'Reminders processed successfully.']);
    }
    
    




    }
