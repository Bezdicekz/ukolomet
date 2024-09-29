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

            // Validace

            $validated = $registrace->validate([
                'jmeno' => 'required|min:3',
                'email' => 'required|unique:users,email', // validuje email jestli existuje v databázi.
                'password1' => 'required',
            ],
            [
                'jmeno.required' => "Uživatel musí mít jméno!", // Vlastní chybová hláška
                'jmeno.min' => "Jméno musí být alespoň 3 znaky dlouhé!",
                'email.unique' => "Email již existuje",
            ]);


            // ukládaní dat do databáze

            User::create([
                'name' => $registrace->jmeno,
                'email' => $registrace->email,
                'password' => $registrace->password1,
                'hodinova-sazba' => 250,
            ]);
           return to_route('dashboard'); // díky tomu že je na routru jméno, mohu požít tento příkaz
                                         // šlo by použít i toto:
                                         // return redirect('/dashboard')
                                         // vtom případě nemusí být na routru jméno.
        }
}