<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.homepage');
})->name('homepage');


//Session
Route::get('/login',[SessionController::class,'create'])->name('login');

Route::post('/login',[SessionController::class,'store'])
    ->middleware('throttle:6,1')
    ->name('login.store');

Route::post('/logout',[SessionController::class,'destroy'])->name('logout');

// Auth
Route::get('/register',[AuthController::class , 'create'])->name('register');
Route::post('/register',[AuthController::class , 'store'])->name('register.store');


//Profile
Route::middleware(['auth'])->group( function () {
    Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});


//Verify Email
// 1. Mail Onaylatma uyarısı sayfası
Route::get('/email/verify', [VerifyController::class,'notice'])
    ->middleware('auth')
    ->name('verification.notice');

// 2. Maildeki linke tıklandığında doğrulama yapan rota
Route::get('/email/verify/{id}/{hash}', [VerifyController::class , 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

// 3. Onay mailini tekrar gönderme butonu için
Route::post('/email/verification-notification', [VerifyController::class , 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
