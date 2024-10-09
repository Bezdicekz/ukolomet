<?php

namespace App\Http\Controllers;

use App\Models\Projekty;
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
        // Vytvoření nového projektu pro přihlášeného uživatele
        Projekty::create([
            'nazev' => $request->nazev,
            'popis' => $request->popis,
            'datum_zahajeni' => $request->datum_zahajeni,
            'datum_ukonceni' => $request->datum_ukonceni,
            'Mnozstvi_casu' => $request->Mnozstvi_casu,
            'planovana_naklady' => $request->planovana_naklady,
            'uzivatel_id' => Auth::id(),
        ]);

        return redirect()->route('projekty.index');
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
}
