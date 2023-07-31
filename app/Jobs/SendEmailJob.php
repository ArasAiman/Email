<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $fromEmail;
    protected $toEmail;
    protected $subject;
    protected $message;
    protected $attachmentPath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $fromEmail, $toEmail, $subject, $message, $attachmentPath)
    {
        $this->name = $name;
        $this->fromEmail = $fromEmail;
        $this->toEmail = $toEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachmentPath = $attachmentPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
{
    Mail::send([], [], function ($message) {
        $message->to($this->toEmail)
                ->from($this->fromEmail, $this->name) // Set the sender address and name
                ->subject($this->subject)
                ->setBody(
                    "<h1>{$this->subject}</h1>" .
                    "<p><strong>Name:</strong> {$this->name}</p>" .
                    "<p><strong>From:</strong> {$this->fromEmail}</p>" .
                    "<p><strong>Message:</strong> {$this->message}</p>",
                    'text/html'
                );

        // Attach the file if available
        if ($this->attachmentPath) {
            $message->attach(storage_path('app/' . $this->attachmentPath));
        }
    });
}

}
