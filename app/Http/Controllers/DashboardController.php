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

        // Získám aktuální datum
        $dnesniDatum = Carbon::now()->format('Y-m-d');

        // Nejprve se zeptám na data modelu
        $ukoly = Ukoly::where('id_uzivatele', Auth::id())->get();

        // Načtu úkoly, které patří přihlášenému uživateli a mají datum ukončení dnes
        $dnesniukoly = Ukoly::where('id_uzivatele', Auth::id())
        ->whereDate('planovany_datum_ukonceni', $dnesniDatum)
        ->get();

        
        // Předám obě sady dat do pohledu
        return view('dashboard', [
            "ukoly" => $ukoly, 
            "dnesniukoly" => $dnesniukoly
        ]);
    }
}
