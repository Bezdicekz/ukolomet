<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukoly;
use Illuminate\Support\Facades\Auth;

class UkolyController extends Controller
{
    //
    public function show() 
    {
        return view('ukol');
    }

    public function store(Request $request)
    {
        // Validace dat
        $validatedData = $request->validate([
            'nazev' => 'required|string|max:255',
            'popis' => 'required|string',
            'id_projektu' => 'required|integer',
            'id_nadrazeneho_ukolu' => 'nullable|integer',
            'celkovy_cas_ukolu' => 'required|integer',
            'datum_zahajeni' => 'required|date',
            'planovany_datum_ukonceni' => 'required|date',
            'datum_ukonceni' => 'nullable|date',
            'stav' => 'required|string',
            'rozpocet' => 'required|numeric',
        ]);

        // Přidání id přihlášeného uživatele
        $validatedData['id_uzivatele'] = Auth::id();

        // Vytvoření nového záznamu
        Ukoly::create($validatedData);

        return redirect()->back()->with('success', 'Úkol byl úspěšně vytvořen.');
    }

        // Zobrazení formuláře pro editaci úkolu
        public function edit($id)
        {
            // Načtení úkolu podle ID
            $ukol = Ukoly::findOrFail($id);
    
            // Zobrazení šablony s daty úkolu
            return view('ukol-edit', ['ukol' => $ukol]);
        }
    
        // Uložení změn po editaci
        public function update(Request $request, $id)
        {
            // Validace dat
            $validatedData = $request->validate([
                'nazev' => 'required|string|max:255',
                'popis' => 'required|string',
                'id_projektu' => 'required|integer',
                'id_nadrazeneho_ukolu' => 'nullable|integer',
                'celkovy_cas_ukolu' => 'required|integer',
                'datum_zahajeni' => 'required|date',
                'planovany_datum_ukonceni' => 'required|date',
                'datum_ukonceni' => 'nullable|date',
                'stav' => 'required|string',
                'rozpocet' => 'required|numeric',
            ]);
    
            // Načtení úkolu z databáze
            $ukol = Ukoly::findOrFail($id);
    
            // Aktualizace úkolu s validovanými daty
            $ukol->update($validatedData);
    
            // Přesměrování zpět s úspěšnou zprávou
            return redirect()->route('dashboard')->with('success', 'Úkol byl úspěšně aktualizován.');
        }
}
