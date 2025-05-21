<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoUserController;
use App\Http\Controllers\AgendamentoFuncionarioController;

Route::get('/users/{id}/agendamentos', [AgendamentoUserController::class, 'index'])->name('users.agendamentos');
Route::get('/funcionarios/{id}/agendamentos', [AgendamentoFuncionarioController::class, 'index'])->name('funcionarios.agendamentos');
