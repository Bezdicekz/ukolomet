<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'index');
Route::view('/dashboard', 'dashboard')->name('dashboard'); // jméno mohu použít pro přesměrování (viz AuthController)

Route::get('/dashboard', function() {

    auth::user();

    dd(auth()->user);
})->middleware('auth')->name('dashboard');



Route::get('/login', [AuthController::class, 'show'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/registrace', [AuthController::class, 'registrace']);
Route::post('/registrace', [AuthController::class, 'zaregistruj']);
