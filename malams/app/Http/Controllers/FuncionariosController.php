<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Categoria;
use App\Models\Servico;

class FuncionariosController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::with(['categoria', 'servico'])->get();
        return view('admin.funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $servicos = Servico::all();

        return view('admin.funcionarios.create', compact('categorias', 'servicos'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomeUser' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:funcionarios,emailFuncionario',
            'celularUser' => 'nullable|string|max:20',
            'cpfUser' => 'required|string|max:20|unique:funcionarios,cpfFuncionario',
            'password' => 'required|string|min:6',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'idServico' => 'required|exists:servicos,idServico',
        ]);

        Funcionario::create([
            'nomeFuncionario' => $validated['nomeUser'],
            'emailFuncionario' => $validated['email'],
            'celularFuncionario' => $validated['celularUser'] ?? null,
            'cpfFuncionario' => $validated['cpfUser'],
            'senhaFuncionario' => bcrypt($validated['password']),
            'idPermissao' => 2, // fixo como você pediu
            'idCategoria' => $validated['idCategoria'],
            'idServico' => $validated['idServico'],
        ]);

        return redirect()->route('admin.funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
    }

     public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $categorias = Categoria::all();
        $servicos = Servico::all();

        return view('admin.funcionarios.edit', compact('funcionario', 'categorias', 'servicos'));
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);

        // Validação
        $request->validate([
            'nomeFuncionario' => 'required|string|max:50',
            'emailFuncionario' => 'required|email|max:50',
            'celularFuncionario' => 'nullable|string|max:20',
            'cpfFuncionario' => 'required|string|max:20',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'idServico' => 'required|exists:servicos,idServico',
            'senhaFuncionario' => 'nullable|string|min:6|confirmed',
        ]);

        // Atualiza os dados
        $funcionario->nomeFuncionario = $request->nomeFuncionario;
        $funcionario->emailFuncionario = $request->emailFuncionario;
        $funcionario->celularFuncionario = $request->celularFuncionario;
        $funcionario->cpfFuncionario = $request->cpfFuncionario;
        $funcionario->idCategoria = $request->idCategoria;
        $funcionario->idServico = $request->idServico;

        // Atualiza senha apenas se o campo foi preenchido
        if ($request->filled('senhaFuncionario')) {
            $funcionario->senhaFuncionario = Hash::make($request->senhaFuncionario);
        }

        $funcionario->save();

        return redirect()->route('admin.funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('admin.funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
    }
}
