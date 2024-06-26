<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        /* CREO UN NUOVO UTENTE NEL DB CON I DATI FORNITI DALLA RICHIESTA */
        $user = User::create($request->getData());

        /* RISPOSTA IN JSON CON I DETTAGLI DELL'UTENTE E I UN TOKEN DI ACCESSO */
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Laravel_api_tooken')->plainTextToken
        ]);
    }
}
