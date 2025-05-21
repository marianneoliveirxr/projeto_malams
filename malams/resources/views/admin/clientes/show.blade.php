@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Botão Voltar -->
    <div class="mb-6">
        <a href="{{ route('admin.clientes.index') }}"
           class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition duration-200">
            ← Voltar
        </a>
    </div>

    <div class="bg-white rounded-lg p-8 max-w-2xl mx-auto transition-shadow duration-300"
         style="box-shadow: 0 4px 6px rgba(217, 176, 176, 0.5);"
         onmouseover="this.style.boxShadow='0 10px 15px rgba(217, 176, 176, 0.7)'"
         onmouseout="this.style.boxShadow='0 4px 6px rgba(217, 176, 176, 0.5)'">
        
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Detalhes do Cliente</h2>

        <div class="grid grid-cols-1 gap-4">
            <div>
                <strong class="text-gray-600">Nome:</strong>
                <p class="text-gray-800">{{ $cliente->nomeUser }}</p>
            </div>
            <div>
                <strong class="text-gray-600">CPF:</strong>
                <p class="text-gray-800">{{ $cliente->cpfUser }}</p>
            </div>
            <div>
                <strong class="text-gray-600">Data de Nascimento:</strong>
                <p class="text-gray-800">{{ \Carbon\Carbon::parse($cliente->dataNascimento)->format('d/m/Y') }}</p>
            </div>
            <div>
                <strong class="text-gray-600">Celular:</strong>
                <p class="text-gray-800">{{ $cliente->celularUser }}</p>
            </div>
            <div>
                <strong class="text-gray-600">Email:</strong>
                <p class="text-gray-800">{{ $cliente->email }}</p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                    Excluir Cliente
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
