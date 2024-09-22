<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $branchName;
    public $password;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $password,$branchName)
    {
        //
        $this->user = $user;
        $this->password = $password;
        $this->branchName = $branchName;
    }

    public function build()
    {
        return $this->subject('New Admin Account Created')
                    ->view('emails.admin_register')
                    ->with([
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'branch' => $this->branchName,
                        'password' => $this->password,
                    ]);
    }
}
