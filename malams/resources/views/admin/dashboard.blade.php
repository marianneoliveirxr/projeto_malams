@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Sistema Malams Saloom</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Usuários cadastrados</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers ?? 0 }}</p>
        </div>
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Funcionários cadastrados</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalOrders ?? 0 }}</p>
        </div>
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Agendamentos do dia </h3>
            <p class="text-3xl font-bold text-red-600">{{ $pendingTasks ?? 0 }}</p>
        </div>
    </div>

    <div class="bg-white shadow rounded p-4">
        <h3 class="text-xl font-semibold mb-4">Últimas atividades</h3>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
            @forelse($recentActivities as $activity)
                <li>{{ $activity }}</li>
            @empty
                <li>Nenhuma atividade recente.</li>
            @endforelse
        </ul>
    </div>
@endsection
