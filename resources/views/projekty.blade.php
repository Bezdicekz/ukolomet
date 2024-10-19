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

<div class="text-center">
    <h1>Správa projektů</h1>

    <form action="{{ route('projekty.update', $selectedProjekt->id ?? '') }}" method="POST">
        @csrf
        @method('PUT') <!-- Použijeme PUT pro aktualizaci -->
        
                @foreach ($projekty as $projekt)
                    <option value="{{ $projekt->id }}" {{ (isset($selectedProjekt) && $selectedProjekt->id == $projekt->id) ? 'selected' : '' }}>
                        {{ $projekt->nazev }}
                    </option>
                @endforeach
            
    </form>


</div>

    </main>

</x-layouts.app>
