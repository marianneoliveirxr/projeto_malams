@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Adicionar Novo Cliente</h1>

    <!-- Formulário para Adicionar Cliente -->
    <form action="{{ route('admin.clientes.store') }}" method="POST">
        @csrf
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Nome do Cliente -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-600">Nome</label>
                <input type="text" id="nome" name="nome" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-600">CPF</label>
                <input type="text" id="cpf" name="cpf" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Data de Nascimento -->
            <div class="mb-4">
                <label for="data_nascimento" class="block text-sm font-medium text-gray-600">Data de Nascimento</label>
                <input type="text" id="nascimento" name="nascimento" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Celular -->
            <div class="mb-4">
                <label for="celular" class="block text-sm font-medium text-gray-600">Celular</label>
                <input type="text" id="celular" name="celular" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="senha" class="block text-sm font-medium text-gray-600">Senha</label>
                <input type="password" id="senha" name="senha" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Confirmação de Senha -->
            <div class="mb-4">
                <label for="senha_confirmation" class="block text-sm font-medium text-gray-600">Confirmar Senha</label>
                <input type="password" id="senha_confirmation" name="senha_confirmation" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.clientes.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Salvar</button>
            </div>
        </div>
    </form>
</div>

<!-- Script para Data de Nascimento -->
    <script>
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
    </script>

    <!-- Script para CPF -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cpfInput = document.getElementById('cpf');

        cpfInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Aplica a máscara
            if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            }
            if (value.length > 6) {
                value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            }
            if (value.length > 9) {
                value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
            }

            // Limita a 14 caracteres (com pontos e traço)
            value = value.substring(0, 14);

            e.target.value = value;
        });
    });
    </script>

    <!-- Script para número de celular -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const celularInput = document.getElementById('celular');

        celularInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Aplica a máscara
            if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            }
            if (value.length > 7) {
                value = value.replace(/^(\(\d{2}\)) (\d{5})(\d)/, '$1 $2-$3');
            }

            // Limita a 15 caracteres com formatação
            value = value.substring(0, 15);

            e.target.value = value;
        });
    });
    </script>
@endsection


