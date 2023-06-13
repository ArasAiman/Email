<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $fromEmail = $request->input('fromemail');
        $toEmails = $request->input('to_email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachment = $request->file('attachment');

        if (in_array('all', $toEmails)) {
            // Fetch all email addresses from the database
            $toEmails = DB::table('customers')->pluck('email')->toArray();
        }

        foreach ($toEmails as $toEmail) {
            // Send email to each recipient
            Mail::send([], [], function ($mailMessage) use ($name, $fromEmail, $toEmail, $subject, $message, $attachment) {
                $mailMessage->to($toEmail)
                    ->subject($subject)
                    ->setBody($message);

                if ($attachment) {
                    $mailMessage->attach($attachment->getRealPath(), [
                        'as' => $attachment->getClientOriginalName(),
                        'mime' => $attachment->getMimeType(),
                    ]);
                }

                $mailMessage->from($fromEmail, $name);
            });
        }

        return redirect()->back()->with('success', 'Emails have been sent.');
    }

}
