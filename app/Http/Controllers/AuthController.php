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
            dd($uzivatel, $uzivatel->email, $uzivatel->password);
        }

    public function registrace()
        {
            return view('/registrace');
        }
}