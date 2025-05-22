<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/perfilfuncionario', function () {
    return view('perfilfuncionario');
});