<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StaffMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $staff;
    public $branchName;
    public $password;
    public function __construct($staff, $password,$branchName)
    {
        $this->staff = $staff;
        $this->password = $password;
        $this->branchName = $branchName;
    }


    public function build()
    {
        return $this->subject('Staff Account Created')
                    ->view('emails.staff_register')
                    ->with([
                        'name' => $this->staff->name,
                        'email' => $this->staff->email,
                        'branch' => $this->branchName,
                        'password' => $this->password,
                    ]);
    }
}
