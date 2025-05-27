<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet" />
</head>
<body class="bg-[#f3f4f6] min-h-screen flex flex-col font-roboto">
    <!-- Header rosinha com logo no canto esquerdo e título centralizado -->
    <header class="bg-[#d9b0b0] text-white p-4 flex items-center shadow-md relative">
        <img src="/img/malamslogo.png" alt="Logo Malams Saloon" class="h-16 w-auto" />
        <h1 class="absolute left-1/2 transform -translate-x-1/2 text-2xl font-semibold">
            Área Administrativa 
        </h1>
    </header>

    <!-- Conteúdo principal: form centralizado -->
    <main class="flex-grow flex items-center justify-center px-4">
        @yield('content')
    </main>
</body>
</html>
