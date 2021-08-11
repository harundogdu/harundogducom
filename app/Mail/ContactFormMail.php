<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name = '';
    public $message = '';
    public $email = '';

    public function __construct($name = 'İsim', $message = 'Mesaj', $email = 'info@harundogdu.com')
    {
        $this->name = $name;
        $this->message = $message;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $message = $this->message;
        $email = $this->email;
        return $this->markdown('emails.contact_form', compact('message', 'name', 'email'));
    }
}
