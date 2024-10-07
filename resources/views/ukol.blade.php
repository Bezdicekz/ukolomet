<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nový úkol | Úkolomet</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>


    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-6">Vytvořit nový úkol</h1>
            <form action="{{ route('ukoly.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nazev" class="block text-sm font-medium text-gray-700">Název úkolu</label>
                    <input type="text" name="nazev" id="nazev" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="popis" class="block text-sm font-medium text-gray-700">Popis</label>
                    <textarea name="popis" id="popis" class="mt-1 block w-full p-2 border rounded-md" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="id_uzivatele" class="block text-sm font-medium text-gray-700">ID uživatele</label>
                    <input type="number" name="id_uzivatele" id="id_uzivatele" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="id_projektu" class="block text-sm font-medium text-gray-700">ID projektu</label>
                    <input type="number" name="id_projektu" id="id_projektu" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="id_nadrazeneho_ukolu" class="block text-sm font-medium text-gray-700">ID nadřazeného úkolu</label>
                    <input type="number" name="id_nadrazeneho_ukolu" id="id_nadrazeneho_ukolu" class="mt-1 block w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="celkovy_cas_ukolu" class="block text-sm font-medium text-gray-700">Celkový čas úkolu (v hodinách)</label>
                    <input type="number" name="celkovy_cas_ukolu" id="celkovy_cas_ukolu" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="datum_zahajeni" class="block text-sm font-medium text-gray-700">Datum zahájení</label>
                    <input type="date" name="datum_zahajeni" id="datum_zahajeni" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="planovany_datum_ukonceni" class="block text-sm font-medium text-gray-700">Plánovaný datum ukončení</label>
                    <input type="date" name="planovany_datum_ukonceni" id="planovany_datum_ukonceni" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="datum_ukonceni" class="block text-sm font-medium text-gray-700">Datum ukončení</label>
                    <input type="date" name="datum_ukonceni" id="datum_ukonceni" class="mt-1 block w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="stav" class="block text-sm font-medium text-gray-700">Stav</label>
                    <select name="stav" id="stav" class="mt-1 block w-full p-2 border rounded-md" required>
                        <option value="novy">Nový</option>
                        <option value="v_procesu">V procesu</option>
                        <option value="dokonceny">Dokončený</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="rozpocet" class="block text-sm font-medium text-gray-700">Rozpočet (v Kč)</label>
                    <input type="number" name="rozpocet" id="rozpocet" class="mt-1 block w-full p-2 border rounded-md" required>
                </div>

                <button type="submit" class="bg-cbtprim text-cbttprim px-4 py-2 rounded-md hover:bg-cbtsec hover:text-cbttsec">
                    Vytvořit úkol
                </button>
            </form>
        </div>
    </div>

</x-layouts.app>
