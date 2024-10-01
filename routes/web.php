<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;



Route::view('/', 'index');


/* Route::get('/dashboard', [DashboardController::class, 'zobrazitDashboard'])->middleware('auth')->name('dashboard');
*/
/*
Route::get('/dashboard', function() {
    return view('dashboard'); // Zobrazení šablony dashboard.blade.php
})->middleware('auth')->name('dashboard');
*/

Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/login', [AuthController::class, 'show'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Po odhlášení uživatele přesměrujte na domovskou stránku nebo jinou stránku.
})->name('logout');

/* Route::post('/login', [AuthController::class, 'login']); */

Route::get('/registrace', [AuthController::class, 'registrace']);
Route::post('/registrace', [AuthController::class, 'zaregistruj']);

Route::middleware('auth')->group(function() {
    Route::view('/dashboard', 'dashboard')->name('dashboard'); // jméno mohu použít pro přesměrování (viz AuthController)
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profile.update');
});