<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ScheduleTiming;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReminder;

class SendClassReminders extends Command
{
    protected $signature = 'send:class-reminders';
    protected $description = 'Send reminders for classes scheduled in the next 24 hours';

    public function handle()
    {
        $now = now();
        $next24Hours = now()->addDay(); 
        $schedules = ScheduleTiming::with('schedule', 'schedule.branch', 'teacher', 'student', 'classType')
            ->where('reminder_sent_at', 0) 
            ->where('payment_status', 1)
            ->where(function ($query) use ($now, $next24Hours) {
                $query->whereDate('schedule_date', '=', $now->toDateString())
                      ->orWhere(function ($query) use ($now, $next24Hours) {
                          $query->whereBetween('schedule_date', [$now->toDateString(), $next24Hours->toDateString()])
                                ->whereBetween('schedule_time', [$now, $next24Hours]);                       });
            })
            ->get();
    
        foreach ($schedules as $scheduleTiming) {
            try {
                Mail::to($scheduleTiming->teacher->email)
                    ->send(new SendReminder($scheduleTiming, 'teacher'));
                Mail::to($scheduleTiming->student->email)
                    ->send(new SendReminder($scheduleTiming, 'student'));
                $scheduleTiming->update(['reminder_sent_at' => 1]);
    
                $this->info("Reminder sent for Schedule ID: {$scheduleTiming->id}");
            } catch (\Exception $e) {
                $this->error("Failed to send reminder for Schedule ID: {$scheduleTiming->id}. Error: {$e->getMessage()}");
            }
        }
    }
}
