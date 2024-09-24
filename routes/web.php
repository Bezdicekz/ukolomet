<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/index', [AuthController::class, 'show']);

Route::get('/app', function () {
    return view('app');
});

Route::get('/app', function () {
    return view('app');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registrace', function () {
    return view('registrace');
});