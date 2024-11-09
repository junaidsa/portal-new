<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class StudentCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct($student, $password)
    {
        //
        $this->student = $student;
        $this->password = $password;
    }

    public function build()
    {
        $loginUrl = URL::temporarySignedRoute(
            'student.login',
            now()->addMinutes(30),
            [
                'user' => $this->student->id,
                'redirect' => route('form.step2', ['student_id' => $this->student->id]),
            ]
        );
        return $this->subject('Student Account Created')
                    ->view('emails.student_register')
                    ->with([
                        'name' => $this->student->name,
                        'email' => $this->student->email,
                        'password' => $this->password,
                        'loginUrl' => $loginUrl,
                    ]);
    }
}
