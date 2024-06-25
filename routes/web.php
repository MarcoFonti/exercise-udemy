<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function (){

    /* ROTTA LOGIN */
    Route::post('/login', LoginController::class);
    /* ROTTA LOGOUT */
    Route::post('/logout', LogoutController::class);
});