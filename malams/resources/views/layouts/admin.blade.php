<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link rel="icon" href="/img/icon.ico">

</head>
<body class="bg-[#fffafa] font-sans">

    <div class="flex h-screen flex-col">
        <!-- Cabeçalho -->
        <header class="bg-[#d9b0b0] text-white p-4 flex justify-between items-center shadow-md">
            <!-- Logo ou nome do painel (opcional) -->
            <div class="flex items-center">
                    <img src="/img/malamslogo.png" alt="Logo Malams Saloon" class="h-20 w-auto">
            </div>

            <!-- Barra de navegação e perfil -->
            <div class="flex items-center space-x-6">

                <!-- Imagem de Perfil -->
                <div class="flex items-center space-x-2">
                    <!-- Foto do perfil redonda -->
                    <img src="/img/admin.png" alt="Foto do perfil" class="w-10 h-10 rounded-full border-2 border-white">
                    <span>Administrador</span>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <div class="w-64 bg-[#edd3d3] text-white p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-semibold mb-8 text-black">Painel Administrativo</h2>
                    <ul>
                        <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-[#d9b0b0] text-black hover:text-white rounded mb-2">Dashboard</a></li>
                        <li><a href="{{ route('admin.funcionarios.index') }}" class="block py-2 px-4 hover:bg-[#d9b0b0] text-black hover:text-white rounded mb-2">Funcionários</a></li>
                        <li><a href="{{ route('admin.clientes.index') }}" class="block py-2 px-4 hover:bg-[#d9b0b0] text-black hover:text-white rounded mb-2">Clientes</a></li>
                        <li><a href="{{ route('admin.servicos.index') }}" class="block py-2 px-4 hover:bg-[#d9b0b0] text-black hover:text-white rounded mb-2">Serviços</a></li>
                    </ul>
                </div>

                <div class="mt-auto">
                    <a href="{{ route('logout') }}" class="block text-center text-black font-semibold py-2 px-4 bg-[#d9b0b0] hover:text-white rounded-lg">Sair</a>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="flex-1 p-6">
                <!-- Aqui é onde o conteúdo da página vai ser injetado -->
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
