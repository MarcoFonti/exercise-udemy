<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function (){

    /* ROTTA LOGIN */
    Route::post('/login', LoginController::class)->middleware('guest');
    /* ROTTA LOGOUT */
    Route::post('/logout', LogoutController::class);
    /* ROTTA REGISTRAZIONE */
    Route::post('/register', RegisterController::class);
});