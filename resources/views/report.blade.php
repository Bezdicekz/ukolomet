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

<div class="container">
    <h1>Report a Statistika</h1>

    <div class="statistics">
        <h2>Celkové úkoly: {{ $totalTasks }}</h2>
        <h2>Dokončené úkoly: {{ $completedTasks }}</h2>
        <h2>Rozpracované úkoly: {{ $inProgressTasks }}</h2>
        <h2>Procento dokončení: {{ number_format($completionPercentage, 2) }}%</h2>
    </div>

    <h2>Projekty</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Název projektu</th>
                <th>Celkem úkolů</th>
                <th>Dokončené úkoly</th>
                <th>Rozpracované úkoly</th>
                <th>Celkový čas</th>
                <th>Celkový rozpočet</th>
                <th>Plánovaný rozpočet</th>
                <th>Rozpočet v procentech</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->nazev }}</td>
                    <td>{{ $project->total_tasks }}</td>
                    <td>{{ $project->completed_tasks }}</td>
                    <td>{{ $project->in_progress_tasks }}</td>
                    <td>{{ $project->total_time }} hod</td>
                    <td>{{ $project->total_budget }} Kč</td>
                    <td>{{ $project->planovana_naklady }} Kč</td>
                    <td>{{ number_format($project->budget_percentage, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layouts.app>
