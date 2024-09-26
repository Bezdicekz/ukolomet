<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'index');
Route::view('/dashboard', 'dashboard');


Route::get('/login', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/registrace', [AuthController::class, 'registrace']);
