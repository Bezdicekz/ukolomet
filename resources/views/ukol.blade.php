<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nový úkol | Úkolomet</title>
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
                    <input type="text" name="nazev" id="nazev" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('nazev') }}" required>
                    @error('nazev')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="popis" class="block text-sm font-medium text-gray-700">Popis</label>
                    <textarea name="popis" id="popis" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('popis') }}"></textarea>
                    @error('popis')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="projekt" class="block text-sm font-medium text-gray-700">Vyberte projekt</label>
                    <select name="id_projektu" id="projekt" class="form-select mt-1 block w-full p-2 border rounded-md">
                        <option value="0">Žádný</option>

                        <!-- Pokud existují projekty, vypíší se -->
                        @if($projekty->isNotEmpty())
                            @foreach($projekty as $id => $nazev)
                            <option value="{{ $id }}" {{ old('id_projektu') == $id ? 'selected' : '' }}>
                                {{ $nazev }}
                            </option>
                            @endforeach
                        @else   
                            <!-- Nejsou-li žádné projekty vypíše se zpráva o tom, že nejsou žádné projekty -->
                            <option disabled>Není dostupný žádný projekt</option>
                        @endif
                    </select>
                    @error('id_projektu')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="hidden mb-4">
                    <label for="id_nadrazeneho_ukolu" class="block text-sm font-medium text-gray-700">ID nadřazeného úkolu</label>
                    <input type="number" name="id_nadrazeneho_ukolu" id="id_nadrazeneho_ukolu" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('id_nadrazeneho_ukolu') }}">
                    @error('id_nadrazeneho_ukolu')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="celkovy_cas_ukolu" class="block text-sm font-medium text-gray-700">Celkový čas úkolu (v hodinách)</label>
                    <input type="number" name="celkovy_cas_ukolu" id="celkovy_cas_ukolu" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('celkovy_cas_ukolu') }}">
                    @error('celkovy_cas_ukolu')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="datum_zahajeni" class="block text-sm font-medium text-gray-700">Datum zahájení</label>
                    <input type="date" name="datum_zahajeni" id="datum_zahajeni" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('datum_zahajeni') }}" required>
                    @error('datum_zahajeni')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="planovany_datum_ukonceni" class="block text-sm font-medium text-gray-700">Plánovaný datum ukončení</label>
                    <input type="date" name="planovany_datum_ukonceni" id="planovany_datum_ukonceni" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('planovany_datum_ukonceni') }}" required>
                    @error('planovany_datum_ukonceni')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="datum_ukonceni" class="block text-sm font-medium text-gray-700">Datum ukončení</label>
                    <input type="date" name="datum_ukonceni" id="datum_ukonceni" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('datum_ukonceni') }}">
                    @error('datum_ukonceni')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stav" class="block text-sm font-medium text-gray-700">Stav</label>
                    <select name="stav" id="stav" class="mt-1 block w-full p-2 border rounded-md" required>
                        <option value="novy" {{ old('stav') == 'novy' ? 'selected' : '' }}>Nový</option>
                        <option value="v_procesu" {{ old('stav') == 'v_procesu' ? 'selected' : '' }}>V procesu</option>
                        <option value="dokonceny" {{ old('stav') == 'dokonceny' ? 'selected' : '' }}>Dokončený</option>
                    </select>

                    @error('stav')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="rozpocet" class="block text-sm font-medium text-gray-700">Rozpočet (v Kč)</label>
                    <input type="number" name="rozpocet" id="rozpocet" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('rozpocet') }}">
                    @error('rozpocet')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-col-2">
                    <button type="submit" class="bg-cbtprim text-cbttprim px-4 py-2 rounded-md hover:bg-cbtsec hover:text-cbttsec">
                        Vytvořit úkol
                    </button>

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Došlo k chybám při odeslání formuláře:</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
