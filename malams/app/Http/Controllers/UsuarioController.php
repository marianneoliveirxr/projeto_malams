<?php

namespace App\Http\Controllers;

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
        $user = new Usuario();
        $user->nomeCliente = $request->txtName;
        $user->cpfCliente = $request->txtCpf;
        $user->idadeCliente = $request->txtIdade;
        $user->celularCliente = $request->txtCelular;
        $user->emailCliente = $request->txtEmail;
        $user->cepCliente = $request->txtCep;
        $user->ruaCliente = $request->txtRua;
        $user->bairroCliente = $request->txtBairro;
        $user->cidadeCliente = $request->txtCidade;
        $user->numeroResidenciaCliente = $request->txtNumResidencia;
        $user->senhaCliente =  Hash::make($request->password); 
        $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d'); 
        $user->save();

        return redirect()->route('entrar')->with('success', 'Usuário cadastrado com sucesso!');

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
