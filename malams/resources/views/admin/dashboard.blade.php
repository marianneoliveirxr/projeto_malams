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

    {{-- Gráfico de Agendamentos por dia --}}
    <div class="bg-white rounded-lg p-6 shadow-[0_4px_6px_rgba(217,176,176,0.5)] mb-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center">
            <i class="fas fa-calendar-alt text-2xl mr-2 text-gray-600"></i> Agendamentos dos últimos 7 dias
        </h3>
        <canvas id="agendamentosChart" height="120"></canvas>
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
    {{-- CDN do Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('agendamentosChart').getContext('2d');

        const agendamentosChart = new Chart(ctx, {
            type: 'line', // pode ser 'bar', 'line', etc.
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: 'Agendamentos',
                    data: {!! $totais !!},
                    backgroundColor: 'rgba(217, 176, 176, 0.5)',
                    borderColor: 'rgba(217, 176, 176, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(217, 176, 176, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#333',
                            font: { size: 14 }
                        }
                    }
                }
            }
        });
    </script>
@endsection
