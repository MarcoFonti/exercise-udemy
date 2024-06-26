<?php

namespace App\Http\Controllers\Auth;

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
        /* CREO UN NUOVO UTENTE NEL DB CON I DATI VALIDATI E CIFRATI */
        User::create($request->getData());
    }
}
