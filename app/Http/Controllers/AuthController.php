<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{


public function store(Request $request)
{
    $userData = $request->only([
        'name',
        'email',
        'password',
        'role',
        'designation',
        'status',
    ]);

    // Hash the password
    $userData['password'] = Hash::make($userData['password']);

    // Create a new user with the submitted data
    $user = User::create([
        'name' => $userData['name'],
        'email' => $userData['email'],
        'password' => $userData['password'],
        'role' => $userData['role'],
        'designation' => $userData['designation'],
        'status' => $userData['status'],
    ]);

    // Optionally, you can redirect the user to a success page
    return redirect('/dashboard');
}


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        // Authentication passed, user is logged in
        Auth::login($user);
        return redirect('/dashboard');
    }

    // Authentication failed, redirect back to login form with error message
    return redirect()->back()->withErrors(['Invalid credentials']);
}
public function userList()
{
    $users = User::all(); // Retrieve all users from the database

    return view('userList', compact('users'));
}

public function destroy($id)
{
    // Find the user record by ID
    $user = User::findOrFail($id);

    // Delete the user record
    $user->delete();

    // Redirect back to the user list page
    return redirect()->route('userList')->with('success', 'User deleted successfully');
}


}
