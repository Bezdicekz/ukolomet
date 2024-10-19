<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>

<h1 class="text-center font-bold text-6xl text-ctprim">Reporty a statistika</h1>
<div class="max-w-4xl bg-cb3 rounded-lg shadow-lg mx-auto py-6 my-10 text-ctsec">
    

    <div class="flex gap-12 pb-12 font-bold items-center justify-center mx-auto">
        
        <div class="text-center">
            <h2>Celkové úkoly:</h2>
            <p class="font-bold text-2xl lg:text-6xl text-ctprim">{{ $totalTasks }}</p>
        </div>

        <div class="text-center">
            <h2>Dokončené úkoly:</h2>
            <p class="font-bold text-2xl lg:text-6xl text-ctprim">{{ $completedTasks }}</p>
        </div>
        
        <div class="text-center">
            <h2>Rozpracované úkoly:</h2>
            <p class="font-bold text-2xl lg:text-6xl text-ctprim">{{ $inProgressTasks }}</p>
        </div>

        <div class="text-center">
            <h2>Procento dokončení:</h2>
            <p class="font-bold text-2xl lg:text-6xl text-ctprim">{{ number_format($completionPercentage, 2) }}%</p>
        </div>
    </div>
</div>

<div class="max-w-4xl bg-cb3 rounded-lg shadow-lg mx-auto pt-6 mt-10 pb-4 text-ctprim">
    <h2 class="text-center font-bold text-4xl">Projekty</h2>

            @foreach ($projects as $project)
                <div class="bg-white m-6 py-6 pb-10 rounded-lg shadow-lg">
                <div>
                    <h3 class="font-bold text-3xl text-center pb-10">{{ $project->nazev }}</h3>
                </div>

                <div class="flex flex-wrap gap-2 justify-center mx-auto">
                    <div class="w-1/3 lg:w-1/4 text-center pb-10">
                        <p class="font-bold text-ctsec">Celkem úkolů:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->total_tasks }}</p>
                    </div>

                    <div class="w-1/3 lg:w-1/5 text-center pb-10">
                        <p class="font-bold text-ctsec">Dokončené:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->completed_tasks }}</p>
                    </div>

                    <div class="w-1/3 lg:w-1/4 text-center pb-10">
                        <p class="font-bold text-ctsec">Rozpracované:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->in_progress_tasks }}</p>
                    </div>

                    <div class="w-1/3 lg:w-1/4 text-center pb-10">
                        <p class="font-bold text-ctsec">Vykonaná práce:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->total_time }} hod</p>
                    </div>

                    <div class="w-1/3 text-center pb-10">
                        <p class="font-bold text-ctsec">Aktuální náklady:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->total_budget }} Kč</p>
                    </div>

                    <div class="w-1/3 lg:w-1/4 text-center pb-10">
                        <p class="font-bold text-ctsec">Plánované náklady:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ $project->planovana_naklady }} Kč</p>
                    </div>

                    <div class="w-1/3 lg:w-1/3 text-center">
                        <p class="font-bold text-ctsec">Procento nákladů:</p>
                        <p class="font-bold text-2xl lg:text-4xl">{{ number_format($project->budget_percentage, 2) }}%</p>
                    </div>
                </div>
                </div>
            @endforeach

</div>

</x-layouts.app>
