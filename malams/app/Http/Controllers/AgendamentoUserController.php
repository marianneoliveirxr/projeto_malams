<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class AgendamentoClienteController extends Controller
{
    public function index()
    {
        $clienteId = Auth::id(); // ID do cliente logado

        $agendamentos = Agendamento::with(['servico', 'funcionario'])
            ->where('idUser', $clienteId)
            ->get();

        return view('cliente.agendamentos.index', compact('agendamentos'));
    }
}
