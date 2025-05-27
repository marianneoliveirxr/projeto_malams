@extends('layouts.funcionario')

@section('title', 'Perfil do Funcionário')

@section('content')
<h1 class="text-3xl font-bold text-center mb-10">Perfil do Funcionário</h1>

<div class="max-w-xl mx-auto bg-white rounded-2xl p-8"
    style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
    onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
    onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
>
    <div class="space-y-6 text-black">
        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                </svg>
                Nome
            </label>
            <p class="text-lg">{{ $funcionario->nomeFuncionario ?? '-' }}</p>
        </div>

        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- Envelope Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5A2.25 2.25 0 0119.5 19.5H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25" />
                </svg>
                Email
            </label>
            <p class="text-lg">{{ $funcionario->emailFuncionario ?? '-' }}</p>
        </div>

        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- Phone Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 4.5l4.636-.772a1.5 1.5 0 011.534.746l2.352 4.235a1.5 1.5 0 01-.207 1.742l-1.837 2.092a11.263 11.263 0 005.25 5.25l2.092-1.837a1.5 1.5 0 011.742-.207l4.235 2.352a1.5 1.5 0 01.746 1.534l-.772 4.636a1.5 1.5 0 01-1.476 1.26A18.75 18.75 0 012.25 4.5z" />
                </svg>
                Celular
            </label>
            <p class="text-lg">{{ $funcionario->celularFuncionario ?? '-' }}</p>
        </div>

        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- Identification Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 3.75h15a.75.75 0 01.75.75v15a.75.75 0 01-.75.75h-15a.75.75 0 01-.75-.75v-15a.75.75 0 01.75-.75zM12 8.25a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM6.75 18a5.25 5.25 0 0110.5 0" />
                </svg>
                CPF
            </label>
            <p class="text-lg">{{ $funcionario->cpfFuncionario ?? '-' }}</p>
        </div>

        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- Tag Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 3.75h9a.75.75 0 01.75.75v5.25a.75.75 0 01-.22.53l-8.25 8.25a.75.75 0 01-1.06 0l-5.25-5.25a.75.75 0 010-1.06l8.25-8.25a.75.75 0 01.53-.22zM12 7.5a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                Categoria
            </label>
            <p class="text-lg">{{ $funcionario->categoria?->categoria ?? '-' }}</p>
        </div>

        <div>
            <label class="flex items-center gap-2 text-xl font-bold mb-1">
                <!-- Scissors Icon (custom SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d9b0b0]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M14.5 12L3 3m0 18l11.5-9M20 4a2 2 0 110 4 2 2 0 010-4zm0 12a2 2 0 110 4 2 2 0 010-4z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Serviço
            </label>
            <p class="text-lg">{{ $funcionario->servico?->servico ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection
