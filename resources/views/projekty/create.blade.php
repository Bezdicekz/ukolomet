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

    <container class="p-10 flex flex-col gap-6 lg:w-2/3 bg-red-300 mx-auto justify-center items-center text-ctprim rounded-xl">
        <h1 class="text-xl text-center font-bold ">Vytvořit nový projekt</h1>


        <form class="flex flex-col gap-6 " action="{{ route('projekty.store') }}" method="POST">
            @csrf

            <div class="flex flex-col text-center font-bold">
            <label for="nazev">Název projektu:</label>
            <input type="text" name="nazev" required>
            </div>

            <div>
            <label for="popis">Popis:</label>
            <textarea name="popis"></textarea>
            </div>

            <div>
            <label for="datum_zahajeni">Datum zahájení:</label>
            <input type="date" name="datum_zahajeni">
            </div>

            <div>
            <label for="datum_ukonceni">Datum ukončení:</label>
            <input type="date" name="datum_ukonceni">
            </div>
            
            <div>
            <label for="Mnozstvi_casu">Množství času (hh:mm:ss):</label>
            <input type="time" name="Mnozstvi_casu">
            </div>

            <div>
            <label for="planovana_naklady">Plánované náklady:</label>
            <input type="number" name="planovana_naklady">
            </div>

            <button type="submit">Vytvořit projekt</button>
        </form>
    </container>
</x-layouts.app>