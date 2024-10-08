<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjektyController extends Controller
{
    public function show() 
    {
            // Předám obě sady dat do pohledu
            return view('projekty');
    }    

    public function edit(Request $request)
{
    $projekty = Projekt::all();
    $selectedProjekt = null;

    if ($request->has('projekt_id')) {
        $selectedProjekt = Projekt::find($request->input('projekt_id'));
    }

    return view('projekty', compact('projekty', 'selectedProjekt'));
}

public function update(Request $request, $id)
{
    $projekt = Projekt::findOrFail($id);
    $projekt->update($request->all());
    
    return redirect()->route('projekty.index')->with('success', 'Projekt byl úspěšně aktualizován.');
}
}
