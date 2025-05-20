<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Painel Administrativo</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet"
    />
    <link rel="icon" href="/img/icon.ico" />
</head>
<body class="bg-[#f3f4f6] font-roboto text-gray-800">
    <div class="flex h-screen flex-col">
        <!-- Cabeçalho -->
        <header class="bg-[#d9b0b0] text-white p-6 flex justify-between items-center shadow-md">
            <div class="flex items-center">
                <img src="/img/malamslogo.png" alt="Logo Malams Saloon" class="h-20 w-auto" />
            </div>
            <div class="flex items-center space-x-4">
                <img
                    src="/img/admin.png"
                    alt="Foto do perfil"
                    class="w-10 h-10 rounded-full border-2 border-white"
                />
              <span class="font-semibold text-2xl">Administrador</span>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside
                class="w-72 bg-[#f9fafb] py-12 px-6 flex flex-col justify-between shadow-inner"
            >
                <div>
                    <h2 class="text-2xl font-semibold mb-8 text-black">Painel</h2>
                    <ul class="space-y-3">
                        <li>
                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-chart-line"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('admin.funcionarios.index') }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-user-tie"></i> Funcionários
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('admin.clientes.index') }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-users"></i> Clientes
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('admin.categorias.index') }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-layer-group"></i> Categorias
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('admin.servicos.index') }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-scissors"></i> Serviços
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-8">
                    <a
                        href="{{ route('logout') }}"
                        class="flex items-center justify-center gap-2 py-2 px-4 bg-white border-3 border-red-400 text-black hover:bg-red-500 hover:text-white font-semibold rounded-lg transition"
                    >
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </div>
            </aside>

            <!-- Conteúdo Principal -->
            <main class="flex-1 p-6 overflow-y-auto bg-[#f3f4f6]">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
