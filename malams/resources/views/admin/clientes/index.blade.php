@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Título da página centralizado -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-semibold text-gray-800">Clientes</h1>
    </div>

    <!-- Cards de Clientes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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

                <div class="mt-6 flex justify-center w-full">
                    <!-- Botão Editar -->
                    <a href="{{ route('admin.clientes.show', $cliente->id) }}" 
                       class="flex items-center gap-2 text-blue-500 hover:text-blue-700 transition duration-200 text-lg font-medium">
                        <i class="fas fa-edit text-xl"></i>
                        <span>Detalhes</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if ($clientes->isEmpty())
        <div class="mt-4 text-center text-gray-500">Nenhum cliente encontrado.</div>
    @endif
</div>
@endsection
