<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/login.css">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

    <header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
                <li><a class="nav-links" href="{{ url('/agendamentos/create') }}">Agendamento</a></li>
                <li><a class="nav-links" href="{{ url('/home') }}#sobre">Sobre</a></li>
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
    </header>

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
                    <a type="text" class="frase" href="{{ url('/cadastro') }}">Ainda não tenho cadastro</a>
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
<footer style="background:#c59595; color:white; padding:20px; display:flex; justify-content:center; gap:80px; font-family: 'Rubik', sans-serif;">
    <div style="display:flex; align-items:center; gap:15px; text-align:center;">
        <img src="/img/contato.jpg" alt="Contato" style="width:60px; height:60px; border-radius:8px; object-fit:cover;">
        <div style="display:flex; flex-direction:column; align-items:center;">
            <h3 style="margin:0 0 6px 0; font-weight:700; font-size:1.3rem;">Contato</h3>
            <p style="margin:0; font-size:1.1rem;">@eteccamargoaranha</p>
            <p style="margin:2px 0 0 0; font-size:1.1rem;">@n3rds.ca</p>
        </div>
    </div>

    <div style="display:flex; align-items:center; gap:15px; text-align:center;">
        <img src="/img/localizacao.png" alt="Localização" style="width:60px; height:60px; border-radius:8px; object-fit:cover;">
        <div style="display:flex; flex-direction:column; align-items:center;">
            <h3 style="margin:0 0 6px 0; font-weight:700; font-size:1.3rem;">Localização</h3>
            <p style="margin:0; font-size:1.1rem;">R. Marcial, 25 - Mooca, São Paulo </p>
        </div>
    </div>
</footer>



</body>

</html>