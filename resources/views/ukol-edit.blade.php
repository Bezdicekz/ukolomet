<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace úkolu | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>


<div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-1/4 text-center mx-auto text-ctprim">   
    <h1 class="text-xl font-bold mb-4">Upravit úkol</h1>
    
    <form action="{{ route('ukol.update', $ukol->id) }}" method="POST" class="flex flex-col gap-4 justify-center items-center">
        @csrf
        @method('PUT')
        
        <div>
        <label for="nazev">Název úkolu:</label>
        <input type="text" name="nazev" id="nazev" value="{{ $ukol->nazev }}" required>
        </div>

        <div>
        <label for="popis">Popis:</label>
        <textarea name="popis" id="popis" required>{{ $ukol->popis }}</textarea>
        </div>

        <div>
        <label for="id_projektu">Projekt:</label>
        <input type="text" name="id_projektu" id="id_projektu" value="{{ $ukol->id_projektu }}" required>
        </div>

        <div>
        <label for="celkovy_cas_ukolu">Celkový čas:</label>
        <input type="number" name="celkovy_cas_ukolu" id="celkovy_cas_ukolu" value="{{ $ukol->celkovy_cas_ukolu }}" required>
        </div>

        <div>
        <label for="datum_zahajeni">Datum zahájení:</label>
        <input type="date" name="datum_zahajeni" id="datum_zahajeni" value="{{ $ukol->datum_zahajeni }}" required>
        </div>

        <div>
        <label for="planovany_datum_ukonceni">Plánovaný datum ukončení:</label>
        <input type="date" name="planovany_datum_ukonceni" id="planovany_datum_ukonceni" value="{{ $ukol->planovany_datum_ukonceni }}" required>
        </div>

        <div>
        <label for="stav">Stav:</label>
        <input type="text" name="stav" id="stav" value="{{ $ukol->stav }}" required>
        </div>

        <div>
        <label for="rozpocet">Rozpočet:</label>
        <input type="number" name="rozpocet" id="rozpocet" value="{{ $ukol->rozpocet }}" required>
        </div>

        <button type="submit" class="py-2 px-6 transition duration-700 ease-in-out rounded-md hover:text-white hover:bg-cbtsec">Uložit změny</button>
    </form>

    </div>

    </x-layouts.app>