<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* RECUPERO TUTTI TASK */
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        /* CREO UN NUOVO TASK NEL DB UTILIZZANDO I DATI VALIDATI */
        $task = Task::create($request->validated());

        /* TRASFORMA IL TASK CRATO IN RISORSA JSON */
        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        /* CON IL METODO MAKE TRASFORMO IL MODELLO PASSATO ('$task') IN UNA RISORSA JSON */
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {

        /* AGGIORNO IL TASK NEL DB E APPLICO UPDATE PER APPLICARE I DATI VALIDATI */
        $task->update($request->validated());

        /* TRASFORMA IL TASK CRATO IN RISORSA JSON */
        return TaskResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        /* ELIMINAZIONE TASK */
        $task->delete();

        /* RISPOSTA HTTP STATO 204 */
        return response()->noContent();
    }
}
