<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/teste', function () {
    return view('teste');
});
Route::get('/loginPerfil', function () {
    return view('loginPerfil');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/agendamento', function () {
    return view('agendamento');
});
Route::post('/login-user','App\Http\Controllers\UsuarioController@verifyUser')->name('login-user');

