<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\User; 
use App\Models\Funcionario; 
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        // Total de usuários (clientes + funcionários)
        $totalUsers = User::count();

         $totalFuncionarios = Funcionario::count();

        // Agendamentos do dia atual
        //$pendingTasks = Agendamento::whereDate('data_agendamento', now()->format('Y-m-d'))->count();

        // Últimas atividades - você pode pegar do banco, logs ou montar um array estático
        $recentActivities = [
            'Usuário Pedro Santos fez login',
            'Funcionário Ana Costa atualizou um agendamento',
            'Cliente Roberta Lima criou uma nova solicitação',
            // ... ou buscar do banco
        ];

        return view('admin.dashboard', compact('totalUsers', 'totalFuncionarios', 'recentActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
