<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AgendamentosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/agendamento', function () {
    return view('agendamento');
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

//Rotas para login de admin-funcionario
Route::get('/admin/login', function () {
    return view('login-admin');
})->name('admin.login');

//Rotas de agendamento 

Route::get('/get-servicos/{categoriaId}', [AgendamentosController::class, 'getServicos']);
Route::get('/get-funcionarios/{servicoId}', [AgendamentosController::class, 'getFuncionarios']);
Route::get('/get-horarios-disponiveis', [AgendamentosController::class, 'horariosDisponiveis']);


Route::middleware(['auth'])->group(function () {
    Route::get('/agendamentos/create', [AgendamentosController::class, 'create'])->name('agendamentos.create');
    Route::post('/agendamentos', [AgendamentosController::class, 'store'])->name('agendamentos.store');
});


