@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Título da página -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Funcionários</h1>

        <!-- Botão de Adicionar Funcionário com ícone de + (somente o ícone) -->
        <a href="{{ route('admin.funcionarios.create') }}" class="p-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
            <i class="fas fa-plus text-2xl"></i> <!-- Ícone de + -->
        </a>
    </div>

    <!-- Tabela de Funcionários -->
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
                    $funcionarios = [
                        (object)[ 'id' => 1, 'nomeUser' => 'João Silva' ],
                        (object)[ 'id' => 2, 'nomeUser' => 'Maria Oliveira' ],
                        (object)[ 'id' => 3, 'nomeUser' => 'Carlos Pereira' ],
                    ];
                @endphp

                @foreach ($funcionarios as $funcionario)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $funcionario->nomeUser }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-600">
                            <div class="flex space-x-4">
                                <!-- Botão de Editar -->
                                <a href="{{ route('admin.funcionarios.edit', $funcionario->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                    <i class="fas fa-edit text-xl"></i> <!-- Ícone de edição -->
                                </a>

                                <!-- Formulário de Excluir -->
                                <form action="{{ route('admin.funcionarios.destroy', $funcionario->id) }}" method="POST" class="inline">
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

    <!-- Caso não haja funcionários -->
    @if (empty($funcionarios))
        <div class="mt-4 text-center text-gray-500">Nenhum funcionário encontrado.</div>
    @endif
</div>
@endsection
