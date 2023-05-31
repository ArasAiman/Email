<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConfigController extends Controller
{
    public function updateConfig(Request $request)
    {
        // Retrieve form input values
        $mailServer = $request->input('mailserver-config');
        $gate = $request->input('gate-config');
        $email = $request->input('email-config');
        $password = $request->input('password-config');

        // Read the contents of the .env file
        $envFile = base_path('.env');
        $envContents = File::get($envFile);

        // Replace the desired values in the .env file
        $updatedEnvContents = preg_replace(
            [
                '/MAIL_HOST=.*/',
                '/MAIL_PORT=.*/',
                '/MAIL_USERNAME=.*/',
                '/MAIL_PASSWORD=.*/'
            ],
            [
                'MAIL_HOST=' . $mailServer,
                'MAIL_PORT=' . $gate,
                'MAIL_USERNAME=' . $email,
                'MAIL_PASSWORD=' . $password
            ],
            $envContents
        );

        // Write the updated contents back to the .env file
        File::put($envFile, $updatedEnvContents);

        // Redirect the user back to the form or wherever you want
        return redirect()->back()->with('success', 'Environment variables updated successfully.');
    }
}
