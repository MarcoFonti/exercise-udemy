<?php

/* ROTTE TASKS V2 */
use App\Http\Controllers\Api\V2\CompleteTaskController;
use App\Http\Controllers\Api\V2\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v2')->group(function(){
    Route::apiResource('/tasks', TaskController::class);

    /* API TASK COMPLETATA */
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});