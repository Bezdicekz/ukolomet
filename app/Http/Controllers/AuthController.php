<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller {
    public function show()
        {
            return view('/login');
        }

    public function login(Request $uzivatel)
        {
            dd($uzivatel->email, $uzivatel->password, $uzivatel->server('COMPUTERNAME'), $uzivatel);
        }

    public function registrace()
        {
            return view('/registrace');
        }

    public function zaregistruj(Request $registrace)
        {
            User::create([
                'name' => $registrace->jmeno,
                'email' => $registrace->email,
                'password' => $registrace->password1,
                'hodinova-sazba' => 250,
            ]);
        }
}