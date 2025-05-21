<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Exibe a lista de categorias.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Mostra o formulário para criar nova categoria.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Armazena a nova categoria no banco.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria' => 'required|string|max:255|unique:categorias,categoria',
        ]);

        Categoria::create([
            'categoria' => $validated['categoria'],
        ]);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Mostra o formulário para editar uma categoria existente.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza a categoria no banco.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validated = $request->validate([
            'categoria' => "required|string|max:255|unique:categorias,categoria,{$id},idCategoria",
        ]);

        $categoria->categoria = $validated['categoria'];
        $categoria->save();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove a categoria do banco.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
