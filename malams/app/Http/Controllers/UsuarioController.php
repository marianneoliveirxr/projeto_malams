<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtCpf' => 'required|unique:clientes,cpfCliente',
            'txtEmail' => 'required|email|unique:clientes,emailCliente',
            'txtCelular' => 'required|unique:clientes,celularCliente',
            'txtDatNascimento' => 'required|date_format:d/m/Y',
            'password' => 'required|min:6|confirmed',
        ], [
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
        $user = new Usuario();
        $user->nomeCliente = $request->txtName;
        $user->cpfCliente = $request->txtCpf;
        $user->dataNascimento = $dataFormatada;
        $user->celularCliente = $request->txtCelular;
        $user->emailCliente = $request->txtEmail;
        $user->senhaCliente = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('cadastro')->with('success', 'Usuário cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
