<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class AgendamentoUserController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // ID do user logado

        $agendamentos = Agendamento::with(['servicos', 'funcionarios'])->where('idUser', $userId)->get();

        return view('users.agendamentos.index', compact('agendamentos'));
    }
}
