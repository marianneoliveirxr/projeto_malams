@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Adicionar Novo Serviço</h1>

    <form action="{{ route('admin.servicos.store') }}" method="POST" class="bg-white rounded-2xl p-10
        transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf

        <div class="space-y-8">
            <!-- Categoria -->
            <div>
                <label for="idCategoria" class="block text-lg font-semibold text-black mb-2">Categoria</label>
                <select id="idCategoria" name="idCategoria"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    required
                >
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
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
                    placeholder="Ex: Corte de Cabelo"
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
                    placeholder="Ex: 50,00"
                    required
                >
            </div>

            <!-- Duração -->
            <div>
                <label for="duracao" class="block text-lg font-semibold text-black mb-2">Duração</label>
                <input type="time" id="duracao" name="duracao"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                    style="border-color:#d9b0b0;"
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
document.addEventListener('DOMContentLoaded', () => {
    const precoInput = document.getElementById('preco');

    precoInput.addEventListener('input', e => {
        let val = e.target.value;

        val = val.replace(/[^0-9,]/g, '');

        const parts = val.split(',');
        if (parts.length > 2) {
            val = parts[0] + ',' + parts[1];
        }

        if (parts[1]?.length > 2) {
            parts[1] = parts[1].substring(0, 2);
            val = parts.join(',');
        }

        if (parts[0].length > 3) {
            parts[0] = parts[0].substring(0, 3);
            val = parts.join(',');
        }

        e.target.value = val;
    });
});
</script>
@endsection
