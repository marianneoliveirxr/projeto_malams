@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Título da página -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Clientes</h1>

        <!-- Botão de Adicionar Cliente com ícone de + (somente o ícone) -->
        <a href="{{ route('admin.clientes.create') }}" class="p-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
            <i class="fas fa-plus text-2xl"></i> <!-- Ícone de + -->
        </a>
    </div>

    <!-- Tabela de Clientes -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-[#d9b0b0] text-white">
                    <th class="px-6 py-4 text-left text-sm font-medium">Nome</th>
                    <th class="px-6 py-4 text-left text-sm font-medium">Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- Dados fictícios para exibição temporária --}}
                @php
                    $clientes = [
                        (object)[ 'id' => 1, 'nomeUser' => 'Pedro Santos' ],
                        (object)[ 'id' => 2, 'nomeUser' => 'Ana Costa' ],
                        (object)[ 'id' => 3, 'nomeUser' => 'Roberta Lima' ],
                    ];
                @endphp

                @foreach ($clientes as $cliente)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $cliente->nomeUser }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-600">
                            <div class="flex space-x-4">
                                <!-- Botão de Editar -->
                                <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                    <i class="fas fa-edit text-xl"></i> <!-- Ícone de edição -->
                                </a>

                                <!-- Formulário de Excluir -->
                                <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200">
                                        <i class="fas fa-trash-alt text-xl"></i> <!-- Ícone de lixeira -->
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Caso não haja clientes -->
    @if (empty($clientes))
        <div class="mt-4 text-center text-gray-500">Nenhum cliente encontrado.</div>
    @endif
</div>
@endsection
