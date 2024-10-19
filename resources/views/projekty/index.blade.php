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

    <h1 class="text-center text-6xl font-bold text-ctprim">Správa projektů</h1>

    @if ($projekty->isEmpty())
        <p>Nemáte žádné projekty.</p>
        <a href="{{ route('projekty.create') }}">Vytvořit nový projekt</a>
    @else
    <div class="flex flex-col text-center max-w-4xl bg-cb3 rounded-lg shadow-lg mx-auto py-6 my-10 text-ctprim">
            @foreach ($projekty as $projekt)
                <a href="{{ route('projekty.edit', $projekt->id) }}" class="text-2xl py-2 font-bold">
                        {{ $projekt->nazev }}
                </a>
            @endforeach
        
    </div>
    @endif


</x-layouts.app>

