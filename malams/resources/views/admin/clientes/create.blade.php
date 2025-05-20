@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Adicionar Novo Cliente</h1>

    <form action="{{ route('admin.clientes.store') }}" method="POST" class="bg-white rounded-2xl p-10
        transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf

        <div class="space-y-8">
            <!-- Nome -->
            <div>
                <label for="nome" class="block text-lg font-semibold text-black mb-2">Nome</label>
                <input type="text" id="nome" name="nome"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Digite o nome completo"
                    required
                >
            </div>

            <!-- CPF -->
            <div>
                <label for="cpf" class="block text-lg font-semibold text-black mb-2">CPF</label>
                <input type="text" id="cpf" name="cpf"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="000.000.000-00"
                    required
                >
            </div>

            <!-- Data de Nascimento -->
            <div>
                <label for="nascimento" class="block text-lg font-semibold text-black mb-2">Data de Nascimento</label>
                <input type="text" id="nascimento" name="nascimento"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="dd/mm/aaaa"
                    required
                >
            </div>

            <!-- Celular -->
            <div>
                <label for="celular" class="block text-lg font-semibold text-black mb-2">Celular</label>
                <input type="text" id="celular" name="celular"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="(00) 00000-0000"
                    required
                >
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-lg font-semibold text-black mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="exemplo@email.com"
                    required
                >
            </div>

            <!-- Senha -->
            <div>
                <label for="senha" class="block text-lg font-semibold text-black mb-2">Senha</label>
                <input type="password" id="senha" name="senha"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Crie uma senha"
                    required
                >
            </div>

            <!-- Confirmação de Senha -->
            <div>
                <label for="senha_confirmation" class="block text-lg font-semibold text-black mb-2">Confirmar Senha</label>
                <input type="password" id="senha_confirmation" name="senha_confirmation"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Repita a senha"
                    required
                >
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-end space-x-6 mt-12">
            <a href="{{ route('admin.clientes.index') }}"
               class="px-10 py-4 rounded-lg font-semibold bg-gray-700 text-white hover:bg-gray-800 transition"
            >
                Cancelar
            </a>
            <button type="submit"
                class="px-10 py-4 rounded-lg font-semibold bg-blue-600 text-white shadow-md hover:bg-blue-700 transition"
            >
                Salvar
            </button>
        </div>
    </form>
</div>

<!-- Máscaras -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Máscara CPF
        const cpfInput = document.getElementById('cpf');
        cpfInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 3) value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
            e.target.value = value.substring(0, 14);
        });

        // Máscara Celular
        const celularInput = document.getElementById('celular');
        celularInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            if (value.length > 7) value = value.replace(/^(\(\d{2}\)) (\d{5})(\d)/, '$1 $2-$3');
            e.target.value = value.substring(0, 15);
        });

        // Máscara Data de Nascimento
        const inputNascimento = document.getElementById('nascimento');
        inputNascimento.addEventListener('input', () => {
            let value = inputNascimento.value.replace(/\D/g, '');
            if (value.length > 2 && value.length <= 4) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            } else if (value.length > 4) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
            }
            inputNascimento.value = value;
        });
    });
</script>
@endsection
