<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if ($user && $user->password === $credentials['password']) {
        // Authentication passed, user is logged in
        Auth::login($user);
        return redirect('/dashboard');
    }

    // Authentication failed, redirect back to login form with error message
    return redirect()->back()->withErrors(['Invalid credentials']);
}
}
