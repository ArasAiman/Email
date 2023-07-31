<?php

// app/Http/Controllers/SendEmailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendEmailJob;

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

    // Check if "Select All" option is selected
    if (in_array('Select All', $toEmails)) {
        // Fetch all email addresses from the database
        $toEmails = DB::table('customers')->pluck('email')->toArray();
    }

    foreach ($toEmails as $toEmail) {
        // Move the uploaded file to the storage directory
        $attachmentPath = $attachment ? $attachment->storeAs('attachments', $attachment->getClientOriginalName()) : null;

        // Send email to each recipient using the queue
        SendEmailJob::dispatch($name, $fromEmail, $toEmail, $subject, $message, $attachmentPath);
    }

    return redirect()->back()->with('success', 'Emails have been sent.');
}


}
