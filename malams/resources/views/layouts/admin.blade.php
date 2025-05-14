<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <!-- Importação do Tailwind CSS via Vite -->
    @vite('resources/css/app.css')
</head>
<body class="bg-[#fffafa] font-sans">

    <!-- Barra lateral -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#c59595] text-white p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-semibold mb-8">Painel Administrativo</h2>
                <ul>
                    <!-- Links de navegação -->
                    <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-[#E8D6D3] hover:text-black rounded mb-2">Dashboard</a></li>
                    <li><a href="{{ route('admin.funcionarios.index') }}" class="block py-2 px-4 hover:bg-[#E8D6D3] hover:text-black rounded mb-2">Funcionários</a></li>
                    <li><a href="{{ route('admin.clientes.index') }}" class="block py-2 px-4 hover:bg-[#E8D6D3] hover:text-black rounded mb-2">Clientes</a></li>
                    <li><a href="{{ route('admin.servicos.index') }}" class="block py-2 px-4 hover:bg-[#E8D6D3] hover:text-black rounded mb-2">Serviços</a></li>
                </ul>
            </div>

            <!-- Botão de Logout (agora na barra lateral) -->
            <div class="mt-auto">
                <a href="{{ route('logout') }}" class="block text-center text-black font-semibold py-2 px-4 bg-[#E8D6D3] hover:bg-[#f4e2df] rounded-lg">
                    Sair
                </a>
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="flex-1 p-6">
            <!-- Título da página -->
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

            <!-- Aqui você pode colocar o conteúdo da página -->
            <p>Bem-vindo ao painel administrativo! Aqui você pode gerenciar os dados do sistema.</p>
        </div>
    </div>

</body>
</html>
