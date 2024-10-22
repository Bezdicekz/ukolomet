<?php

namespace App\Http\Controllers;

use App\Models\Projekty;
use App\Models\Ukoly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {

        // Získání aktuálně přihlášeného uživatele
        $user = Auth::user();

        // Celkový počet úkolů
        $totalTasks = Ukoly::where('id_uzivatele', $user->id)->count();

        // Dokončené úkoly
        $completedTasks = Ukoly::where('id_uzivatele', $user->id)->where('stav', 'dokončený')->count();

        // Rozpracované úkoly
        $inProgressTasks = Ukoly::where('id_uzivatele', $user->id)->where('stav', 'v_procesu')->count();

        // Výpočet procent
        $completionPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        $projects = Projekty::where('uzivatel_id', $user->id)
            ->select('id', 'nazev', 'mnozstvi_casu', 'planovane_naklady')
            ->with(['ukoly' => function($query) use ($user) {
                $query->select('id_projektu', 'stav', 'celkovy_cas_ukolu', 'rozpocet')
                      ->where('id_uzivatele', $user->id);
            }])
            ->get();

 /*       // Projekty s jejich úkoly
        $projects = Projekty::with(['ukoly' => function($query) {
            $query->select('id_projektu', 'stav', 'celkovy_cas_ukolu', 'rozpocet');
        }])->get();
*/
        // Sestavení dat pro projekty
        foreach ($projects as $project) {
            $project->total_tasks = $project->ukoly->count();
            $project->completed_tasks = $project->ukoly->where('stav', 'dokonceny')->count();
            $project->in_progress_tasks = $project->ukoly->where('stav', 'v_procesu')->count();
            $project->total_time = Ukoly::celkovyCasUkoluProProjekt($project->id);
            $project->total_budget = Ukoly::celkovaCenaProjektu($project->id);
            $project->budget_percentage = $project->planovane_naklady > 0 ? ($project->total_budget / $project->planovane_naklady) * 100 : 0;
            $project->mnozstvi_casu = $project->mnozstvi_casu;
            $project->planovane_naklady = $project->planovane_naklady;

        }

        return view('report', compact('totalTasks', 'completedTasks', 'inProgressTasks', 'completionPercentage', 'projects'));
    }
}
