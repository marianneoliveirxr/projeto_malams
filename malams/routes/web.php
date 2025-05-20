<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');


Route::get('/perfilfuncionario', function () {
    return view('perfilfuncionario');
});