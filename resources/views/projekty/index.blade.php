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

    <h1>Moje projekty</h1>

    @if ($projekty->isEmpty())
        <p>Nemáte žádné projekty.</p>
        <a href="{{ route('projekty.create') }}">Vytvořit nový projekt</a>
    @else
        <ul>
            @foreach ($projekty as $projekt)
                <li>
                    <a href="{{ route('projekty.edit', $projekt->id) }}">
                        {{ $projekt->nazev }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif


</x-layouts.app>

