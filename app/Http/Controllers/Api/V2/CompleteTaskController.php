<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task)
    {
        /* IMPOSTO IL VALORE DEL TASK COMPLETATO O NO CON IL VALORE FORNITO DALLA RICHIESTA */
        $task->is_completed = $request->is_completed;

        /* SALVO LE MODIFICHE */
        $task->save();

        /* TASK AGGIORNATO */
        return TaskResource::make($task);
    }
}
