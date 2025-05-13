<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


//Rotas para cadastro e login de usuário
Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');


Route::post('/cadastro','App\Http\Controllers\UsuarioController@store');

Route::post('/login-user','App\Http\Controllers\UsuarioController@verifyUser')->name('login-user');

Route::post('/logout','App\Http\Controllers\UsuarioController@logoutUser')->name('logout');

//Rota de Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/servicos', [ServicosController::class, 'index'])->name('servicos');
Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios');
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');

//Testes 

Route::get('/home', function () {
    return view('home');
})->name('home');

