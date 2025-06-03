<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Área do Funcionário')</title>
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
        <header class="bg-[#d9b0b0] text-white p-4 flex justify-between items-center shadow-md">
            <div class="flex items-center">
                <img src="/img/malamslogo.png" alt="Logo Malams Saloon" class="h-20 w-auto" />
            </div>
            <div class="flex items-center space-x-4">
                <img
                    src="/img/admin.png"
                    alt="Foto do funcionário"
                    class="w-10 h-10 rounded-full border-2 border-white"
                />
              <span class="font-semibold text-2xl">Funcionário</span>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside
                class="w-72 bg-[#f9fafb] py-5 px-6 flex flex-col justify-between shadow-inner"
            >
                <div>
                    <h2 class="text-2xl font-semibold mb-8 text-black">Área do Funcionário</h2>
                    <ul class="space-y-3">
                        <li>
                            <a
                                href="{{ route('funcionario.perfil', ['id' => $funcionario->idFuncionario]) }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-user"></i> Perfil
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('funcionario.agenda', ['idFuncionario' => $funcionario->idFuncionario]) }}"
                                class="flex items-center gap-2 py-2 px-4 bg-white border-3 border-[#d9b0b0] rounded-lg text-black hover:bg-[#d9b0b0] hover:text-white transition"
                            >
                                <i class="fas fa-calendar-alt"></i> Agenda
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
