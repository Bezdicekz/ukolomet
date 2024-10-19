<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukoly;
use Illuminate\Support\Facades\Auth;
use App\Models\Projekty;

class UkolyController extends Controller
{
    //
    public function show() 
        {
            // Načtení projektů přihlášeného uživatele
            $projekty = Projekty::where('uzivatel_id', Auth::id())->pluck('nazev', 'id');

            // Předání projektů do view
            return view('ukol', compact('projekty'));
            
        }

    public function store(Request $request)
        {

        // Vlastní validační hlášky
        $messages = [
            'nazev.required' => 'Název úkolu je povinný.',
            'popis.required' => 'Popis úkolu je povinný.',
            'id_projektu.required' => 'Je nutné vybrat projekt.',
            'celkovy_cas_ukolu.required' => 'Musíte zadat celkový čas úkolu.',
            'celkovy_cas_ukolu.integer' => 'Čas úkolu musí být celé číslo.',
            'datum_zahajeni.required' => 'Datum zahájení je povinné.',
            'datum_zahajeni.date' => 'Datum zahájení musí být platné datum.',
            'planovany_datum_ukonceni.required' => 'Plánovaný datum ukončení je povinný.',
            'planovany_datum_ukonceni.date' => 'Plánovaný datum ukončení musí být platné datum.',
            'datum_ukonceni.date' => 'Datum ukončení musí být platné datum.',
            'stav.required' => 'Stav úkolu je povinný.',
            'rozpocet.numeric' => 'Rozpočet musí být číslo.',
        ];

        // Validace dat
        $validatedData = $request->validate([
            'nazev' => 'required|string|max:255',
            'popis' => 'required|string',
            'id_projektu' => 'required|integer|in:0,' . implode(',', Projekty::pluck('id')->toArray()), // Povolí hodnotu 0 nebo existující id z tabulky
            'id_nadrazeneho_ukolu' => 'nullable|integer',
            'celkovy_cas_ukolu' => 'nullable|integer',
            'datum_zahajeni' => 'required|date',
            'planovany_datum_ukonceni' => 'required|date',
            'datum_ukonceni' => 'nullable|date',
            'stav' => 'required|string',
            'rozpocet' => 'nullable|numeric',
        ], $messages);

        // Přidání id přihlášeného uživatele
        $validatedData['id_uzivatele'] = Auth::id();

        // Pokud není vyplněno, nastav hodnoty na 0
        $validatedData['id_nadrazeneho_ukolu'] = $validatedData['id_nadrazeneho_ukolu'] ?? 0;
        $validatedData['celkovy_cas_ukolu'] = $validatedData['celkovy_cas_ukolu'] ?? 0;
        $validatedData['rozpocet'] = $validatedData['rozpocet'] ?? 0.0;

        // Vytvoření nového záznamu
        Ukoly::create($validatedData);

        // Přesměrování s úspěšnou zprávou
        return redirect()->back()->with('success', 'Úkol byl úspěšně vytvořen.');
        }

        // Zobrazení formuláře pro editaci úkolu
        public function edit($id)
        {
        // Načtení úkolu podle ID
        $ukol = Ukoly::findOrFail($id);
        
        // Získání všech projektů pro přihlášeného uživatele
        $projekty = Projekt::where('uzivatel_id', auth()->id())->get(); // Ujisti se, že je správné jméno sloupce

        // Zobrazení šablony s daty úkolu a projekty
        return view('ukol-edit', ['ukol' => $ukol, 'projekty' => $projekty]);
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
