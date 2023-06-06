<?php
use App\Models\viewEmail;
use App\Models\addEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewemailController;
use App\Http\Controllers\addemailController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\deleteemailController;
use App\Http\Controllers\headerController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('addCustomer', function () {
    return view('addCustomer');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

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
