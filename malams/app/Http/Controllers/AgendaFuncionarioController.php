<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Funcionario;
use Carbon\Carbon;

class AgendaFuncionarioController extends Controller
{

    public function index(Request $request, $idFuncionario)
    {
        $dataSelecionada = $request->query('data', Carbon::today()->toDateString());

        $agendamentos = Agendamento::with(['usuario', 'servico'])
            ->where('idFuncionario', $idFuncionario)
            ->where('dataAgendamento', $dataSelecionada)
            ->orderBy('hora')
            ->get();

        $funcionario = Funcionario::find($idFuncionario); // Busca o funcionário para o layout

        return view('funcionario.agenda', compact('agendamentos', 'dataSelecionada', 'funcionario'));
    }

}
