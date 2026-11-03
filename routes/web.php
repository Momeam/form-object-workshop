<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PurchasesController;
use App\Http\Forms\PublishPostForm;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = User::make([
        'name' => 'Taylor Otwell',
    ]);
    $user->created_at = now()->subDays(2);

    return view('welcome', compact('user'));
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login.store');

    Route::get('/forgot-password', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLinkEmail'])
        ->middleware('throttle:password-reset')
        ->name('password.email');
    Route::get('/reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/posts', function (PublishPostForm $form) {
    $form->save();

    return 'Success!';
});

Route::get('/purchases', [PurchasesController::class, 'purchase'])->name('purchases.purchase');
