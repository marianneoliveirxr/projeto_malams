@extends('layouts.clean')

@section('title', 'Login Admin - Malams Saloom')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <h1 class="text-3xl font-bold mb-6 text-center text-[#d9b0b0]">Login Admin / Funcionário</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.login.verify') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="user_type" class="block text-[#000] font-semibold mb-2">Tipo de usuário</label>
            <select
                id="user_type"
                name="user_type"
                required
                class="w-full px-4 py-2 border border-[#d9b0b0] rounded focus:outline-none focus:ring-2 focus:ring-[#d9b0b0] text-[#000]"
            >
                <option value="" disabled selected>Selecione o tipo de usuário</option>
                <option value="admin">Administrador</option>
                <option value="funcionario">Funcionário</option>
            </select>
        </div>

        <div>
            <label for="email" class="block text-[#000] font-semibold mb-2">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                placeholder="Digite seu email"
                required
                class="w-full px-4 py-2 border border-[#d9b0b0] rounded focus:outline-none focus:ring-2 focus:ring-[#d9b0b0] text-gray-800"
            />
        </div>

        <div>
            <label for="password" class="block text-[#000] font-semibold mb-2">Senha</label>
            <input
                id="password"
                name="password"
                type="password"
                placeholder="Digite sua senha"
                required
                class="w-full px-4 py-2 border border-[#d9b0b0] rounded focus:outline-none focus:ring-2 focus:ring-[#d9b0b0] text-gray-800"
            />
        </div>

        <button
            type="submit"
            class="w-full bg-[#d9b0b0] hover:bg-[#c49797] text-white font-bold py-2 rounded transition duration-200"
        >
            Entrar
        </button>
    </form>
</div>
@endsection
