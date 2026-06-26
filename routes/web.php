<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
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


Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
