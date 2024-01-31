<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $telephone;
    public $user_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $telephone, $user_message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->user_message = $user_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact-email')
        ->subject('New Contact Us Message!')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'user_message' => $this->user_message,
        ]);
    }
}
