@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
   
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Editar Usuário</h1>

    <form action="{{ route('admin.clientes.update', $cliente->id) }}" method="POST" class="bg-white rounded-2xl p-10
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
                <label for="nomeUser" class="block text-lg font-semibold text-black mb-2">Nome</label>
                <input type="text" id="nomeUser" name="nomeUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('nomeUser', $cliente->nomeUser) }}" required
                >
                @error('nomeUser')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

             <!-- CPF -->
             <div>
                <label for="cpfUser" class="block text-lg font-semibold text-black mb-2">CPF</label>
                <input type="text" id="cpfUser" name="cpfUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0] bg-gray-200 cursor-not-allowed"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('cpfUser', $cliente->cpfUser) }}" 
                    readonly

                >
                @error('cpfUser')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Data de Nascimento -->
            <div>
                <label for="dataNascimento" class="block text-lg font-semibold text-black mb-2">Data de Nascimento</label>
                <input type="date" id="dataNascimento" name="dataNascimento"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('dataNascimento', \Carbon\Carbon::parse($cliente->dataNascimento)->format('Y-m-d')) }}" requied
                    >
                @error('dataNascimento')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Celular -->
            <div>
                <label for="celularUser" class="block text-lg font-semibold text-black mb-2">Celular</label>
                <input type="text" id="celularUser" name="celularUser"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('celularUser', $cliente->celularUser) }}" required
                >
                @error('celularUser')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
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
                    value="{{ old('email', $cliente->email) }}" required
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Máscara CPF
        const cpfInput = document.getElementById('cpfUser');
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
        const celularInput = document.getElementById('celularUser');
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
