@extends('layouts.admin') <!-- Incluir o layout da barra lateral -->

@section('content')
    <!-- Conteúdo principal da página de Funcionários -->
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Funcionários</h2>

        <!-- Botão para adicionar um novo funcionário -->
        <a href="{{ route('admin.funcionarios.create') }}" class="mb-4 inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
            Adicionar Funcionário
        </a>

        <!-- Tabela de Funcionários -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">Nome</th>
                    <th class="py-2 px-4 border-b text-left">Cargo</th>
                    <th class="py-2 px-4 border-b text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $funcionario->nome }}</td>
                        <td class="py-2 px-4 border-b">{{ $funcionario->cargo }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.funcionarios.edit', $funcionario->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                            |
                            <form action="{{ route('admin.funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
