<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $fromEmail = $request->input('from_email');
        $toEmailIDs = $request->input('to_email'); // Array of selected IDs

        // Fetch email addresses based on the selected IDs
        $toEmails = [];
        if (in_array("all", $toEmailIDs)) {
            // Fetch all email addresses from the database
            $toEmails = DB::table('viewemail')->pluck('email')->toArray();
        } else {
            foreach ($toEmailIDs as $emailID) {
                // Fetch email address based on the ID using your database query
                $email = DB::table('viewemail')->where('id', $emailID)->value('email');
                if ($email) {
                    $toEmails[] = $email;
                }
            }
        }

        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachment = $request->file('attachment');

        $data = [
            'name' => $name,
            'fromEmail' => $fromEmail,
            'subject' => $subject,
            'message' => $message,
        ];

        // Check if attachment exists
        if ($attachment) {
            // Get the original file name
            $filename = $attachment->getClientOriginalName();

            // Store the attachment in the storage directory
            Storage::disk('local')->putFileAs('attachments', $attachment, $filename);

            // Set the attachment file path
            $attachmentPath = storage_path('app/attachments/' . $filename);

            // Attach the file to the email
            Mail::to($toEmails)->send(new SendEmail($data, $attachmentPath));
        } else {
            // No attachment provided
            Mail::to($toEmails)->send(new SendEmail($data));
        }

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}


