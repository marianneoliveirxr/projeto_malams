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
    $messages = [
        'nomeUser.required' => 'O nome é obrigatório.',
        'nomeUser.string' => 'O nome deve ser um texto.',
        'nomeUser.max' => 'O nome pode ter no máximo 50 caracteres.',

        'email.required' => 'O e-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'email.max' => 'O e-mail pode ter no máximo 50 caracteres.',
        'email.unique' => 'Este e-mail já está cadastrado.',

        'celularUser.string' => 'O celular deve ser um texto.',
        'celularUser.max' => 'O celular pode ter no máximo 20 caracteres.',
        'celularUser.unique' => 'Este celular já está cadastrado.',


        'cpfUser.required' => 'O CPF é obrigatório.',
        'cpfUser.string' => 'O CPF deve ser um texto.',
        'cpfUser.max' => 'O CPF pode ter no máximo 20 caracteres.',
        'cpfUser.unique' => 'Este CPF já está cadastrado.',

        'password.required' => 'A senha é obrigatória.',
        'password.string' => 'A senha deve ser um texto.',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres.',

        'idCategoria.required' => 'A categoria é obrigatória.',
        'idCategoria.exists' => 'A categoria selecionada é inválida.',

        'idServico.required' => 'O serviço é obrigatório.',
        'idServico.exists' => 'O serviço selecionado é inválido.',
    ];

    $validated = $request->validate([
        'nomeUser' => 'required|string|max:50',
        'email' => 'required|email|max:50|unique:funcionarios,emailFuncionario',
        'celularUser' => 'nullable|string|max:20|unique:funcionarios,celularFuncionario',
        'cpfUser' => 'required|string|max:20|unique:funcionarios,cpfFuncionario',
        'password' => 'required|string|min:6',
        'idCategoria' => 'required|exists:categorias,idCategoria',
        'idServico' => 'required|exists:servicos,idServico',
    ], $messages);

    Funcionario::create([
        'nomeFuncionario' => $validated['nomeUser'],
        'emailFuncionario' => $validated['email'],
        'celularFuncionario' => $validated['celularUser'] ?? null,
        'cpfFuncionario' => $validated['cpfUser'],
        'senhaFuncionario' => bcrypt($validated['password']),
        'idPermissao' => 2,
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

    $messages = [
        'nomeFuncionario.required' => 'O nome é obrigatório.',
        'nomeFuncionario.string' => 'O nome deve ser um texto.',
        'nomeFuncionario.max' => 'O nome pode ter no máximo 50 caracteres.',

        'emailFuncionario.required' => 'O e-mail é obrigatório.',
        'emailFuncionario.email' => 'Informe um e-mail válido.',
        'emailFuncionario.max' => 'O e-mail pode ter no máximo 50 caracteres.',

        'celularFuncionario.string' => 'O celular deve ser um texto.',
        'celularFuncionario.max' => 'O celular pode ter no máximo 20 caracteres.',

        'cpfFuncionario.required' => 'O CPF é obrigatório.',
        'cpfFuncionario.string' => 'O CPF deve ser um texto.',
        'cpfFuncionario.max' => 'O CPF pode ter no máximo 20 caracteres.',

        'idCategoria.required' => 'A categoria é obrigatória.',
        'idCategoria.exists' => 'A categoria selecionada é inválida.',

        'idServico.required' => 'O serviço é obrigatório.',
        'idServico.exists' => 'O serviço selecionado é inválido.',

        'senhaFuncionario.min' => 'A senha deve ter no mínimo 6 caracteres.',
        'senhaFuncionario.confirmed' => 'A confirmação da senha não confere.',
    ];

    $request->validate([
        'nomeFuncionario' => 'required|string|max:50',
        'emailFuncionario' => 'required|email|max:50',
        'celularFuncionario' => 'nullable|string|max:20',
        'cpfFuncionario' => 'required|string|max:20',
        'idCategoria' => 'required|exists:categorias,idCategoria',
        'idServico' => 'required|exists:servicos,idServico',
        'senhaFuncionario' => 'nullable|string|min:6|confirmed',
    ], $messages);

    $funcionario->nomeFuncionario = $request->nomeFuncionario;
    $funcionario->emailFuncionario = $request->emailFuncionario;
    $funcionario->celularFuncionario = $request->celularFuncionario;
    $funcionario->cpfFuncionario = $request->cpfFuncionario;
    $funcionario->idCategoria = $request->idCategoria;
    $funcionario->idServico = $request->idServico;

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
