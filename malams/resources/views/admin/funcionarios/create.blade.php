@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Adicionar Funcionário</h1>

    <form action="{{ route('admin.funcionarios.store') }}" method="POST" class="bg-white rounded-2xl p-10
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
                <input type="text" id="nome" name="nomeUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Digite o nome"
                    required
                >
            </div>

            <!-- E-mail -->
            <div>
                <label for="email" class="block text-lg font-semibold text-black mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="exemplo@gmail.com"
                    required
                >
            </div>

            <!-- Celular -->
            <div>
                <label for="celular" class="block text-lg font-semibold text-black mb-2">Celular</label>
                <input type="text" id="celular" name="celularUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="(00) 00000-0000"
                >
            </div>

            <!-- CPF -->
            <div>
                <label for="cpf" class="block text-lg font-semibold text-black mb-2">CPF</label>
                <input type="text" id="cpf" name="cpfUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="000.000.000-00"
                    required
                >
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-lg font-semibold text-black mb-2">Senha</label>
                <input type="password" id="password" name="password"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Digite a senha"
                    required
                >
            </div>

            <!-- Select Categoria -->
            <div>
                <label for="idCategoria" class="block text-lg font-semibold text-black mb-2">Categoria</label>
                <select id="idCategoria" name="idCategoria" 
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    required
                >
                    <option value="" disabled selected>Selecione a categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Select Serviço -->
            <div>
                <label for="idServico" class="block text-lg font-semibold text-black mb-2">Serviço</label>
                <select id="idServico" name="idServico"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    required
                >
                    <option value="" disabled selected>Selecione o serviço</option>
                    @foreach($servicos as $servico)
                        <option value="{{ $servico->idServico }}">{{ $servico->servico }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-end space-x-6 mt-12">
            <a href="{{ route('admin.funcionarios.index') }}"
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
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
            value = value.substring(0, 11); // Limita a 11 dígitos

            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{3})(\d{3})(\d{1,3})$/, '$1.$2.$3');
            } else if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d{1,3})$/, '$1.$2');
            }

            e.target.value = value;
        });

        // Máscara Celular (opcional)
        const celularInput = document.getElementById('celular');
        celularInput.addEventListener('input', function (e) {
            let v = e.target.value.replace(/\D/g, '');
            v = v.substring(0, 11);
            if (v.length > 6) {
                v = v.replace(/^(\d{2})(\d{5})(\d{0,4})$/, '($1) $2-$3');
            } else if (v.length > 2) {
                v = v.replace(/^(\d{2})(\d{1,5})$/, '($1) $2');
            } else if (v.length > 0) {
                v = v.replace(/^(\d{1,2})$/, '($1');
            }
            e.target.value = v;
        });
    });
</script>

@endsection
