<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
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
            'cpfCliente' => 'required|unique:clientes,cpfCliente',  // Verifica se o CPF é único
            'emailCliente' => 'required|email|unique:clientes,emailCliente',  // Verifica se o e-mail é único
            'celularCliente' => 'required|unique:clientes,celularCliente',  // Verifica se o celular é único
            'password' => 'required|min:6|confirmed',
        ], [
            'cpfCliente.required' => 'O CPF é obrigatório.',
            'cpfCliente.unique' => 'Já existe um cadastro com este CPF.',
            
            'emailCliente.required' => 'O e-mail é obrigatório.',
            'emailCliente.email' => 'Informe um e-mail válido.',
            'emailCliente.unique' => 'Já existe um cadastro com este e-mail.',
            
            'celularCliente.required' => 'O número de celular é obrigatório.',
            'celularCliente.unique' => 'Já existe um cadastro com este número de celular.',
        ]);

        $user = new Usuario();
        $user->nomeCliente = $request->txtName;
        $user->cpfCliente = $request->txtCpf;
        $user->dataNascimento = $request->txtDatNascimento;
        $user->celularCliente = $request->txtCelular;
        $user->emailCliente = $request->txtEmail;
        $user->senhaCliente =  Hash::make($request->password); 
        // $user->created_at = date('Y-m-d');
        // $user->updated_at = date('Y-m-d'); 
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
