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
    public $role;

    /**
     * Create a new message instance.
     *
     * @param mixed $scheduleTiming
     * @param string $role
     */
    public function __construct($scheduleTiming, $role)
    {
        $this->scheduleTiming = $scheduleTiming;
        $this->role = $role;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Class Reminder',
        );
    }
    public function build()
    { $classAddress = $this->role === 'teacher' && $this->scheduleTiming->classType->name === '1-1 Home'
        ? $this->scheduleTiming->student->address ?? 'Address not available'
        : null;

    return $this->subject('Class Reminder')
                ->view('emails.classReminder', [
                    'scheduleTiming' => $this->scheduleTiming,
                    'role' => $this->role,
                    'classAddress' => $classAddress,
                ]);
    }
}
