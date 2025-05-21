@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Editar Funcionário</h1>

    <form action="{{ route('admin.funcionarios.update', $funcionario->idFuncionario) }}" method="POST" class="bg-white rounded-2xl p-10
        transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf
        @method('PUT')

        <div class="space-y-8">
            <!-- Nome -->
            <div>
                <label for="nomeFuncionario" class="block text-lg font-semibold text-black mb-2">Nome</label>
                <input type="text" id="nomeFuncionario" name="nomeFuncionario" 
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('nomeFuncionario', $funcionario->nomeFuncionario) }}" required
                >
                @error('nomeFuncionario')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="emailFuncionario" class="block text-lg font-semibold text-black mb-2">Email</label>
                <input type="email" id="emailFuncionario" name="emailFuncionario" 
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('emailFuncionario', $funcionario->emailFuncionario) }}" required
                >
                @error('emailFuncionario')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Celular -->
            <div>
                <label for="celularFuncionario" class="block text-lg font-semibold text-black mb-2">Celular</label>
                <input type="text" id="celularFuncionario" name="celularFuncionario"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('celularFuncionario', $funcionario->celularFuncionario) }}"
                >
                @error('celularFuncionario')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- CPF -->
            <div>
                <label for="cpfFuncionario" class="block text-lg font-semibold text-black mb-2">CPF</label>
                <input type="text" id="cpfFuncionario" name="cpfFuncionario"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('cpfFuncionario', $funcionario->cpfFuncionario) }}" required
                >
                @error('cpfFuncionario')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Categoria -->
            <div>
                <label for="idCategoria" class="block text-lg font-semibold text-black mb-2">Categoria</label>
                <select id="idCategoria" name="idCategoria"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    required
                >
                    <option value="" disabled {{ !$funcionario->idCategoria ? 'selected' : '' }}>Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->idCategoria }}" {{ $funcionario->idCategoria == $categoria->idCategoria ? 'selected' : '' }}>
                            {{ $categoria->categoria }}
                        </option>
                    @endforeach
                </select>
                @error('idCategoria')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Serviço -->
            <div>
                <label for="idServico" class="block text-lg font-semibold text-black mb-2">Serviço</label>
                <select id="idServico" name="idServico"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    required
                >
                    <option value="" disabled {{ !$funcionario->idServico ? 'selected' : '' }}>Selecione um serviço</option>
                    @foreach($servicos as $servico)
                        <option value="{{ $servico->idServico }}" {{ $funcionario->idServico == $servico->idServico ? 'selected' : '' }}>
                            {{ $servico->servico }}
                        </option>
                    @endforeach
                </select>
                @error('idServico')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Senha -->
            <div>
                <label for="senhaFuncionario" class="block text-lg font-semibold text-black mb-2">Senha</label>
                <input type="password" id="senhaFuncionario" name="senhaFuncionario"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Deixe em branco para manter a senha atual"
                >
                @error('senhaFuncionario')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
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
                    placeholder="Confirme a nova senha"
                >
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Máscara CPF
        const cpfInput = document.getElementById('cpfFuncionario');
        cpfInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.substring(0, 11);

            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{3})(\d{3})(\d{1,3})$/, '$1.$2.$3');
            } else if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d{1,3})$/, '$1.$2');
            }

            e.target.value = value;
        });

        // Máscara Celular
        const celularInput = document.getElementById('celularFuncionario');
        celularInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);

            if (value.length > 2) value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            if (value.length > 7) value = value.replace(/^(\(\d{2}\)) (\d{5})(\d)/, '$1 $2-$3');

            e.target.value = value;
        });
    });
</script>
@endsection
