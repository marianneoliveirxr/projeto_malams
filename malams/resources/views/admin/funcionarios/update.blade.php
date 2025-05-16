@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Funcionário</h1>

    <!-- Formulário para Editar Funcionário -->
    <form action="{{ route('admin.funcionarios.update', 1) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Nome do Funcionário -->
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-600">Nome</label>
                <input type="text" id="nome" name="nome" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="Carlos Pereira" required>
            </div>
            
             <!-- Email -->
              <div class="mb-4">
                 <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                 <input type="email" id="email" name="email" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="carlos.pereira@email.com" required>
              </div>
              
            <!-- Celular -->
            <div class="mb-4">
                <label for="celular" class="block text-sm font-medium text-gray-600">Celular</label>
                <input type="text" id="celular" name="celular" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="(21) 99876-5432" required>
            </div>

            <!-- CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium text-gray-600">CPF</label>
                <input type="text" id="cpf" name="cpf" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="987.654.321-00" required>
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="senha" class="block text-sm font-medium text-gray-600">Senha</label>
                <input type="password" id="senha" name="senha" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Confirmação de Senha -->
            <div class="mb-4">
                <label for="senha_confirmation" class="block text-sm font-medium text-gray-600">Confirmar Senha</label>
                <input type="password" id="senha_confirmation" name="senha_confirmation" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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

    });
</script>
@endsection
