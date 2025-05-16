@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Adicionar Novo Funcionário</h1>

    <!-- Formulário para Adicionar Funcionário -->
    <form action="{{ route('admin.funcionarios.store') }}" method="POST">
        @csrf
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Nome -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-600">Nome</label>
                <input type="text" id="nome" name="nomeUser" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- E-mail -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">E-mail</label>
                <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Celular -->
            <div class="mb-4">
                <label for="celular" class="block text-sm font-medium text-gray-600" placeholder="(00) 00000-0000">Celular</label>
                <input type="text" id="celular" name="celularUser" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-600" placeholder="000.000.000-00">CPF</label>
                <input type="text" id="cpf" name="cpfUser" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Senha</label>
                <input type="password" id="password" name="password" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.funcionarios.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Salvar</button>
            </div>
        </div>
    </form>
</div>

<!-- Scripts de Máscara de CPF, Celular, etc. -->
<script>
    // Script para CPF
    document.addEventListener('DOMContentLoaded', function () {
        const cpfInput = document.getElementById('cpf');
        cpfInput.addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, '');
            if (value.length > 3) value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
            e.target.value = value;
        });

        // Script para Celular
        const celularInput = document.getElementById('celular');
        celularInput.addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, '');
            if (value.length > 2) value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            if (value.length > 7) value = value.replace(/^(\(\d{2}\)) (\d{5})(\d)/, '$1 $2-$3');
            e.target.value = value;
        });

        // Script para Data de Nascimento
        const inputData = document.getElementById('nascimento');
        inputData.addEventListener('input', () => {
            let value = inputData.value.replace(/\D/g, '');
            if (value.length > 2 && value.length <= 4) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            } else if (value.length > 4) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
            }
            inputData.value = value;
        });
    });
</script>
@endsection
