<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\User; 
use App\Models\Funcionario;
use App\Models\Agendamento; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Total de usuários (clientes + funcionários)
    $totalUsers = User::count();

    // Total de funcionários
    $totalFuncionarios = Funcionario::count();

    // Agendamentos do dia atual
    $pendingTasks = Agendamento::whereDate('dataAgendamento', today())->count();

    // Agendamentos dos últimos 7 dias agrupados por data
    $agendamentosPorDia = Agendamento::select(DB::raw('DATE(dataAgendamento) as data'), DB::raw('count(*) as total'))
        ->whereBetween('dataAgendamento', [now()->subDays(6)->startOfDay(), now()->endOfDay()])
        ->groupBy('data')
        ->orderBy('data')
        ->get();

    // Preparar arrays para labels e totais (7 dias, hoje e os 6 dias anteriores)
    $labels = [];
    $totais = [];

    for ($i = 6; $i >= 0; $i--) {
        $dia = now()->subDays($i)->format('d/m');
        $labels[] = $dia;

        $registroDoDia = $agendamentosPorDia->firstWhere('data', now()->subDays($i)->toDateString());
        $totais[] = $registroDoDia ? $registroDoDia->total : 0;
    }

    // Últimas atividades (exemplo estático, pode adaptar pra banco)
    $recentActivities = [
        'Usuário Pedro Santos fez login',
        'Funcionário Ana Costa atualizou um agendamento',
        'Cliente Roberta Lima criou uma nova solicitação',
    ];

    // Passa tudo para a view, convertendo os arrays para JSON para o JS do gráfico
    return view('admin.dashboard', compact(
        'totalUsers', 
        'totalFuncionarios', 
        'pendingTasks', 
        'recentActivities',
    ))
    ->with('labels', json_encode($labels))
    ->with('totais', json_encode($totais));
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
