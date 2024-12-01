<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ScheduleTiming;
use App\Mail\SendReminder;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class ReminderController extends Controller
{
    public function sendReminders()
    {
        $now = Carbon::now();
        $reminderTime = $now->addDay();
        $scheduleTimings = ScheduleTiming::with('schedule', 'teacher', 'student', 'classType')
            ->whereDate('schedule_date', $reminderTime->toDateString())
            ->whereTime('schedule_time', '<=', $reminderTime->toTimeString())
            ->get();
        foreach ($scheduleTimings as $scheduleTiming) {
            try {
                Mail::to($scheduleTiming->teacher->email)
                    ->send(new SendReminder($scheduleTiming, 'teacher'));
                Mail::to($scheduleTiming->student->email)
                    ->send(new SendReminder($scheduleTiming, 'student'));
                $scheduleTiming->update([
                    'reminder_sent_at' => now(),
                    'status' => 1
                ]);
            } catch (\Exception $e) {

                return response()->json(['success' => false, 'message' => 'Error sending reminder.']);
            }
        }

        return response()->json(['success' => true, 'message' => 'Reminders sent successfully.']);
    }
}
