<?php
// app/Http/Controllers/SendEmailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendEmailJob;
use App\Models\EmailTemplate; // Make sure to import the EmailTemplate model

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        // Your existing code to retrieve form inputs
        $name = $request->input('name');
        $fromEmail = $request->input('fromemail');
        $toEmails = $request->input('to_email');
        $subject = $request->input('subject');
        $attachment = $request->file('attachment');

        // Fetch the selected template from the database based on the template ID
        $templateId = $request->input('template');
        $template = EmailTemplate::find($templateId);

        if (!$template) {
            return redirect()->back()->with('error', 'Selected template not found.');
        }

        // Check if "Select All" option is selected
        if (in_array('Select All', $toEmails)) {
            // Fetch all email addresses and names from the database
            $recipientData = DB::table('customers')->pluck('name', 'email');
        } else {
            // Fetch names of selected recipients from the database based on the email addresses
            $recipientData = DB::table('customers')->whereIn('email', $toEmails)->pluck('name', 'email');
        }

        // Send email to each recipient using the queue
        foreach ($recipientData as $email => $recipientName) {
            // Replace placeholders in the template content with actual values
            $message = $template->content;
            $personalizedMessage = str_replace('[RecipientName]', $recipientName, $message);
            $personalizedMessage = str_replace('[SenderName]', $name, $personalizedMessage);

            // Move the uploaded file to the storage directory
            $attachmentPath = $attachment ? $attachment->storeAs('attachments', $attachment->getClientOriginalName()) : null;

            // Send email to each recipient using the queue
            SendEmailJob::dispatch($name, $fromEmail, $email, $subject, $personalizedMessage, $attachmentPath);
        }

        return redirect()->back()->with('success', 'Emails have been sent.');
    }
}
