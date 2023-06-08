<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->scopes(['profile', 'email']) // Add any additional required scopes
        ->redirect();

    }

    public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->user();

    // Check if the user already exists in your database
    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        // Log in the existing user
        Auth::login($existingUser);
    } else {
        // Create a new user account
        $newUser = new User();
        $newUser->email = $user->getEmail();
        $newUser->google_id = $user->getId();
        // Set any additional fields you want to populate

        // Fetch the user's name using the Google People API
        $accessToken = $user->token;
        $googleClient = new \Google_Client();
        $googleClient->setAccessToken($accessToken);
        $peopleService = new \Google_Service_People($googleClient);
        $person = $peopleService->people->get('people/me', ['personFields' => 'names']);
        $name = $person->getNames()[0]->getDisplayName();

        $newUser->name = $name;

        $newUser->save();

        // Log in the new user
        Auth::login($newUser);
    }

    // Redirect the user after login
    return redirect('/dashboard');
}



    public function logout()
{
    Auth::logout();

    // Redirect the user to the login page or any other desired page
    return redirect('/');
}
}
