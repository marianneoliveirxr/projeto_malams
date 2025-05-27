@extends('layouts.funcionario')

@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Título da página -->
    <div class="mb-6">
        <h1 class="text-4xl font-semibold text-black">Agendamentos</h1>
    </div>

    <!-- Filtros: Data -->
    <form method="GET" action="{{ route('funcionario.agenda', ['idFuncionario' => $funcionario->idFuncionario]) }}" class="mb-6 flex flex-wrap gap-4 items-end">

        <div class="flex flex-col mb-4">
            <label for="data" class="mb-1 font-semibold text-gray-700">Data</label>
            <input type="date" name="data" id="data"
                class="border rounded-lg p-2 w-64 bg-white shadow-sm focus:outline-none focus:ring-2 focus:border transition"
                style="border-color: #d9b0b0; focus:ring-color: #d9b0b0;"
                value="{{ $dataSelecionada }}">
        </div>

        <div class="flex flex-col mb-4">
            <label class="invisible mb-1">Buscar</label>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Buscar
            </button>
        </div>

    </form>

    <!-- Tabela de Agendamentos -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg" style="box-shadow: 0 4px 10px rgba(217, 176, 176, 0.7);">
        <table class="min-w-full table-auto border-collapse border border-[#d9b0b0]">
            <thead>
                <tr class="bg-[#d9b0b0] text-white">
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold">Horário</th>
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold">Cliente</th>
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold">Serviço</th>
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold">Status</th>
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold">Confirmação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendamentos as $agendamento)
                    <tr class="border-b border-[#d9b0b0] hover:bg-gray-100 transition-colors">
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">
                            {{ \Carbon\Carbon::parse($agendamento->hora)->format('H:i') }}
                        </td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">
                            {{ $agendamento->usuario->nomeUser ?? '-' }}
                        </td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">
                            {{ $agendamento->servico->servico ?? '-' }}
                        </td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">
                            {{ ucfirst($agendamento->statusAgendamento) }}
                        </td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">
                            {{ $agendamento->confirmacaoFormatada }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Nenhum agendamento para esta data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
