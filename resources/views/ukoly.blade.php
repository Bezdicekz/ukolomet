<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkoly | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>

<main class="flex text-center text-ctprim">
    <div class="container flex flex-col w-auto mx-auto ">
        <h1 class="text-6xl font-bold mb-12">Úkoly podle projektů</h1>

        @foreach ($projekty as $projekt)
            <div class="flex flex-col bg-cb3 text-center mb-6 border p-4 rounded-md">
                <h2 class="text-xl font-bold">{{ $projekt->nazev }}</h2>
                <div class="flex gap-4 mx-auto">
                    <p>Celkový čas: {{ $projekt->celkovy_cas }} hodin</p>
                    <p>-</p>
                    <p>Celková cena: {{ $projekt->celkova_cena }} Kč</p>
                </div>

                @if ($projekt->ukoly->isEmpty())
                    <p class="text-gray-500">Žádné úkoly pro tento projekt.</p>
                @else
                    <div class="mt-2">
                        <table class="min-w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">Název úkolu</th>
                                    <th class="border border-gray-300 px-4 py-2">Popis</th>
                                    <th class="border border-gray-300 px-4 py-2">Čas práce</th>
                                    <th class="border border-gray-300 px-4 py-2">Rozpočet</th>
                                    <th class="border border-gray-300 px-4 py-2">Datum zahájení</th>
                                    <th class="border border-gray-300 px-4 py-2">Plánované datum ukončení</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projekt->ukoly as $ukol)
                                    <tr class="border-b">
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->nazev }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->popis }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->cas_prace }} hodin</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->rozpocet }} Kč</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->datum_zahajeni }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $ukol->planovany_datum_ukonceni }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Úkoly bez projektu -->
        <div class="flex flex-col bg-cb3 text-center mb-6 border p-4 rounded-md">
            <h2 class="text-xl font-bold">Úkoly bez projektu</h2>

            @if ($ukolyBezProjektu->isEmpty())
                <p class="text-gray-500">Žádné úkoly bez projektu.</p>

            @else
                <div class="mt-2">
                     <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">Název úkolu</th>
                                <th class="border border-gray-300 px-4 py-2">Popis</th>
                                <th class="border border-gray-300 px-4 py-2">Čas práce</th>
                                <th class="border border-gray-300 px-4 py-2">Rozpočet</th>
                                <th class="border border-gray-300 px-4 py-2">Datum zahájení</th>
                                <th class="border border-gray-300 px-4 py-2">Plánované datum ukončení</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ukolyBezProjektu as $ukol)
                                <tr class="border-b">
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->nazev }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->popis }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->cas_prace }} hodin</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->rozpocet }} Kč</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->datum_zahajeni }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $ukol->planovany_datum_ukonceni }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</main>


</x-layouts.app>