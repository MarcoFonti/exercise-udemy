<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('v1')->group(function(){
    Route::apiResource('/tasks', TaskController::class);

    /* API TASK COMPLETATA */
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});
    

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
