<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoFuncionarioController extends Controller
{
    public function index($idFuncionario)
    {
        $agendamentos = Agendamento::with(['users', 'servicos'])
            ->where('idFuncionario', $idFuncionario)
            ->get();

        $events = $agendamentos->map(function ($ag) {
            return ['id'=>$ag->idAgendamento, 'title' => $ag->cliente->nomeUser . ' - ' . $ag->servico->servico, 'start' => $ag->dataAgendamento . 'T' . substr($ag->hora, 0, 5), 'color' => $ag->confirmacao === 'sim' ? '#28a745' : '#dc3545'];
        });

        return view('agendamentos.funcionarios', [
            'events' => $events,
            'funcionarioId' => $idFuncionario,
        ]);
    }
}