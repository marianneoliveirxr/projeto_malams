<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PerfilClienteController extends Controller
{
    // Exibe o formulário com os dados do usuário logado
    public function index()
    {
        $cliente = Auth::user();  // pega o usuário autenticado
        return view('perfil-cliente', compact('cliente'));
    }

public function atualizarPerfil(Request $request)
{
    $cliente = Auth::user();

    $request->validate([
        'nomeUser' => 'required|string|max:255',
        'dataNascimento' => 'required|date',
        'celularUser' => [
            'required',
            'string',
            'max:20',
            Rule::unique('users', 'celularUser')->ignore($cliente->id, 'id'),
        ],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($cliente->id, 'id'),
        ],
        'password' => 'nullable|string|min:6|confirmed',
    ], [
        'nomeUser.required' => 'O nome é obrigatório.',
        'dataNascimento.required' => 'A data de nascimento é obrigatória.',
        'dataNascimento.date' => 'A data de nascimento deve ser uma data válida.',
        'celularUser.required' => 'O número de celular é obrigatório.',
        'celularUser.unique' => 'Já existe um cadastro com este número de celular.',
        'email.required' => 'O e-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'email.unique' => 'Já existe um cadastro com este e-mail.',
        'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
        'password.confirmed' => 'A confirmação da senha não confere.',
    ]);

    $cliente->nomeUser = $request->nomeUser;
    $cliente->dataNascimento = $request->dataNascimento;
    $cliente->celularUser = $request->celularUser;
    $cliente->email = $request->email;

    if ($request->filled('password')) {
        $cliente->password = Hash::make($request->password);
    }

    $cliente->save();

    return redirect()->route('perfilCliente.index')->with('success', 'Perfil atualizado com sucesso!');
}

public function excluirConta(Request $request)
{
    $cliente = Auth::user(); // ou o modelo que estiver usando
    Auth::logout();
    $cliente->delete();

    return redirect('/home')->with('success', 'Conta excluída com sucesso.');
}

}
