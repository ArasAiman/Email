<?php

// app/Mail/SendEmail.php

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
    public $attachmentPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $fromEmail, $subject, $message, $attachmentPath = null)
    {
        $this->name = $name;
        $this->fromEmail = $fromEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachmentPath = $attachmentPath;
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

        if ($this->attachmentPath) {
            $email->attach($this->attachmentPath, [
                'as' => pathinfo($this->attachmentPath, PATHINFO_BASENAME),
                'mime' => mime_content_type($this->attachmentPath),
            ]);
        }

        return $email;
    }
}

