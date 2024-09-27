<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    public function show()
        {
            return view('/login');
        }

    public function login(Request $uzivatel)
        {
            dd($uzivatel->email, $uzivatel->password, $uzivatel->server('NUMBER_OF_PROCESSORS', $uzivatel));
        }

    public function registrace()
        {
            return view('/registrace');
        }

    public function zaregistruj(Request $registrace)
        {
            dd($registrace->jmeno, $registrace->email, $registrace->password1, $registrace->password2);
        }
}