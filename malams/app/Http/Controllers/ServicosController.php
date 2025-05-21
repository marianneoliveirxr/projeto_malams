<?php

namespace App\Http\Controllers;

use App\Models\Servicos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index()
    {
        // Pega todos os serviços com suas categorias (eager loading)
        $servicos = Servicos::with('categoria')->get();

        return view('admin.servicos.index', compact('servicos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.servicos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'servico' => 'required|string|max:100',
            'preco' => 'required|regex:/^\d{1,3},\d{2}$/',
        ]);

        // Converte preço para formato decimal para salvar (ex: "50,00" -> 50.00)
        $preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        Servicos::create([
            'idCategoria' => $request->idCategoria,
            'servico' => $request->servico,
            'preco' => $preco,
        ]);

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    public function edit($id)
    {
        $servico = Servicos::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.servicos.edit', compact('servico', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'servico' => 'required|string|max:100',
            'preco' => 'required|regex:/^\d{1,3},\d{2}$/',
        ]);

        $servico = Servicos::findOrFail($id);
        $preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        $servico->update([
            'idCategoria' => $request->idCategoria,
            'servico' => $request->servico,
            'preco' => $preco,
        ]);

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $servico = Servicos::findOrFail($id);
        $servico->delete();

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
