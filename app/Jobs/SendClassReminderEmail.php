<?php 
namespace App\Jobs;

use App\Models\ScheduleTiming;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendClassReminderEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $schedule;

    public function __construct(ScheduleTiming $schedule)
    {
        $this->schedule = $schedule;
    }

    public function handle()
    {
        $student = $this->schedule->student;
        $teacher = $this->schedule->teacher;
        $classType = $this->schedule->classType;

        $details = [
            'studentName' => $student->name,
            'teacherName' => $teacher->name,
            'classDate' => $this->schedule->schedule_date,
            'classTime' => $this->schedule->schedule_time,
            'duration' => $this->schedule->minute,
            'mode' => $classType->name,
            'classMode' => ($classType->id == 1 || $classType->id == 3) ? 'Online' : 'Home',
            'link' => ($classType->id == 1 || $classType->id == 3) ? $this->schedule->meeting_link : null,
            'address' => ($classType->id == 2 || $classType->id == 4) ? 'No 21, Jalqn Sp 9/34 bandar saujana putra. Jenjarom selangor. (exit 606) nearby Putra Heights, Subang Jaya' : null
        ];

        // Send email
        Mail::send('emails.classReminder', $details, function($message) use ($student, $teacher) {
            $message->to($student->email)
                    ->cc($teacher->email)
                    ->subject('Class Reminder');
        });

        // Update reminder_sent_at timestamp
        $this->schedule->update(['reminder_sent_at' => now()]);
    }
}