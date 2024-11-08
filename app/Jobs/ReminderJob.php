<?php

namespace App\Jobs;

use App\Mail\ClassReminderMail;
use App\Models\Notification;
use App\Models\ScheduleTiming;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $classes = ScheduleTiming::where('schedule_date', now()->addDay()->format('Y-m-d'))
        ->where('reminder_sent_at', null)
        ->with(['student', 'teacher', 'schedule'])
        ->get();

    foreach ($classes as $class) {
        if (in_array($class->class_type_id, [2, 4]) || !empty($class->meeting_link)) {
            Mail::to([$class->student->email, $class->teacher->email])
                ->send(new ClassReminderMail($class));
            
            // Update reminder_sent_at field
            $class->reminder_sent_at = now();
            $class->save();
            $this->createNotifications($class);
        }
    }
    }
    protected function createNotifications($class)
{
    if ($class->class_type_id != 4) {
        Notification::create([
            'user_id' => $class->teacher_id,
            'branch_id' => $class->schedule->branch_id,
            'message' => "Reminder for class on {$class->schedule_date}",
            'status' => 1
        ]);
    } else {
        // Notify admin and staff roles
    }
}
}
