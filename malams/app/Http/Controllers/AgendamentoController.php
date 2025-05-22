<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $validated = $request->validate([
            'servico' => 'required|string',
            'data' => 'required|date|after_or_equal:today',
            'hora' => 'required|string',
            'profissional' => 'required|string',
        ]);

        // Cria um novo agendamento
        Agendamento::create([
            'idServico' => $validated['servico'],
            'idFuncionario' => $this->getFuncionarioByNome($validated['profissional']),
            'idUser' => auth()->id(), // Certifique-se de que o usuário esteja autenticado
            'dataAgendamento' => Carbon::parse($validated['data']),
            'hora' => $validated['hora'],
            'statusAgendamento' => 'pendente',
            'confirmacao' => 'nao',
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento realizado com sucesso!');
    }

    private function getFuncionarioByNome($nome)
    {
        // Aqui você deve ter algum método para encontrar o id do funcionário pelo nome
        return \App\Models\Funcionario::where('nome', $nome)->first()->idFuncionario;
    }
}
