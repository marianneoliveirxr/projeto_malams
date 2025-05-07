<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/logout','App\Http\Controllers\UsuarioController@logoutUser')->name('logout');

//Rota de Dashboard
Route::get('/painel', function () {
    return view('painel');
})->name('painel');


//Testes 

Route::get('/home', function () {
    return view('home');
})->name('home');

