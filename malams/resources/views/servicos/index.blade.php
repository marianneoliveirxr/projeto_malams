@extends('layouts.app')

@section('content')
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-5">Lista de Serviços</h1>
        <a href="{{ route('funcionarios.create') }}" class="bg-blue-500 text-white p-2 rounded">Novo Funcionário</a>
    </div>
@endsection
