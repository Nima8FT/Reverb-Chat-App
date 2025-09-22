<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('show.login');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('show.register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('chat/{user}', [AuthController::class, 'chat'])->name('chat');
});
