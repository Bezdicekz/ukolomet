<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjektyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UkolyController;
use App\Http\Controllers\ProjektController;



Route::view('/', 'index');

Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/login', [AuthController::class, 'show'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Po odhlášení uživatele přesměrujte na domovskou stránku nebo jinou stránku.
})->name('logout');

Route::get('/registrace', [AuthController::class, 'registrace']);
Route::post('/registrace', [AuthController::class, 'zaregistruj']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/ukol', [UkolyController::class, 'show'])->name('ukol');
    Route::post('/ukol', [UkolyController::class, 'store'])->name('ukoly.store');
    Route::delete('/ukol/{id}', [DashboardController::class, 'destroy'])->name('ukol.destroy');
    Route::get('/ukol/{id}/edit', [DashboardController::class, 'edit'])->name('ukol.edit');
    Route::put('/ukol/{id}', [DashboardController::class, 'update'])->name('ukol.update');

    Route::get('projekty', [ProjektyController::class, 'index'])->name('projekty.index');
    Route::get('projekty/create', [ProjektyController::class, 'create'])->name('projekty.create');
    Route::post('projekty', [ProjektyController::class, 'store'])->name('projekty.store');
    Route::get('projekty/{id}/edit', [ProjektyController::class, 'edit'])->name('projekty.edit');
    Route::put('projekty/{id}', [ProjektyController::class, 'update'])->name('projekty.update');
}); 