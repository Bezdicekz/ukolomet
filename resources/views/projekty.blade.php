<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekty | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>

    <main>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Správa projektů</h1>

    <form action="{{ route('projekty.update', $selectedProjekt->id ?? '') }}" method="POST">
        @csrf
        @method('PUT') <!-- Použijeme PUT pro aktualizaci -->
        
        <div class="form-group">
            <label for="projekt_id">Vyberte projekt:</label>
            <select id="projekt_id" name="projekt_id" class="form-control" onchange="this.form.submit()">
                <option value="">-- Vyberte projekt --</option>
                @foreach ($projekty as $projekt)
                    <option value="{{ $projekt->id }}" {{ (isset($selectedProjekt) && $selectedProjekt->id == $projekt->id) ? 'selected' : '' }}>
                        {{ $projekt->nazev }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    @if(isset($selectedProjekt))
    <h2>Úprava projektu: {{ $selectedProjekt->nazev }}</h2>
    <form action="{{ route('projekty.update', $selectedProjekt->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Použijeme PUT pro aktualizaci -->

        <div class="form-group">
            <label for="nazev">Název:</label>
            <input type="text" id="nazev" name="nazev" class="form-control" value="{{ old('nazev', $selectedProjekt->nazev) }}" required>
        </div>

        <div class="form-group">
            <label for="popis">Popis:</label>
            <textarea id="popis" name="popis" class="form-control">{{ old('popis', $selectedProjekt->popis) }}</textarea>
        </div>

        <div class="form-group">
            <label for="datum_zahajeni">Datum zahájení:</label>
            <input type="date" id="datum_zahajeni" name="datum_zahajeni" class="form-control" value="{{ old('datum_zahajeni', $selectedProjekt->datum_zahajeni) }}">
        </div>

        <div class="form-group">
            <label for="datum_ukonceni">Datum ukončení:</label>
            <input type="date" id="datum_ukonceni" name="datum_ukonceni" class="form-control" value="{{ old('datum_ukonceni', $selectedProjekt->datum_ukonceni) }}">
        </div>

        <div class="form-group">
            <label for="Mnozstvi_casu">Množství času (HH:MM:SS):</label>
            <input type="time" id="Mnozstvi_casu" name="Mnozstvi_casu" class="form-control" value="{{ old('Mnozstvi_casu', $selectedProjekt->Mnozstvi_casu) }}">
        </div>

        <div class="form-group">
            <label for="planovana_naklady">Plánované náklady:</label>
            <input type="number" id="planovana_naklady" name="planovana_naklady" class="form-control" value="{{ old('planovana_naklady', $selectedProjekt->planovana_naklady) }}">
        </div>

        <button type="submit" class="btn btn-primary">Uložit změny</button>
    </form>
    @endif
</div>
@endsection
    </main>

</x-layouts.app>
