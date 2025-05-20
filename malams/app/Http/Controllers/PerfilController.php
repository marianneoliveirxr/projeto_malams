<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    // Método para exibir o perfil
    public function index()
{
    // Pega o usuário autenticado
    $user = Auth::user(); // Isso garante que você está pegando um único usuário autenticado
    
    // Passa o usuário para a view
    return view('perfil', compact('user'));
}

    // Método para salvar as alterações do perfil
    public function store(Request $request)
    {
        $request->validate([
            'txtName' => 'required|string|max:255',
            'txtCpf' => 'required|unique:users,cpfUser',
            'txtEmail' => 'required|email|unique:users,email',
            'txtCelular' => 'required|unique:users,celularUser',
            'txtDatNascimento' => 'required|date_format:d/m/Y',
            'password' => 'required|min:6|confirmed',
        ], 
        [
            'txtCpf.required' => 'O CPF é obrigatório.',
            'txtCpf.unique' => 'Já existe um cadastro com este CPF.',
            'txtEmail.required' => 'O e-mail é obrigatório.',
            'txtEmail.email' => 'Informe um e-mail válido.',
            'txtEmail.unique' => 'Já existe um cadastro com este e-mail.',
            'txtCelular.required' => 'O número de celular é obrigatório.',
            'txtCelular.unique' => 'Já existe um cadastro com este número de celular.',
            'txtDatNascimento.required' => 'A data de nascimento é obrigatória.',
            'txtDatNascimento.date_format' => 'A data deve estar no formato dd/mm/aaaa.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',
        ]);

        // Converte a data para o formato do banco
        $dataFormatada = Carbon::createFromFormat('d/m/Y', $request->txtDatNascimento)->format('Y-m-d');

        // Cria e salva o usuário
        $user = new User();
        $user->nomeUser = $request->txtName;
        $user->cpfUser = $request->txtCpf;
        $user->dataNascimento = $dataFormatada;
        $user->celularUser = $request->txtCelular;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redireciona após o cadastro com uma mensagem de sucesso
        return redirect()->route('perfil')->with('success', 'Informações alteradas com sucesso!');
    }
}
