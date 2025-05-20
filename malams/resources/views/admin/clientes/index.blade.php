@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Título da página e botão alinhados -->
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-semibold text-gray-800">Clientes</h1>

        <!-- Botão Adicionar com ícone + e texto -->
        <a href="{{ route('admin.clientes.create') }}" 
           class="flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
            <i class="fas fa-plus text-lg"></i>
            <span class="text-lg font-semibold">Adicionar</span>
        </a>
    </div>

    <!-- Cards de Clientes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @php
            $clientes = [
                (object)[ 'id' => 1, 'nomeUser' => 'Pedro Santos' ],
                (object)[ 'id' => 2, 'nomeUser' => 'Ana Costa' ],
                (object)[ 'id' => 3, 'nomeUser' => 'Roberta Lima' ],
            ];
        @endphp

        @foreach ($clientes as $cliente)
            <div 
                class="bg-white p-6 rounded-lg transition-shadow duration-300 flex flex-col items-center justify-center min-h-[150px]"
                style="box-shadow: 0 4px 6px rgba(217, 176, 176, 0.5);"
                onmouseover="this.style.boxShadow='0 10px 15px rgba(217, 176, 176, 0.7)'"
                onmouseout="this.style.boxShadow='0 4px 6px rgba(217, 176, 176, 0.5)'"
            >
                <div class="text-xl font-semibold text-gray-800 text-center">
                    {{ $cliente->nomeUser }}
                </div>

                <div class="mt-6 flex space-x-6 justify-center w-full">
                    <!-- Botão Editar -->
                    <a href="{{ route('admin.clientes.edit', $cliente->id) }}" 
                       class="flex items-center gap-2 text-blue-500 hover:text-blue-700 transition duration-200 text-lg font-medium">
                        <i class="fas fa-edit text-xl"></i>
                        <span>Editar</span>
                    </a>

                    <!-- Botão Excluir -->
                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="flex items-center gap-2 text-red-500 hover:text-red-700 transition duration-200 text-lg font-medium">
                            <i class="fas fa-trash-alt text-xl"></i>
                            <span>Excluir</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @if (empty($clientes))
        <div class="mt-4 text-center text-gray-500">Nenhum cliente encontrado.</div>
    @endif
</div>
@endsection
