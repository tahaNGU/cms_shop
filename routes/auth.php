<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\ConfirmablePasswordController;
use App\Http\Controllers\auth\EmailVerificationNotificationController;
use App\Http\Controllers\auth\EmailVerificationPromptController;
use App\Http\Controllers\auth\NewPasswordController;
use App\Http\Controllers\auth\PasswordController;
use App\Http\Controllers\auth\PasswordResetLinkController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])->middleware(['throttle:50,1'])->name('register.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.mobile');

    Route::get('reset-password/{mobile}', [NewPasswordController::class, 'create'])
                ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');



    Route::get('active/{mobile_decode}', [\App\Http\Controllers\auth\activeController::class, 'active'])
        ->name('active.account');
    Route::post('active', [\App\Http\Controllers\auth\activeController::class, 'store'])
        ->name('active.store');
    Route::post('active_ajax', [\App\Http\Controllers\auth\activeController::class, 'active_ajax'])
        ->name('active_ajax');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
