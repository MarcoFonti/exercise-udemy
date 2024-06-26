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
        /* CONTROLLO SE L'AUTENTICAZIONE FALLISCE */
        if(!auth()->attempt($request->only(['email', 'password']))){

            /* SE FALLISCE MESSAGGIO DI ERRORE */
            throw ValidationException::withMessages([
                'email' => ["email fornita e' errata."]
            ]);
        }

    }
}
