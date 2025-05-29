<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Funcionario;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Servico;
use Illuminate\Http\Request;

class AgendasDashController extends Controller
{
    public function index(Request $request)
    {
        $funcionarios = Funcionario::all();

        $funcionarioId = $request->query('funcionario_id');
        $dataSelecionada = $request->query('data');

        $agendamentos = collect();

        if ($funcionarioId && $dataSelecionada) {
            $agendamentos = Agendamento::with(['servico', 'usuario'])
                ->where('idFuncionario', $funcionarioId)
                ->where('dataAgendamento', $dataSelecionada)
                ->orderBy('hora')
                ->get();
        }

        return view('admin.agendas.index', compact('funcionarios', 'agendamentos', 'funcionarioId', 'dataSelecionada'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.agendas.create', compact('categorias'));
    }


    public function buscarClientes(Request $request)
    {
        $email = $request->query('email');

        if (!$email) {
            return response()->json([]);
        }

        $clientes = User::select('id', 'nomeUser as nome', 'email')
            ->where('email', 'like', "%{$email}%")
            ->limit(10)
            ->get();

        return response()->json($clientes);
    }

    public function getServicos($idCategoria)
    {
        $servicos = Servico::where('idCategoria', $idCategoria)
            ->select('idServico', 'servico', 'preco', 'duracao')
            ->get();

        return response()->json($servicos);
    }

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

    $servico = Servico::find($idServico);
    if (!$servico) {
        return response()->json(['erro' => 'Serviço não encontrado'], 404);
    }

    $duracaoStr = $servico->duracao;
    list($h, $m, $s) = explode(':', $duracaoStr);
    $duracaoMinutos = $h * 60 + $m;

    $inicio = 9 * 60;  // 09:00
    $fim = 17 * 60;    // 17:00
    $intervalo = 30;

    $agendamentos = Agendamento::where('idFuncionario', $idFuncionario)
        ->where('dataAgendamento', $dataAgendamento)
        ->pluck('hora')
        ->toArray();

    $horariosOcupadosMin = array_map(function ($hora) {
        list($hh, $mm, $ss) = explode(':', $hora);
        return $hh * 60 + $mm;
    }, $agendamentos);

    $todosHorarios = [];
    for ($minutos = $inicio; $minutos <= $fim; $minutos += $intervalo) {
        $todosHorarios[] = $minutos;
    }

    $disponiveis = [];

    foreach ($todosHorarios as $inicioHorario) {
        $conflito = false;
        foreach ($horariosOcupadosMin as $ocupado) {
            $fimHorario = $inicioHorario + $duracaoMinutos;
            $fimOcupado = $ocupado + $duracaoMinutos;

            if (!($fimHorario <= $ocupado || $inicioHorario >= $fimOcupado)) {
                $conflito = true;
                break;
            }
        }
        if (!$conflito) {
            $disponiveis[] = $inicioHorario;
        }
    }

    // Aplicar filtro das regras do admin

    // Obter data atual
    $agora = new \DateTime('now');
    $hoje = $agora->format('Y-m-d');
    $horaAtual = $agora->format('H:i');
    list($horaAtualH, $horaAtualM) = explode(':', $horaAtual);
    $horaAtualMinutos = intval($horaAtualH) * 60 + intval($horaAtualM);

    $disponiveisFiltrados = array_filter($disponiveis, function ($minutos) use ($dataAgendamento, $hoje, $horaAtualMinutos) {
        // Excluir horário entre 12:00 e 13:00
        if ($minutos >= 12 * 60 && $minutos < 13 * 60) {
            return false;
        }

        // Se for hoje, excluir horários anteriores ou iguais ao horário atual
        if ($dataAgendamento === $hoje && $minutos <= $horaAtualMinutos) {
            return false;
        }

        return true;
    });

    $disponiveisFormatados = array_map(function ($minutos) {
        $h = floor($minutos / 60);
        $m = $minutos % 60;
        return sprintf('%02d:%02d', $h, $m);
    }, $disponiveisFiltrados);

    return response()->json(array_values($disponiveisFormatados));
}


    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'idServico' => 'required|exists:servicos,idServico',
            'idFuncionario' => 'required|exists:funcionarios,idFuncionario',
            'user_id' => 'required|exists:users,id',
            'dataAgendamento' => 'required|date',
            'hora' => 'required',
            'statusAgendamento' => 'nullable|string',
            'confirmacao' => 'nullable|in:sim,nao,pendente',
        ]);

        // Criar o agendamento
        Agendamento::create([
            'idServico' => $request->idServico,
            'idFuncionario' => $request->idFuncionario,
            'idUser' => $request->user_id,
            'dataAgendamento' => $request->dataAgendamento,
            'hora' => $request->hora,
            'statusAgendamento' => 'Pendente',
            'confirmacao' => 'nao',
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('admin.agendas.index')->with('success', 'Agendamento salvo com sucesso!');
    }

    public function destroy($id)
    {
    $agendamento = Agendamento::find($id);

    if (!$agendamento) {
        return redirect()->back()->with('error', 'Agendamento não encontrado.');
    }

    $agendamento->delete();

    return redirect()->back()->with('success', 'Agendamento excluído com sucesso!');
    }

}
