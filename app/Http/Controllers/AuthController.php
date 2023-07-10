<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
    return redirect('/userList');
}


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        // Authentication passed, user is logged in
        Auth::login($user);
        return redirect('/home');
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

public function editUser(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable',
        'role' => 'nullable',
        'designation' => 'nullable',
        'email' => 'nullable|email',
        'password' => 'nullable|min:8',
        'status' => 'nullable'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Get the authenticated user
    $user = Auth::user();

    // Update the user's data if entered
    if ($request->filled('name')) {
        $user->name = $request->input('name');
    }

    if ($request->filled('role')) {
        $user->role = $request->input('role');
    }

    if ($request->filled('designation')) {
        $user->designation = $request->input('designation');
    }

    if ($request->filled('email')) {
        $user->email = $request->input('email');
    }

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    if ($request->filled('status')) {
        $user->status = $request->input('status');
    }

    // Save the updated user data
    $user->save();

    // Redirect the user to a relevant page after successful profile update
    return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
}

}
