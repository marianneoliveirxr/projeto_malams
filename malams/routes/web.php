<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::post('/cadastro','App\Http\Controllers\UsuarioController@store');

