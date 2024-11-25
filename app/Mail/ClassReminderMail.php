<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClassReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $scheduleTiming;
    public $role;

    public function __construct($scheduleTiming, $role)
    {
        $this->scheduleTiming = $scheduleTiming;
        $this->role = $role; // 'teacher' or 'student'
    }
    public function build()
    {
        return $this->view('emails.class_reminder')
                    ->with([
                        'scheduleTiming' => $this->scheduleTiming,
                        'role' => $this->role,
                    ]);
    }
}
