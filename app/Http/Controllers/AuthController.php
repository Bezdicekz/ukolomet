<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    public function show()
        {
            return view('/login');
        }

    public function login(Request $request)
        {
            dd($request->email, $request->password);
        }

    public function register()
        {
            return view('/register');
        }
}