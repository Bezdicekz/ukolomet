<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'index');
Route::view('/dashboard', 'dashboard');
Route::view('/registrace', 'registrace');

Route::get('/login', [AuthController::class, 'show']);
