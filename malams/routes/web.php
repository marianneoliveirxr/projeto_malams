<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('clientes', ClienteController::class);
});

//Testes 

Route::get('/home', function () {
    return view('home');
})->name('home');

