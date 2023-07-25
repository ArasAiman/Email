<?php

namespace App\Jobs;

// app/Jobs/SendEmailJob.php

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
        $email = new \App\Mail\SendEmail($this->name, $this->fromEmail, $this->subject, $this->message, $this->attachmentPath);
        Mail::to($this->toEmail)->send($email);
    }
}
