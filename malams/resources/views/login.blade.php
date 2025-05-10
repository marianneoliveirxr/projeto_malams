<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Salão de Beleza</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

    <header>
    <img class="logo" src="/img/malamslogo.png" alt="logo">

    <!-- Navegação Principal -->
    <nav class="header-center">
        <ul>
            <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
            <li><a class="nav-links" href="#">Serviços</a></li>
            <li><a class="nav-links" href="#">Contato</a></li>
            <li><a class="nav-links" href="#">Sobre</a></li>
        </ul>
    </nav>

    <!-- Parte Direita (Dependendo da Autenticação) -->
    <div class="header-right menu-direita">
        @guest
            <!-- Se o usuário NÃO estiver autenticado -->
            <div class="social-icons">
                <a class="cadastre-se" href="{{ url('/cadastro') }}">Cadastre-se</a>
                <a class="login" href="{{ url('/login') }}">Login</a>
            </div>
        @endguest

        @auth
            <!-- Se o usuário ESTIVER autenticado -->
            <div class="perfil-menu">
                <img src="/img/perfil.jpg" alt="Perfil" class="perfil-foto" onclick="toggleMenu()">
                <div class="menu-dropdown" id="menuDropdown">
                    <a href="{{ url('/profile') }}" class="link-animado">Meu perfil</a>
                    <a href="{{ url('/appointments') }}" class="link-animado">Meus agendamentos</a>
                    <!-- Formulário de logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="link-animado">Sair</a>
                </div>
            </div>
        @endauth
    </div>
</header>

<script>
    // Função para mostrar/ocultar o menu dropdown
    function toggleMenu() {
        const menu = document.getElementById("menuDropdown");
        menu.classList.toggle("show");
    }

    // Fecha o menu dropdown ao clicar fora dele
    document.addEventListener('click', function(event) {
        const menu = document.getElementById("menuDropdown");
        const foto = document.querySelector('.perfil-foto');
        if (!menu.contains(event.target) && !foto.contains(event.target)) {
            menu.classList.remove('show');
        }
    });
</script>

    <main>
    <div class="container">
            <!-- Formulário de Login -->
            <div class="form-container">
                <h4>Entre</h4>
                <form action="{{ route('login-user') }}" method="POST">
                    @csrf
                    <input type="email" name="txtEmail" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Acessar</button>
                </form>
            </div>

            <!-- Mensagem de erro -->
           @if ($errors->has('login'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Email ou Senha inválidos',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        }
                    });
                </script>
            @endif

            <!-- Imagem -->
            <div class="image-container">
                <img src="/img/login.jpg" alt="Mulher sorrindo">
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer>
        <p>Faça parte da nossa família</p>
        <div class="footer-links">
            <div class="footer-items">
                <img src="/img/contato.jpg" alt="Contato">   
                <a href="#">Contato</a>
            </div>
            <div class="footer-items">
                <img src="/img/localizacao.png" alt="Localização">    
                <a href="#">Localização</a>
            </div>
        </div>
    </footer>

</body>

</html>
