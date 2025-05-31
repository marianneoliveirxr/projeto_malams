@extends('layouts.admin')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="container mx-auto px-4 py-8">
   
    <!-- Cabeçalho: Botão Voltar + Título centralizado -->
    <div class="relative mb-8">
        <!-- Botão Voltar -->
         <a href="{{ route('admin.clientes.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition duration-200">
            <!-- Ícone de seta para a esquerda -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#000]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
            </svg>
            Voltar
        </a>

        <!-- Título Centralizado -->
        <h2 class="text-3xl font-semibold text-black text-center">
            Detalhes do Cliente
        </h2>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl p-10 max-w-xl mx-auto"
         style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
         onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
         onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >

        <!-- Dados -->
        <div class="space-y-6 text-black">
            <div>
                <label class="flex items-center gap-2 text-xl font-bold mb-1">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z"/>
                    </svg>
                    Nome
                </label>
                <p class="text-lg">{{ $cliente->nomeUser }}</p>
            </div>

            <div>
                <label class="flex items-center gap-2 text-xl font-bold mb-1">
                    <!-- ID Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4.5 3.75h15a.75.75 0 01.75.75v15a.75.75 0 01-.75.75h-15a.75.75 0 01-.75-.75v-15a.75.75 0 01.75-.75zM12 8.25a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM6.75 18a5.25 5.25 0 0110.5 0"/>
                    </svg>
                    CPF
                </label>
                <p class="text-lg">{{ $cliente->cpfUser }}</p>
            </div>

            <div>
                <label class="flex items-center gap-2 text-xl font-bold mb-1">
                    <!-- Calendar Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M8 7V3m8 4V3M3.75 8.25h16.5M4.5 6h15a1.5 1.5 0 011.5 1.5v11.25a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 18.75V7.5A1.5 1.5 0 014.5 6z"/>
                    </svg>
                    Data de Nascimento
                </label>
                <p class="text-lg">{{ \Carbon\Carbon::parse($cliente->dataNascimento)->format('d/m/Y') }}</p>
            </div>

            <div>
                <label class="flex items-center gap-2 text-xl font-bold mb-1">
                    <!-- Phone Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M2.25 4.5l4.636-.772a1.5 1.5 0 011.534.746l2.352 4.235a1.5 1.5 0 01-.207 1.742l-1.837 2.092a11.263 11.263 0 005.25 5.25l2.092-1.837a1.5 1.5 0 011.742-.207l4.235 2.352a1.5 1.5 0 01.746 1.534l-.772 4.636a1.5 1.5 0 01-1.476 1.26A18.75 18.75 0 012.25 4.5z"/>
                    </svg>
                    Celular
                </label>
                <p class="text-lg">{{ $cliente->celularUser }}</p>
            </div>

            <div>
                <label class="flex items-center gap-2 text-xl font-bold mb-1">
                    <!-- Email Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25"/>
                    </svg>
                    Email
                </label>
                <p class="text-lg">{{ $cliente->email }}</p>
            </div>
        </div>

        <!-- Botões -->
        <div class="mt-10 flex justify-center gap-6">
            <a href="{{ route('admin.clientes.edit', $cliente->id) }}"
               class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                Editar Cliente
            </a>

            <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST"
                  onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
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
