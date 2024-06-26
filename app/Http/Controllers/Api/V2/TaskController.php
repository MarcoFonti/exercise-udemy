<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* AUTORIZZO UTENTE CORRENTE A VISSUALIZZARE TASK */
        Gate::authorize('viewAny', Task::class);

        /* RESTITUISCO I TASK PER L'UTENTE AUTENTICATO */
        return TaskResource::collection(auth()->user()->tasks()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        /* VERIFICO SE L'UTENTE AUTENTICATO NON HA IL PERMESSO DI CREARE UN TASK */
        if(request()->user()->cannot('create', Task::class)){

            /* SE NON HA IL PERMESSO MESSAGGIO DI ERRORE */
            abort(403, "azione non autorizzata.");
        }

        /* CREO UN NUOVO TASK NEL DB UTILIZZANDO I DATI VALIDATI */
        $task = $request->user()->tasks()->create($request->validated());

        /* TRASFORMA IL TASK CRATO IN RISORSA JSON */
        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        /* AUTORIZZO L'UTENTE AUTENTICATO A VISSULIZZARE IL SINGOLO TASK */
        Gate::authorize('view', $task);

        /* CON IL METODO MAKE TRASFORMO IL MODELLO PASSATO ('$task') IN UNA RISORSA JSON */
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        /* VERIFICO SE L'UTENTE AUTENTICATO NON HA IL PERMESSO DI AGGIORNARE UN TASK */
        if($request->user()->cannot('update', $task)){

            /* SE NON HA IL PERMESSO MESSAGGIO DI ERRORE */
            abort(403, "azione non autorizzata.");
        }

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

        /* VERIFICO SE L'UTENTE AUTENTICATO NON HA IL PERMESSO DI ELIMINARE UN TASK */
        if(request()->user()->cannot('delete', $task)){

            /* SE NON HA IL PERMESSO MESSAGGIO DI ERRORE */
            abort(403, "azione non autorizzata.");
        }

        /* ELIMINAZIONE TASK */
        $task->delete();

        /* RISPOSTA HTTP STATO 204 */
        return response()->noContent();
    }
}
