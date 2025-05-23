@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Editar Serviço</h1>

    <form action="{{ route('admin.servicos.update', $servico->idServico) }}" method="POST" class="bg-white rounded-2xl p-10
        transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf
        @method('PUT')

        <div class="space-y-8">
            <!-- Categoria -->
            <div>
                <label for="idCategoria" class="block text-lg font-semibold text-black mb-2">Categoria</label>
                <select id="idCategoria" name="idCategoria"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg"
                    style="border-color:#d9b0b0;"
                    required
                >
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->idCategoria }}"
                            {{ old('idCategoria', $servico->idCategoria) == $categoria->idCategoria ? 'selected' : '' }}>
                            {{ $categoria->categoria }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nome do Serviço -->
            <div>
                <label for="servico" class="block text-lg font-semibold text-black mb-2">Nome do Serviço</label>
                <input type="text" id="servico" name="servico"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Ex: Corte de Cabelo"
                    value="{{ old('servico', $servico->servico) }}"
                    required
                >
            </div>

            <!-- Preço -->
            <div>
                <label for="preco" class="block text-lg font-semibold text-black mb-2">Preço</label>
                <input type="text" id="preco" name="preco"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    placeholder="Ex: 50,00"
                    value="{{ old('preco', number_format($servico->preco, 2, ',', '.')) }}"
                    required
                >
            </div>

            <!-- Duração -->
            <div>
                <label for="duracao" class="block text-lg font-semibold text-black mb-2">Duração</label>
                <input type="time" id="duracao" name="duracao"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    value="{{ old('duracao', $servico->duracao) }}"
                    required
                >
                <p class="text-sm text-gray-500 mt-2">Informe o tempo aproximado do serviço (formato HH:MM).</p>
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-end space-x-6 mt-12">
            <a href="{{ route('admin.servicos.index') }}"
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
        const precoInput = document.getElementById('preco');

        precoInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Garante que tem pelo menos 3 dígitos para formatar
            while (value.length < 3) {
                value = '0' + value;
            }

            // Formata para moeda brasileira (ex: 50,00)
            let integerPart = value.slice(0, -2);
            let decimalPart = value.slice(-2);
            let formatted = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ',' + decimalPart;

            e.target.value = formatted;
        });
    });
</script>
@endsection
