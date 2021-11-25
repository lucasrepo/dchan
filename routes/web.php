<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
 
 
Route::get('contact-form-captcha', [AccountController::class, 'index']);
Route::post('register', [AccountController::class, 'formRegister']);
Route::post('login', [AccountController::class, 'formLogin']);
Route::get('/', function () {
    return view('home');
});
Route::get('account', [AccountController::class, 'index']);

Route::get('p/{username}', [IndexController::class, 'profile']);