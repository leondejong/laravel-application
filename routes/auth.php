<?php

use App\Http\Controllers\AuthenticationController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Register
    Route::get('register', [AuthenticationController::class, 'register'])
        ->name('register');
    Route::post('register', [AuthenticationController::class, 'create']);
    // Login
    Route::get('login', [AuthenticationController::class, 'login'])
        ->name('login');
    Route::post('login', [AuthenticationController::class, 'authenticate']);
    // Forgot Password
    Route::get('forgot-password', [AuthenticationController::class, 'forgot'])
        ->name('password.request');
    Route::post('forgot-password', [AuthenticationController::class, 'send'])
        ->name('password.email');
    // Reset Password
    Route::get('reset-password/{token}', [AuthenticationController::class, 'reset'])
        ->name('password.reset');
    Route::post('reset-password', [AuthenticationController::class, 'update'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    // Verify E-mail Address
    Route::get('verify-email', [AuthenticationController::class, 'verify'])
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [AuthenticationController::class, 'mark'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [AuthenticationController::class, 'notify'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    // Confirm Password
    Route::get('confirm-password', [AuthenticationController::class, 'confirm'])
        ->name('password.confirm');
    Route::post('confirm-password', [AuthenticationController::class, 'approve']);
    // Logout
    Route::post('logout', [AuthenticationController::class, 'logout'])
        ->name('logout');
});
