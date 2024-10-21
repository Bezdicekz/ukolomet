<?php

namespace App\Http\Controllers;

use App\Models\Projekty;
use App\Models\Ukoly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjektyController extends Controller
{
    public function index()
    {
        // Získání projektů přihlášeného uživatele
        $projekty = Projekty::where('uzivatel_id', Auth::id())->get();
        
        // Pokud uživatel nemá žádné projekty, zobrazíme formulář pro nový projekt
        if ($projekty->isEmpty()) {
            return view('projekty.create');
        }

        // Jinak zobrazíme seznam projektů
        return view('projekty.index', compact('projekty'));
    }

    public function create()
    {
        return view('projekty.create');
    }

    public function store(Request $request)
    {
        // Validace formuláře
        $validated = $request->validate([
            'nazev' => 'required|string|max:255',
            'popis' => 'required|string',
            'datum_zahajeni' => 'required|date',
            'datum_ukonceni' => 'required|date|after_or_equal:datum_zahajeni',
            'Mnozstvi_casu' => 'nullable|numeric|min:0',
            'planovana_naklady' => 'nullable|numeric|min:0',
        ], [
            'nazev.required' => 'Pole název je povinné.',
            'nazev.max' => 'Název projektu nesmí být delší než 255 znaků.',
            'popis.required' => 'Popis projektu je povinný.',
            'datum_zahajeni.required' => 'Datum zahájení projektu je povinné.',
            'datum_ukonceni.required' => 'Datum ukončení projektu je povinné.',
            'datum_ukonceni.after_or_equal' => 'Datum ukončení musí být po nebo rovno datu zahájení.',
            'Mnozstvi_casu.numeric' => 'Množství času musí být číslo.',
            'planovana_naklady.numeric' => 'Plánované náklady musí být číslo.',
        ]);

        // Pokud nejsou hodnoty zadány, nahradí se nulou
        $mnozstvi_casu = $request->filled('Mnozstvi_casu') ? $request->input('Mnozstvi_casu') : 0;
        $planovana_naklady = $request->filled('planovana_naklady') ? $request->input('planovana_naklady') : 0;

        // Vytvoření nového projektu pro přihlášeného uživatele
        Projekty::create([
            'nazev' => $validated['nazev'],
            'popis' => $validated['popis'],
            'datum_zahajeni' => $validated['datum_zahajeni'],
            'datum_ukonceni' => $validated['datum_ukonceni'],
            'Mnozstvi_casu' => $validated['Mnozstvi_casu'],
            'planovana_naklady' => $validated['planovana_naklady'],
            'uzivatel_id' => auth()->id(), // přiřazení aktuálního přihlášeného uživatele
        ]);

        return redirect()->route('projekty.index')->with('success', 'Projekt byl úspěšně vytvořen.');
    }

    public function edit($id)
    {
        $projekt = Projekty::findOrFail($id);

        // Ověříme, zda projekt patří přihlášenému uživateli
        if ($projekt->uzivatel_id != Auth::id()) {
            abort(403);
        }

        return view('projekty.edit', compact('projekt'));
    }

    public function update(Request $request, $id)
    {
        $projekt = Projekty::findOrFail($id);

        // Ověříme, zda projekt patří přihlášenému uživateli
        if ($projekt->uzivatel_id != Auth::id()) {
            abort(403);
        }

        $projekt->update($request->all());

        return redirect()->route('projekty.index');
    }

    public function destroy(Request $request, $id)
{
    $projekt = Projekty::findOrFail($id);

    // Zpracování vybrané možnosti
    if ($request->input('delete_option') === 'smazat_ukoly') {
        // Smažeme projekt i úkoly
        Ukoly::where('id_projektu', $projekt->id)->delete();
        $projekt->delete();
        return redirect()->route('projekty.index')->with('success', 'Projekt i úkoly byly úspěšně smazány.');
    } else if ($request->input('delete_option') === 'presunout_ukoly') {
        $novy_projekt_id = $request->input('novy_projekt');
        // Přesuneme úkoly do nového projektu
        Ukoly::where('id_projektu', $projekt->id)->update(['id_projektu' => $novy_projekt_id]);
        $projekt->delete();
        return redirect()->route('projekty.index')->with('success', 'Projekt byl smazán a úkoly byly přesunuty.');
    }

    return redirect()->route('projekty.index')->with('error', 'Nastala chyba při odstraňování projektu.');
}
}
