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
    protected $attachment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $fromEmail, $toEmail, $subject, $message, $attachment)
    {
        $this->name = $name;
        $this->fromEmail = $fromEmail;
        $this->toEmail = $toEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send([], [], function ($mailMessage) {
            $mailMessage->to($this->toEmail)
                ->subject($this->subject)
                ->setBody($this->message);

            if ($this->attachment) {
                $mailMessage->attach($this->attachment->getRealPath(), [
                    'as' => $this->attachment->getClientOriginalName(),
                    'mime' => $this->attachment->getMimeType(),
                ]);
            }

            $mailMessage->from($this->fromEmail, $this->name);
        });
    }
}
