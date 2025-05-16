@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Serviço</h1>

    <!-- Formulário para Editar Serviço -->
    <form action="{{ route('admin.servicos.update', 1) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método PUT para atualização -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Nome do Serviço -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-600">Nome do Serviço</label>
                <input type="text" id="nome" name="nome" value="Corte de Cabelo" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Descrição do Serviço -->
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-600">Descrição</label>
                <textarea id="descricao" name="descricao" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>Corte de cabelo para todos os tipos de cabelo. Realizado com as melhores técnicas e produtos.</textarea>
            </div>

            <!-- Preço -->
            <div class="mb-4">
                <label for="preco" class="block text-sm font-medium text-gray-600">Preço</label>
                <input type="text" id="preco" name="preco" value="50" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.servicos.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Atualizar</button>
            </div>
        </div>
    </form>
</div>

<!-- Script para Formatação de Preço -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const precoInput = document.getElementById('preco');

        precoInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo o que não for número ou ponto
            value = value.replace(/\D/g, '');

            // Aplica a formatação
            value = value.replace(/(\d)(\d{2})$/, '$1,$2'); // Coloca a vírgula antes dos dois últimos dígitos

            // Formata para o padrão "R$ 00,00"
            if (value.length > 2) {
                value = 'R$ ' + value.replace(/(\d)(\d{3})(\d)/, '$1$2.$3'); // Adiciona o ponto de milhar
            }

            // Limita o valor a 15 caracteres (ex: "R$ 999.999.999,99")
            value = value.substring(0, 15);

            e.target.value = value;
        });
    });
</script>
@endsection
