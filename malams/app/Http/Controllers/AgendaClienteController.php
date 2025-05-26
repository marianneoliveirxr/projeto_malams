<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendamento;
use Carbon\Carbon;

class AgendaClienteController extends Controller
{
    /**
     * Exibe os agendamentos do cliente logado.
     */
        public function index()
{
    $clienteId = Auth::id();
    $agora = Carbon::now()->setTimezone('America/Sao_Paulo'); // ajuste o timezone conforme o seu

    // Pega os agendamentos que devem ser finalizados (data+hora menor que agora)
    $agendamentosParaFinalizar = Agendamento::where('idUser', $clienteId)
        ->where('statusAgendamento', '!=', 'finalizado')
        ->whereRaw("STR_TO_DATE(CONCAT(dataAgendamento, ' ', TIME_FORMAT(hora, '%H:%i:%s')), '%Y-%m-%d %H:%i:%s') < ?", [$agora->format('Y-m-d H:i:s')])
        ->get();

    // Atualiza status para finalizado para esses agendamentos
    Agendamento::whereIn('idAgendamento', $agendamentosParaFinalizar->pluck('idAgendamento'))
        ->update(['statusAgendamento' => 'Finalizado']);

    // Agendamentos ativos
    $agendamentosAtivos = Agendamento::with(['servico', 'funcionario'])
        ->where('idUser', $clienteId)
        ->where('statusAgendamento', '!=', 'finalizado')
        ->orderBy('dataAgendamento', 'asc')
        ->orderBy('hora', 'asc')
        ->get();

    // Agendamentos finalizados
    $agendamentosFinalizados = Agendamento::with(['servico', 'funcionario'])
        ->where('idUser', $clienteId)
        ->where('statusAgendamento', 'finalizado')
        ->orderBy('dataAgendamento', 'desc')
        ->orderBy('hora', 'desc')
        ->get();

    return view('agendamento-cliente', compact('agendamentosAtivos', 'agendamentosFinalizados'));
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
