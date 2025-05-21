@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-semibold text-gray-800">Categorias</h1>

        <a href="{{ route('admin.categorias.create') }}" 
           class="flex items-center gap-2 p-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
            <i class="fas fa-plus text-lg"></i>
            <span class="text-lg font-semibold">Adicionar</span>
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-lg" style="box-shadow: 0 4px 10px rgba(217, 176, 176, 0.7);">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-[#d9b0b0] text-white">
                    <th class="border border-gray-300 px-6 py-4 text-left text-lg font-semibold">Categoria</th>
                    <th class="border border-gray-300 px-6 py-4 text-left text-lg font-semibold w-48">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr class="border-b border-gray-300 hover:bg-gray-200 transition-colors">
                        <td class="border border-gray-300 px-6 py-4 text-base font-medium text-gray-800">{{ $categoria->categoria }}</td>
                        <td class="border border-gray-300 px-6 py-4 text-base font-medium text-gray-600">
                            <div class="flex space-x-6">
                                <a href="{{ route('admin.categorias.edit', $categoria->idCategoria) }}" 
                                   class="flex items-center gap-2 text-blue-500 hover:text-blue-700 transition duration-200 text-base font-medium">
                                    <i class="fas fa-edit text-xl"></i>
                                    <span>Editar</span>
                                </a>

                                <form action="{{ route('admin.categorias.destroy', $categoria->idCategoria) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="flex items-center gap-2 text-red-500 hover:text-red-700 transition duration-200 text-base font-medium"
                                            onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                        <i class="fas fa-trash-alt text-xl"></i>
                                        <span>Excluir</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-8 text-gray-500">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
