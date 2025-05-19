<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoUserController;
use App\Http\Controllers\AgendamentoFuncionarioController;

Route::get('/', function () {
    return view('welcome');
});
