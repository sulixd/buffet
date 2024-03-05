<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/auth/redirect', [\App\Http\Controllers\SocialAuthController::class, 'redirect'])->name('social.redirect');
    Route::get('/auth/callback', [\App\Http\Controllers\SocialAuthController::class, 'callback']);
});

Route::get('/auth/logout', [\App\Http\Controllers\SocialAuthController::class, 'logout']);
