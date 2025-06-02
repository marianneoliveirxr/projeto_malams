<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class AgendamentosController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        // Não precisa pegar todos os serviços e funcionários aqui, pois vão ser carregados via AJAX
        return view('agendamentos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'idServico' => 'required|exists:servicos,idServico',
            'idFuncionario' => 'required|exists:funcionarios,idFuncionario',
            'dataAgendamento' => 'required|date',
            'hora' => 'required',
        ]);

        $agendamento = new Agendamento();
        $agendamento->idServico = $validated['idServico'];
        $agendamento->idFuncionario = $validated['idFuncionario'];
        $agendamento->idUser = Auth::id(); // usuário logado
        $agendamento->dataAgendamento = $validated['dataAgendamento'];
        $agendamento->hora = $validated['hora'];
        $agendamento->statusAgendamento = 'Pendente'; // padrão
        $agendamento->confirmacao = 'Não'; // padrão
        $agendamento->save();

        return redirect()->route('agendamentos.create')->with('success', 'Agendamento criado com sucesso!');
    }

    // API para buscar serviços por categoria
   public function getServicos($idCategoria)
{
    $servicos = Servico::where('idCategoria', $idCategoria)
        ->select('idServico', 'servico', 'preco', 'duracao')
        ->get();

    return response()->json($servicos);
}

    // API para buscar funcionários por serviço
    public function getFuncionarios($servicoId)
    {
        $funcionarios = Funcionario::where('idServico', $servicoId)->get();
        return response()->json($funcionarios);
    }

   public function horariosDisponiveis(Request $request)
{
    $request->validate([
        'idFuncionario' => 'required|exists:funcionarios,idFuncionario',
        'dataAgendamento' => 'required|date',
        'idServico' => 'required|exists:servicos,idServico',
    ]);

    $idFuncionario = $request->idFuncionario;
    $dataAgendamento = $request->dataAgendamento;
    $idServico = $request->idServico;

    // Pega a duração do serviço no banco (assumindo que está no formato HH:MM:SS)
    $servico = Servico::find($idServico);
    $duracaoStr = $servico->duracao; // Ex: "00:50:00"
    list($h, $m, $s) = explode(':', $duracaoStr);
    $duracaoMinutos = $h * 60 + $m; // duração em minutos

    // Horários padrão do expediente (em minutos a partir da meia-noite)
    $inicio = 9 * 60;  // 09:00
    $fim = 17 * 60;    // 17:00
    $intervalo = 30;   // intervalo em minutos

    // Buscar agendamentos existentes do funcionário na data
    $agendamentos = Agendamento::where('idFuncionario', $idFuncionario)
        ->where('dataAgendamento', $dataAgendamento)
        ->pluck('hora')
        ->toArray();

    // Converter horários agendados para minutos (ex: '10:30:00' -> 630)
    $horariosOcupadosMin = array_map(function($hora) {
        list($hh, $mm, $ss) = explode(':', $hora);
        return $hh * 60 + $mm;
    }, $agendamentos);

    // Obter data atual e hora atual em minutos para filtro
    $hoje = date('Y-m-d');
    $agoraMinutos = (int) (date('H') * 60 + date('i'));

    // Gerar todos os horários possíveis no expediente
    $todosHorarios = [];
    for ($minutos = $inicio; $minutos <= $fim; $minutos += $intervalo) {
        // Se a data for hoje, exclui horários anteriores ao atual
        if ($dataAgendamento == $hoje && $minutos < $agoraMinutos) {
            continue;
        }

        // Verificar se o horário completo (início até fim) invade o almoço (12:00 a 13:00)
$inicioAlmoco = 12 * 60; // 720
$fimAlmoco = 13 * 60;    // 780

$fimHorario = $minutos + $duracaoMinutos;
$invadeAlmoco = !($fimHorario <= $inicioAlmoco || $minutos >= $fimAlmoco);

if ($invadeAlmoco) {
    continue;
}


        $todosHorarios[] = $minutos;
    }

    // Filtrar horários disponíveis considerando duração
    $disponiveis = [];

    foreach ($todosHorarios as $inicioHorario) {
        // Verifica se algum agendamento conflita com o período do serviço a partir desse horário
        $conflito = false;
        foreach ($horariosOcupadosMin as $ocupado) {
            $fimHorario = $inicioHorario + $duracaoMinutos;
            $fimOcupado = $ocupado + $duracaoMinutos;

            // Verifica sobreposição de intervalos [inicioHorario, fimHorario) e [ocupado, fimOcupado)
            if (!($fimHorario <= $ocupado || $inicioHorario >= $fimOcupado)) {
                $conflito = true;
                break;
            }
        }
        if (!$conflito) {
            $disponiveis[] = $inicioHorario;
        }
    }

    // Formatar horários para "HH:mm"
    $disponiveisFormatados = array_map(function($minutos) {
        $h = floor($minutos / 60);
        $m = $minutos % 60;
        return sprintf('%02d:%02d', $h, $m);
    }, $disponiveis);

    return response()->json(array_values($disponiveisFormatados));
}


}
