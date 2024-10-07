<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukoly;

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
            'id_uzivatele' => 'required|integer',
            'id_projektu' => 'required|integer',
            'id_nadrazeneho_ukolu' => 'nullable|integer',
            'celkovy_cas_ukolu' => 'required|integer',
            'datum_zahajeni' => 'required|date',
            'planovany_datum_ukonceni' => 'required|date',
            'datum_ukonceni' => 'nullable|date',
            'stav' => 'required|string',
            'rozpocet' => 'required|numeric',
        ]);

        // Vytvoření nového záznamu
        Ukoly::create($validatedData);

        return redirect()->back()->with('success', 'Úkol byl úspěšně vytvořen.');
    }
}
