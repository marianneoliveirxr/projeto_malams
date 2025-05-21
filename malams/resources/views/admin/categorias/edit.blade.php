@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Editar Categoria</h1>

    <form action="{{ route('admin.categorias.update', $categoria->idCategoria) }}" method="POST" class="bg-white rounded-2xl p-10
        transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf
        @method('PUT')

        <div class="space-y-8">
            <div>
                <label for="categoria" class="block text-lg font-semibold text-black mb-2">Descrição da Categoria</label>
                <input type="text" id="categoria" name="categoria"
                    class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#d9b0b0]
                    focus:outline-none transition"
                    style="border-color:#d9b0b0;"
                    onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                    onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                    value="{{ old('categoria', $categoria->categoria) }}"
                    required
                >
                @error('categoria')
                    <p class="text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-6 mt-12">
            <a href="{{ route('admin.categorias.index') }}"
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
@endsection
