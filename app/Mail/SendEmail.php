<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use SerializesModels;

    public $name;
    public $fromEmail;
    public $subject;
    public $message;
    public $attachments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $fromEmail, $subject, $message, $attachments = null)
    {
        $this->name = $name;
        $this->fromEmail = $fromEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachments = $attachments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.sendEmail')
            ->subject($this->subject)
            ->from($this->fromEmail, $this->name);

        if ($this->attachments) {
            $email->attach($this->attachments);
        }

        return $email;
    }
}
