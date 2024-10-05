<?php

namespace App\Http\Controllers;

use App\Models\Ukoly;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() 
    {
        // Nejprve se zeptám na data modelu
        $ukoly = Ukoly::where('id_uzivatele', Auth::id())->get();

        // Pole dat přidám jako parametr ke stránce
        return view('dashboard',["ukoly" => $ukoly]);
    }
}
