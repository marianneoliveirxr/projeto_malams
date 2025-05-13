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

//Testes 

Route::get('/home', function () {
    return view('home');
})->name('home');

