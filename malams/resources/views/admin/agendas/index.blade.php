@extends('layouts.admin')

@section('content')
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

<div class="container mx-auto px-4 py-8">
    <!-- Título da página -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-semibold text-black">Agendamentos</h1>

        <!-- Botão de Adicionar Agendamento (se quiser, senão pode remover) -->
        <a href="{{ route('admin.agendas.create') }}" 
           class="flex items-center gap-2 p-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
            <i class="fas fa-plus text-lg"></i>
            <span class="text-lg font-semibold">Adicionar</span>
        </a>
    </div>

    <!-- Filtros: Funcionário e Data -->
    <form method="GET" action="{{ route('admin.agendas.index') }}" class="mb-6 flex flex-wrap gap-4 items-end">

        <div class="flex flex-col mb-4">
            <label for="funcionario" class="mb-1 font-semibold text-gray-700">Funcionário</label>
            <select name="funcionario_id" id="funcionario"
                class="border rounded-lg p-2 w-64 bg-white shadow-sm focus:outline-none focus:ring-2 focus:border transition"
                style="border-color: #d9b0b0; focus:ring-color: #d9b0b0;">
                <option value="">-- Selecione --</option>
                @foreach($funcionarios as $func)
                    <option value="{{ $func->idFuncionario }}" {{ (isset($funcionarioId) && $funcionarioId == $func->idFuncionario) ? 'selected' : '' }}>
                        {{ $func->nomeFuncionario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-4">
            <label for="data" class="mb-1 font-semibold text-gray-700">Data</label>
            <input type="date" name="data" id="data"
                class="border rounded-lg p-2 w-64 bg-white shadow-sm focus:outline-none focus:ring-2 focus:border transition"
                style="border-color: #d9b0b0; focus:ring-color: #d9b0b0;"
                value="{{ $dataSelecionada ?? '' }}">
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
                    <th class="border border-[#d9b0b0] px-6 py-4 text-left text-lg font-semibold w-48">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendamentos as $agendamento)
                    <tr class="border-b border-[#d9b0b0] hover:bg-gray-100 transition-colors">
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">{{ $agendamento->hora }}</td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">{{ $agendamento->usuario->nomeUser ?? 'N/A' }}</td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">{{ $agendamento->servico->servico ?? 'N/A' }}</td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">{{ $agendamento->statusAgendamento }}</td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-800">{{ $agendamento->confirmacao_formatada }}</td>
                        <td class="border border-[#d9b0b0] px-6 py-4 text-base text-gray-600">
                            <div class="flex space-x-6">
                                

                                <!-- Formulário de Excluir -->
                                <form action="{{ route('admin.agendas.destroy', $agendamento->idAgendamento) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este agendamento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="flex items-center gap-2 text-red-500 hover:text-red-700 transition duration-200 text-base font-medium">
                                        <i class="fas fa-trash-alt text-xl"></i>
                                        <span>Excluir</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">Nenhum agendamento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
