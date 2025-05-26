<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendamento;

class AgendaClienteController extends Controller
{
    /**
     * Exibe os agendamentos do cliente logado.
     */
    public function index()
    {
        $clienteId = Auth::id();

        $agendamentos = Agendamento::with(['servico', 'funcionario'])
            ->where('idUser', $clienteId)
            ->orderBy('dataAgendamento', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

    return view('agendamento-cliente', compact('agendamentos')); // Aqui mudou
    }

    /**
     * Cancela um agendamento.
     */
    public function destroy($idAgendamento)
    {
        $agendamento = Agendamento::findOrFail($idAgendamento);

        if ($agendamento->idUser !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $agendamento->delete();

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento cancelado com sucesso.');
    }

    /**
     * Confirma um agendamento (altera o campo `confirmacao` para "sim").
     */
    public function confirmar($idAgendamento)
    {
        $agendamento = Agendamento::findOrFail($idAgendamento);

        if ($agendamento->idUser !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }

        $agendamento->confirmacao = 'sim';
        $agendamento->save();

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento confirmado com sucesso.');
    }
}
