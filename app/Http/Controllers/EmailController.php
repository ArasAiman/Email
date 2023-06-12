<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Customer;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $name = $request->input('name');
        $fromEmail = $request->input('fromemail');
        $selectedEmails = $request->input('to_email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $attachments = [];

        if ($request->hasFile('attachment')) {
            $uploadedFiles = $request->file('attachment');

            foreach ($uploadedFiles as $file) {
                if ($file->isValid()) {
                    $path = $file->store('attachments');
                    $attachments[] = storage_path('app/' . $path);
                } else {
                    return redirect()->back()->withErrors(['error' => 'Invalid file uploaded.']);
                }
            }
        }

        // Send email using Laravel queue
        try {
            Mail::to($selectedEmails)
                ->queue(new SendEmail($name, $fromEmail, $subject, $message, $attachments));

            return redirect()->back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to send email.']);
        }
    }
}
