<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $scheduleTiming;
    public $isPhysical;
    public $role;

    /**
     * Create a new message instance.
     *
     * @param mixed $scheduleTiming
     * @param string $role
     * @param bool $isPhysical
     */
    public function __construct($scheduleTiming, $role, $isPhysical)
    {
        $this->scheduleTiming = $scheduleTiming;
        $this->role = $role;
        $this->isPhysical = $isPhysical;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Class Reminder',
        );
    }
    public function build()
    {
        return $this->subject('Class Reminder')
                    ->view('emails.classReminder')
                    ->with([
                        'scheduleTiming' => $this->scheduleTiming,
                        'role' => $this->role,
                        'classAddress' => $this->role === 'teacher' && $this->scheduleTiming->classType->name === '1-1 Home'
                            ? $this->scheduleTiming->schedule->student->address
                            : null,
                        'classLink' => $this->isPhysical ? null : $this->scheduleTiming->meeting_link,
                    ]);
    }
}
