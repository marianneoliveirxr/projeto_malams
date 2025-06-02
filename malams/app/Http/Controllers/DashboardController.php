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

        $labels = [];
        $totais = [];
        for ($i = 6; $i >= 0; $i--) {
            $dia = now()->subDays($i)->format('d/m');
            $labels[] = $dia;

            $registroDoDia = $agendamentosPorDia->firstWhere('data', now()->subDays($i)->toDateString());
            $totais[] = $registroDoDia ? $registroDoDia->total : 0;
        }

        // Receita dos últimos 7 dias (somando o preço dos serviços agendados por dia)
        $receitaPorDia = Agendamento::join('servicos', 'agendamentos.idServico', '=', 'servicos.idServico')
            ->select(DB::raw('DATE(agendamentos.dataAgendamento) as data'), DB::raw('SUM(servicos.preco) as total'))
            ->whereBetween('agendamentos.dataAgendamento', [now()->subDays(6)->startOfDay(), now()->endOfDay()])
            ->groupBy('data')
            ->orderBy('data')
            ->get();

        $labelsReceita = [];
        $valoresReceita = [];
        for ($i = 6; $i >= 0; $i--) {
            $dia = now()->subDays($i)->format('d/m');
            $labelsReceita[] = $dia;

            $registroDoDia = $receitaPorDia->firstWhere('data', now()->subDays($i)->toDateString());
            $valoresReceita[] = $registroDoDia ? (float) $registroDoDia->total : 0;
        }

        // Top 5 serviços mais vendidos nos últimos 30 dias
        $topServicos = Agendamento::select('idServico', DB::raw('count(*) as total'))
            ->whereBetween('dataAgendamento', [now()->subDays(29)->startOfDay(), now()->endOfDay()])
            ->groupBy('idServico')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $servicoLabels = [];
        $servicoTotais = [];
        foreach ($topServicos as $item) {
            $servico = Servico::find($item->idServico);
            $servicoLabels[] = $servico ? $servico->servico : 'Serviço #' . $item->idServico;
            $servicoTotais[] = $item->total;
        }

        // Últimas atividades (exemplo estático, adapte como quiser)
        $recentActivities = [
            'Usuário Pedro Santos fez login',
            'Funcionário Ana Costa atualizou um agendamento',
            'Cliente Roberta Lima criou uma nova solicitação',
        ];

        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalFuncionarios', 
            'pendingTasks', 
            'recentActivities',
            'servicoLabels',
            'servicoTotais'
        ))
        ->with('labels', json_encode($labels))
        ->with('totais', json_encode($totais))
        ->with('labelsReceita', json_encode($labelsReceita))
        ->with('valoresReceita', json_encode($valoresReceita))
        ->with('servicoLabels', json_encode($servicoLabels))
        ->with('servicoTotais', json_encode($servicoTotais));
    }

    // Outros métodos vazios
    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
