<?php
use App\Models\viewEmail;
use App\Models\addEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\viewemailController;
use App\Http\Controllers\addemailController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\deleteemailController;
use App\Http\Controllers\headerController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SendEmailController;
Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('addCustomer', function () {
    return view('addCustomer');
});

Route::post('/addCustomer', [customerController::class, 'addCustomer']);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('sendEmail', function () {
    return view('sendEmail');
});

Route::get('addEmail', function () {
    return view('addEmail');
});

Route::get('config', function () {
    return view('config');
});

Route::post('config', [configController::class, 'updateConfig']);

Route::get('viewEmail',[viewemailController::class,'Show']);

Route::post('addEmail',[addemailController::class, 'store']);

Route::post('send-email', 'App\Http\Controllers\SendEmailController@send')->name('send.email');

Route::delete('email/{id}', [deleteemailController::class, 'destroy'])->name('email.delete');

Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/customerList', [CustomerController::class, 'customerList'])->name('customers');
Route::delete('/customerList/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::get('addUser', function () {
    return view('adduser');
});
Route::post('/addUser', [AuthController::class, 'store']);

Route::get('userList', function () {
    return view('userList');
});
Route::get('/userList', [AuthController::class, 'userList']);
Route::delete('/userList/{id}', [AuthController::class, 'destroy']);
