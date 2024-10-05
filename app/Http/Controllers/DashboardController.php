<?php

namespace App\Http\Controllers;

use App\Models\Ukoly;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() 
    {
        $ukoly = Ukoly::where('id_uzivatele', Auth::id())->get();

        
        return view('dashboard',["ukoly" => $ukoly]);
    }
}
