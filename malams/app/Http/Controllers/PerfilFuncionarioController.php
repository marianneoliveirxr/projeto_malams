<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class PerfilFuncionarioController extends Controller
{
       public function show($id)
    {
        $funcionario = Funcionario::with(['categoria', 'servico'])->find($id);

        if (!$funcionario) {
            return redirect()->back()->with('error', 'Funcionário não encontrado.');
        }

        return view('funcionario.perfil', compact('funcionario'));
    }

}
