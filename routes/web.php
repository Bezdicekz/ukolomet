<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

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