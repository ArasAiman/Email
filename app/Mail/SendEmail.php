<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $attachmentPath;

    /**
     * Create a new message instance.
     *
     * @param  array       $data
     * @param  string|null $attachmentPath
     * @return void
     */
    public function __construct(array $data, $attachmentPath = null)
    {
        $this->data = $data;
        $this->attachmentPath = $attachmentPath;

        // Set the sender name in the email
        $this->from($data['fromEmail'], $data['name']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->view('emails.send-email')
                        ->subject($this->data['subject'])
                        ->with(['data' => $this->data]);

        // Attach the file if attachment path exists
        if ($this->attachmentPath) {
            $message->attach($this->attachmentPath);
        }

        return $message;
    }
}
