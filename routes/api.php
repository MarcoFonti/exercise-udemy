<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* RECUPERO ROTTE V1-V2 */
require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';

Route::prefix('auth')->group(function (){

    /* ROTTA LOGIN */
    Route::post('/login', LoginController::class);
    /* ROTTA LOGOUT */
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    /* ROTTA REGISTRAZIONE */
    Route::post('/register', RegisterController::class);
});
    

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
