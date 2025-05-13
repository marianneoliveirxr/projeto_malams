@extends('layouts.app')

@section('content')
    <div class="flex">
        @include('components.sidebar')

        <div class="w-full p-8 bg-gray-100 min-h-screen">
            <div class="grid grid-cols-3 gap-6 mb-8">
                @include('components.card', ['title' => 'Serviços Realizados', 'value' => $servicosRealizados])
                @include('components.card', ['title' => 'Renda Diária', 'value' => $rendaDiaria])
                @include('components.card', ['title' => 'Usuários Cadastrados', 'value' => $usuariosCadastrados])
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                @include('components.chart', ['id' => 'servicesChart'])
            </div>
        </div>
    </div>
@endsection
