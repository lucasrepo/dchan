<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\IndexController;

Route::get('contact-form-captcha', [AccountController::class, 'index']);

/* Inicio de sesion y registro */
Route::post('register', [AccountController::class, 'formRegister']);
Route::post('login', [AccountController::class, 'formLogin']);

Route::view('login', 'login');
Route::view('register', 'register');

Route::view('reset-password', 'reset-password');
Route::post('reset-password', [AccountController::class, 'resetPassword']);

Route::get('sign-out', [AccountController::class, 'signOut']);

Route::get('/', function () {
    return view('home');
});

Route::get('account', [AccountController::class, 'index']);

Route::get('p/{username}', [IndexController::class, 'profile']);
