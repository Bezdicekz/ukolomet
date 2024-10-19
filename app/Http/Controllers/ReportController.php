<?php

namespace App\Http\Controllers;

use App\Models\Projekty;
use App\Models\Ukoly;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Celkový počet úkolů
        $totalTasks = Ukoly::count();

        // Dokončené úkoly
        $completedTasks = Ukoly::where('stav', 'dokončený')->count();

        // Rozpracované úkoly
        $inProgressTasks = Ukoly::where('stav', 'rozpracovaný')->count();

        // Výpočet procent
        $completionPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        // Projekty s jejich úkoly
        $projects = Projekty::with(['ukoly' => function($query) {
            $query->select('id_projektu', 'stav', 'celkovy_cas_ukolu', 'rozpocet');
        }])->get();

        // Sestavení dat pro projekty
        foreach ($projects as $project) {
            $project->total_tasks = $project->ukoly->count();
            $project->completed_tasks = $project->ukoly->where('stav', 'dokončený')->count();
            $project->in_progress_tasks = $project->ukoly->where('stav', 'rozpracovaný')->count();
            $project->total_time = Ukoly::celkovyCasUkoluProProjekt($project->id);
            $project->total_budget = Ukoly::celkovaCenaProjektu($project->id);
            $project->budget_percentage = $project->planovana_naklady > 0 ? ($project->total_budget / $project->planovana_naklady) * 100 : 0;
        }

        return view('report', compact('totalTasks', 'completedTasks', 'inProgressTasks', 'completionPercentage', 'projects'));
    }
}
