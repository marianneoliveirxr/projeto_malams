<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Malams</title>
    @yield('head') <!-- Carrega CSS específico da página -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- CSS global -->
</head>
<body>

    <!-- Barra Lateral -->
    <div class="sidebar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('servicos') }}">Serviços</a></li>
            <li><a href="{{ route('funcionarios') }}">Funcionários</a></li>
            <li><a href="{{ route('clientes') }}">Clientes</a></li>
        </ul>
    </div>

    <main>
        <header>
            <nav>
                <ul>
                    <li><a href="/">Início</a></li>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/logout">Sair</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            @yield('content') <!-- Conteúdo da página específica -->
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Malams. Todos os direitos reservados.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
