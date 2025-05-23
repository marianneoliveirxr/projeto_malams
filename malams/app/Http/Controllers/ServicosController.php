<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function index()
    {
        $servicos = Servico::with('categoria')->get();
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
            'preco' => 'required|regex:/^\d{1,3}(?:\.\d{3})*,\d{2}$/',
            'duracao' => 'nullable|string|max:10',
        ]);

        // Converte "1.234,56" para "1234.56"
        $preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        Servico::create([
            'idCategoria' => $request->idCategoria,
            'servico' => $request->servico,
            'preco' => $preco,
            'duracao' => $request->duracao,
        ]);

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço criado com sucesso!');
    }

    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.servicos.edit', compact('servico', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'servico' => 'required|string|max:100',
            'preco' => 'required|regex:/^\d{1,3}(?:\.\d{3})*,\d{2}$/',
            'duracao' => 'nullable|string|max:10',
        ]);

        $servico = Servico::findOrFail($id);
        $preco = str_replace(',', '.', str_replace('.', '', $request->preco));

        $servico->update([
            'idCategoria' => $request->idCategoria,
            'servico' => $request->servico,
            'preco' => $preco,
            'duracao' => $request->duracao,
        ]);

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()->route('admin.servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
