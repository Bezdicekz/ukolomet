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
            <x-graf-kruznice :value="$totalTasks" :total="$totalTasks" text1="Celkem" text2=""/>
        </div>

        <div class="text-center">
            <x-graf-kruznice :value=$completedTasks :total=$totalTasks text1="Dokončeno:" text2=""/>
        </div>
        
        <div class="text-center">
            <x-graf-kruznice :value=$inProgressTasks :total=$totalTasks text1="Rozpracováno" text2=""/>
        </div>

        <div class="text-center">
            <x-graf-kruznice :value=$completionPercentage text1="Dokončeno" text2="%" />
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

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-2">
                <div class="text-center pb-10">
                    <x-graf-kruznice :value="$project->total_tasks" :total="$project->total_tasks" text1="Celkem" text2="úkolů"/>
                </div>

                <div class="text-center pb-10">
                    <x-graf-kruznice :total="$project->total_tasks" :value="$project->completed_tasks" text1="Dokončeno" text2="" />
                </div>

                <div class="text-center pb-10">
                    <x-graf-kruznice :total="$project->total_tasks" :value="$project->in_progress_tasks" text1="Rozpracované" text2="" />
                </div>

                <div class="text-center pb-10">
                    <x-graf-kruznice :value="$project->total_time" :total="$project->mnozstvi_casu" text1="Práce" text2="hodin" />
                </div>

                <div class="text-center pb-10">
                    <x-graf-kruznice :total="$project->planovana_naklady" :value="$project->total_budget" text1="Náklady" text2="Kč" />
                </div>

                <div class="text-center">
                    <x-graf-kruznice :total="100" :value="$project->budget_percentage" text1="Náklady" text2="%" />
                </div>
            </div>
        </div>
    @endforeach


</div>

</x-layouts.app>
