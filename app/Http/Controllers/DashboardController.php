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
        $ukoly = Ukoly::where('id_uzivatele', Auth::id())
        ->where('stav', '!=', 'dokonceny')
        ->paginate(10);

        // Načtu úkoly, které patří přihlášenému uživateli, mají datum ukončení dnes a nejsou dokončené
        $dnesniukoly = Ukoly::where('id_uzivatele', Auth::id())
        ->whereDate('planovany_datum_ukonceni', $dnesniDatum)
        ->where('stav', '!=', 'dokonceny')
        ->paginate(10);

        // Načtu úkoly, které patří přihlášenému uživateli a jsou dokončené
        $dokonceneukoly = Ukoly::where('id_uzivatele', Auth::id())
        ->where('stav', 'dokonceny')
        ->paginate(10);

        
        // Předám všechny sady dat do pohledu
        return view('dashboard', [
            "ukoly" => $ukoly, 
            "dnesniukoly" => $dnesniukoly,
            "dokonceneukoly" => $dokonceneukoly
        ]);
    }


    public function destroy($id)
    {   
        $ukol = Ukoly::findOrFail($id);
        $ukol->delete();

        return redirect()->route('dashboard')->with('success', 'Úkol byl úspěšně smazán.');
    }

    public function edit($id)
    {
        $ukol = Ukoly::findOrFail($id);
        return view('edit', compact('ukol'));
    }

    public function complete($id)
    {
        // Najdi úkol
        $ukol = Ukoly::findOrFail($id);
    
        // Aktualizuj stav úkolu na 'dokonceny'
        $ukol->stav = 'dokonceny';
        $ukol->save();
    
        // Přesměruj zpět na dashboard s potvrzující zprávou
        return redirect()->route('dashboard')->with('success', 'Úkol byl úspěšně dokončen.');
    }

}
