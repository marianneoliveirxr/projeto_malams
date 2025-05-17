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

    <!-- Cards de Funcionários -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {{-- Dados fictícios para exibição temporária --}}
        @php
            $funcionarios = [
                (object)[ 'id' => 1, 'nomeUser' => 'João Silva' ],
                (object)[ 'id' => 2, 'nomeUser' => 'Maria Oliveira' ],
                (object)[ 'id' => 3, 'nomeUser' => 'Carlos Pereira' ],
            ];
        @endphp

        @foreach ($funcionarios as $funcionario)
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="text-lg font-semibold text-gray-800">{{ $funcionario->nomeUser }}</div>
                <div class="mt-4 flex space-x-4 justify-center">
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
            </div>
        @endforeach
    </div>

    <!-- Caso não haja funcionários -->
    @if (empty($funcionarios))
        <div class="mt-4 text-center text-gray-500">Nenhum funcionário encontrado.</div>
    @endif
</div>
@endsection
