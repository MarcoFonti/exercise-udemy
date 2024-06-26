<?php

namespace App\Http\Controllers\Auth;

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
        /* $user = User::where('email', $request->email)->first(); */

        /* CONTROLOLO SE NON L'UTENTE ESISTE E SE LA PASSWORD FORNITA NON CORRISPONDE A QUELLA DEL DB 
        if(!$user || !Hash::check($request->password, $user->password)){

            /* MESSAGGIO DI ERRORE 
            throw ValidationException::withMessages([
                'email' => ["email fornita e' errata."]
            ]);
        } */

        /* CONTROLLO SE L'AUTENTICAZIONE FALLISCE */
        if(!auth()->attempt($request->only(['email', 'password']))){

            /* SE FALLISCE MESSAGGIO DI ERRORE */
            throw ValidationException::withMessages([
                'email' => ["email fornita e' errata."]
            ]);
        }

    }
}
