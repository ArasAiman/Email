<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();

}

public function handleGoogleCallback()
{
    $user = Socialite::driver('google')->setClientId('91908107627-82gajjaquga71hktuaa8f5gvidk4ossa.apps.googleusercontent.com')->user();

    // Check if the user already exists in your database
    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        // Log in the existing user
        Auth::login($existingUser);
    } else {
        // Create a new user account
        $newUser = new User();
        $newUser->name = $user->getName();
        $newUser->email = $user->getEmail();
        $newUser->google_id = $user->getId();
        // Set any additional fields you want to populate

        $newUser->save();

        // Log in the new user
        Auth::login($newUser);
    }

    // Redirect the user after login
    return redirect('/dashboard');
}
}
