<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UsuarioController;


Route::get('/', function () {
    return view('welcome');
});


//Rotas para cadastro e login de usuário
Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/cadastro','App\Http\Controllers\UsuarioController@store');

Route::post('/login-user','App\Http\Controllers\UsuarioController@verifyUser')->name('login-user');

Route::post('/logout','App\Http\Controllers\UsuarioController@logoutUser')->name('logout');

//Rota de Dashboard
Route::prefix('admin')->name('admin.')->group(function () {
     // Dashboard
     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

     // Clientes - CRUD
     Route::resource('clientes', UsuarioController::class);
 
     // Funcionários - CRUD
     Route::resource('funcionarios', FuncionariosController::class);
 
     // Serviços - CRUD
     Route::resource('servicos', ServicosController::class);

     // Categorias - CRUD
     Route::resource('categorias', CategoriaController::class);
 });


