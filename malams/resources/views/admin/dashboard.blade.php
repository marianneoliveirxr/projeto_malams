@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Sistema Malams Saloom</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @php
            $cardStyle = "bg-white rounded-lg p-6 text-center transition-shadow duration-300 shadow-[0_4px_6px_rgba(217,176,176,0.5)] hover:shadow-[0_10px_15px_rgba(217,176,176,0.7)]";
            $iconStyle = "text-2xl inline-block mr-2 text-gray-600";
        @endphp

        <div class="{{ $cardStyle }}">
            <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center justify-center">
                <i class="fas fa-users {{ $iconStyle }}"></i> Clientes cadastrados
            </h3>
            <p class="text-4xl font-bold text-blue-600">{{ $totalUsers ?? 0 }}</p>
        </div>

        <div class="{{ $cardStyle }}">
            <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center justify-center">
                <i class="fas fa-user-tie {{ $iconStyle }}"></i> Funcionários cadastrados
            </h3>
            <p class="text-4xl font-bold text-blue-600">{{ $totalFuncionarios ?? 0 }}</p>
        </div>

        <div class="{{ $cardStyle }}">
            <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center justify-center">
                <i class="fas fa-calendar-check {{ $iconStyle }}"></i> Agendamentos do dia
            </h3>
            <p class="text-4xl font-bold text-green-600">{{ $pendingTasks ?? 0 }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    {{-- Gráfico de Agendamentos por dia --}}
    <div class="bg-white rounded-lg p-6 shadow-[0_4px_6px_rgba(217,176,176,0.5)]">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
            <i class="fas fa-calendar-alt text-2xl mr-2 text-gray-600"></i> Agendamentos dos últimos 7 dias
        </h3>
        <canvas id="agendamentosChart" height="120"></canvas>
    </div>

    {{-- Gráfico de Receita dos últimos 7 dias --}}
    <div class="bg-white rounded-lg p-6 shadow-[0_4px_6px_rgba(217,176,176,0.5)]">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
            <i class="fas fa-dollar-sign text-2xl mr-2 text-gray-600"></i> Receita dos últimos 7 dias
        </h3>
        <canvas id="receitaChart" height="120"></canvas>
    </div>

    {{-- Gráfico Top 5 Serviços mais vendidos --}}
    <div class="bg-white rounded-lg p-6 shadow-[0_4px_6px_rgba(217,176,176,0.5)]">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
            <i class="fas fa-star text-2xl mr-2 text-gray-600"></i> Top 5 Serviços Mais Vendidos (últimos 30 dias)
        </h3>
        <canvas id="topServicosChart" height="120"></canvas>
    </div>
</div>


    <div class="bg-white rounded-lg p-6 shadow-[0_4px_6px_rgba(217,176,176,0.5)]">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
            <i class="fas fa-history text-2xl mr-2 text-gray-600"></i> Últimas atividades
        </h3>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
            @forelse($recentActivities as $activity)
                <li>{{ $activity }}</li>
            @empty
                <li>Nenhuma atividade recente.</li>
            @endforelse
        </ul>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dados do backend (passados via JSON)
    const labelsAgendamentos = {!! $labels !!};
    const dadosAgendamentos = {!! $totais !!};

    const labelsReceita = {!! $labelsReceita !!};
    const dadosReceita = {!! $valoresReceita !!};

    const labelsServicos = {!! $servicoLabels !!};
    const dadosServicos = {!! $servicoTotais !!};

    // Gráfico Agendamentos por dia
    const ctxAgendamentos = document.getElementById('agendamentosChart').getContext('2d');
    new Chart(ctxAgendamentos, {
        type: 'line',
        data: {
            labels: labelsAgendamentos,
            datasets: [{
                label: 'Agendamentos',
                data: dadosAgendamentos,
                borderColor: '#C63957',
                backgroundColor: 'rgba(198, 57, 87, 0.5)', 
                fill: true,
                tension: 0.4,
                pointRadius: 6, // Tamanho das bolinhas
             pointHoverRadius: 8, // Tamanho das bolinhas ao passar o mouse
            pointBackgroundColor: '#fff', // Cor de fundo das bolinhas
            pointBorderColor: '#C63957', // Cor da borda das bolinhas
            pointBorderWidth: 2 // Largura da borda das bolinhas
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, precision: 0 }
            }
        }
    });

    // Gráfico Receita por dia
    const ctxReceita = document.getElementById('receitaChart').getContext('2d');
    new Chart(ctxReceita, {
        type: 'bar',
        data: {
            labels: labelsReceita,
            datasets: [{
                label: 'Receita (R$)',
                data: dadosReceita,
                backgroundColor: '#C66239'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Gráfico Top 5 Serviços mais vendidos
    const ctxServicos = document.getElementById('topServicosChart').getContext('2d');
    new Chart(ctxServicos, {
        type: 'bar',
        data: {
            labels: labelsServicos,
            datasets: [{
                label: 'Quantidade vendida',
                data: dadosServicos,
                backgroundColor: '#C6A839'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, precision: 0 }
            }
        }
    });
</script>
@endsection
