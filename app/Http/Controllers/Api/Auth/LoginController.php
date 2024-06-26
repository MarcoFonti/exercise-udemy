<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        /* RECUPERO IL PRIMO RECORD DOVE L'EMAIL FORNITA DALL'UTENTE CORRISPONDE ALL'EMAIL DEL DB */
        $user = User::where('email', $request->email)->first();

        /* CONTROLOLO SE NON L'UTENTE ESISTE E SE LA PASSWORD FORNITA NON CORRISPONDE A QUELLA DEL DB */
        if(!$user || !Hash::check($request->password, $user->password)){

            /* MESSAGGIO DI ERRORE */
            throw ValidationException::withMessages([
                'email' => ["email fornita e' errata."]
            ]);
        } 


        /* RISPOSTA IN JSON CON I DETTAGLI DELL'UTENTE E I UN TOKEN DI ACCESSO */
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Laravel_api_tooken')->plainTextToken
        ]);

    }
}
