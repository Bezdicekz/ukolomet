<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ukoly;
use App\Models\Projekty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Načtu projekty a spočítám celkový čas úkolů pro každý projekt
        $projekty = Projekty::where('uzivatel_id', Auth::id())->get();
        
        // Proměnná, která určuje, zda má uživatel projekty
        $hasProjects = $projekty->isNotEmpty();
            
        // Přidám do každého projektu celkový čas úkolů
        foreach ($projekty as $projekt) {
        $projekt->celkovy_cas = Ukoly::celkovyCasUkoluProProjekt($projekt->id);
        $projekt->celkova_cena = Ukoly::celkovaCenaProjektu($projekt->id);
        }

        // Předám všechny sady dat do pohledu
        return view('dashboard', [
            'hasProjects' => $hasProjects,
            "ukoly" => $ukoly, 
            "dnesniukoly" => $dnesniukoly,
            "dokonceneukoly" => $dokonceneukoly,
            "projekty" => $projekty
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

    public function nedokonceny($id)
    {
        // Najdi úkol
        $ukol = Ukoly::findOrFail($id);
    
        // Aktualizuj stav úkolu na 'rozpracovaný'
        $ukol->stav = 'v_procesu';
        $ukol->save();
    
        // Přesměruj zpět na dashboard s potvrzující zprávou
        return redirect()->route('dashboard')->with('success', 'Úkol byl úspěšně otevřen.');
    }

    public function ukoly()
    {
        // Načtu projekty pro přihlášeného uživatele
        $projekty = Projekty::where('uzivatel_id', Auth::id())->get();
    
        // Přidám úkoly k projektům
        foreach ($projekty as $projekt) {
            $projekt->celkovy_cas = Ukoly::celkovyCasUkoluProProjekt($projekt->id);
            $projekt->celkova_cena = Ukoly::celkovaCenaProjektu($projekt->id);
            
            // Načítám úkoly přiřazené k projektu
            $projekt->ukoly = Ukoly::where('id_projektu', $projekt->id)
                ->where('id_uzivatele', Auth::id())
                ->get();
        }
    
        // Načtu úkoly, které nejsou přiřazeny žádnému projektu
        $ukolyBezProjektu = Ukoly::where('id_projektu', 0)
            ->where('id_uzivatele', Auth::id())
            ->get();
    
        // Předám projekty a úkoly bez projektu do pohledu
        return view('ukoly', [
            'projekty' => $projekty,
            'ukolyBezProjektu' => $ukolyBezProjektu, // Předáme úkoly bez projektu
        ]);
    }

}
