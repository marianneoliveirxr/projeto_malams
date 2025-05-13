<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = Perfil::all();
                    //nome da view       //nome do atributo $cliente sem $
       return view('perfil',compact('perfil'));
    }

    public function store(Request $request)
    {
        $perfil = new Perfil();
            $perfil ->  nome = $request -> nomeCliente;
            $perfil ->  cpf = $request -> cpfCliente;
            $perfil ->  data = $request -> dataNascimento;
            $perfil ->  celular = $request -> celularCliente;
            $perfil ->  email = $request -> emailCliente;

            $perfil -> save ();

            return redirect ('/perfil');
    }
}
