<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoFuncionarioController extends Controller
{
    public function index($idFuncionario)
    {
        $agendamentos = Agendamento::with(['cliente', 'servico'])
            ->where('idFuncionario', $idFuncionario)
            ->get();

        $events = $agendamentos->map(function ($ag) {
            return [
                'id'    => $ag->idAgendamento,
                'title' => $ag->cliente->nomeUser . ' - ' . $ag->servico->servico,
                'start' => $ag->dataAgendamento . 'T' . substr($ag->hora, 0, 5),
                'color' => $ag->confirmacao === 'sim' ? '#28a745' : '#dc3545', // verde/vermelho
            ];
        });

        return view('agendamentos.funcionario_calendar', [
            'events' => $events,
            'funcionarioId' => $idFuncionario,
        ]);
    }
}