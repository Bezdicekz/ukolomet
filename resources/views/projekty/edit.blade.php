<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>
    
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">Editace projektu</h1>

    <!-- Zobrazování chybových zpráv -->
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulář pro editaci projektu -->
    <form action="{{ route('projekty.update', $projekt->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Použití PUT metody pro update -->

        <div class="mb-4">
            <label for="nazev" class="block text-sm font-medium text-gray-700">Název projektu</label>
            <input type="text" id="nazev" name="nazev" value="{{ old('nazev', $projekt->nazev) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="popis" class="block text-sm font-medium text-gray-700">Popis projektu</label>
            <textarea id="popis" name="popis" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('popis', $projekt->popis) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="datum_zahajeni" class="block text-sm font-medium text-gray-700">Datum zahájení</label>
            <input type="date" id="datum_zahajeni" name="datum_zahajeni" value="{{ old('datum_zahajeni', $projekt->datum_zahajeni) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="datum_ukonceni" class="block text-sm font-medium text-gray-700">Datum ukončení</label>
            <input type="date" id="datum_ukonceni" name="datum_ukonceni" value="{{ old('datum_ukonceni', $projekt->datum_ukonceni) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="Mnozstvi_casu" class="block text-sm font-medium text-gray-700">Množství času</label>
            <input type="number" id="Mnozstvi_casu" name="Mnozstvi_casu" value="{{ old('Mnozstvi_casu', $projekt->Mnozstvi_casu) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="planovane_naklady" class="block text-sm font-medium text-gray-700">Plánované náklady</label>
            <input type="number" id="planovane_naklady" name="planovane_naklady" value="{{ old('planovane_naklady', $projekt->planovane_naklady) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Tlačítko pro aktualizaci -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-cbtprim text-cbttprim py-2 rounded-md hover:bg-cbtsec hover:text-cbttsec">Uložit změny</button>
        </div>
    </form>

    <!-- Odkaz pro návrat na předchozí stránku -->
    <div class="mt-4">
        <a href="{{ route('projekty.index') }}" class="hover:underline">Zpět na seznam projektů</a>
    </div>
</div>

</x-layouts.app>