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

    <container class="flex flex-col max-w-4xl mx-auto mt-10 gap-6 bg-cb3 mx-auto justify-center items-center text-ctprim rounded-xl">
        <h1 class="text-xl text-center font-bold ">Vytvořit nový projekt</h1>
        <form class="flex flex-col gap-6" action="{{ route('projekty.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-2 w-full">
                <label for="nazev" class="form-label">Název projektu</label>
                <input type="text" class="form-control" id="nazev" name="nazev" value="{{ old('nazev') }}">
                @error('nazev')
                    <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 w-full">
                <label for="popis" class="form-label">Popis projektu</label>
                <textarea class="form-control" id="popis" name="popis" rows="3">{{ old('popis') }}</textarea>
            @error('popis')
                <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
            @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 w-full">
                <label for="datum_zahajeni" class="form-label">Datum zahájení</label>
                <input type="date" class="form-control" id="datum_zahajeni" name="datum_zahajeni" value="{{ old('datum_zahajeni') }}">
            @error('datum_zahajeni')
                <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
            @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 w-full">
                <label for="datum_ukonceni" class="form-label">Datum ukončení</label>
                <input type="date" class="form-control" id="datum_ukonceni" name="datum_ukonceni" value="{{ old('datum_ukonceni') }}">
            @error('datum_ukonceni')
                <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
            @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 w-full">
                <label for="Mnozstvi_casu" class="form-label">Množství času (v hodinách)</label>
                <input type="number" class="form-control" id="Mnozstvi_casu" name="Mnozstvi_casu" value="{{ old('Mnozstvi_casu') }}">
            @error('Mnozstvi_casu')
                <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
            @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 w-full">
                <label for="planovane_naklady" class="form-label">Plánované náklady</label>
                <input type="number" class="form-control" id="planovane_naklady" name="planovane_naklady" value="{{ old('planovane_naklady') }}">
            @error('planovane_naklady')
                <div class="invalid-feedback col-span-2 text-right text-xs text-red-600">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="p-2 bg-cbtprim text-cbttprim rounded-lg hover:bg-cbtsec hover:text-cbttsec">Vytvořit projekt</button>
        </form>
    </container>
</x-layouts.app>