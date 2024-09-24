<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthController extends Controller {
    public function show(): View 
        {
            return view('index');
        }
}