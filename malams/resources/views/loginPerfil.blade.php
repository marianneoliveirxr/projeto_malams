<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Salão de Beleza</title>
    <link rel="stylesheet" href="/css/loginPerfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icon.ico">
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

    <header>
        <div class="header-esquerda">
        <img class="logo" src="/img/malamslogo.png" alt="logo">
</div>
        <nav class="header-center">
            <ul>
                <li><a class="home" href="#">Home</a></li>
                <li><a class="servicos" href="#">Serviços</a></li>
                <li><a class="contato" href="#">Contato</a></li>
                <li><a class="sobre" href="#">Sobre</a></li>
            </ul>
        </nav>
        <div class="header-right menu-direita">
        <div class="social-icons">
            <img src=/img/facebook.png alt="Facebook">
            <img src=/img/instagram.png alt="Instagram">
            <a class="cadastre-se" href="/teste">Cadastre-se</a>
            <a class="login" href="{{ url('/login') }}">Login</a>
        </div>
        <div class="perfil-menu">
    <img src="/img/perfil.jpg" alt="Perfil" class="perfil-foto" onclick="toggleMenu()">
    <div class="menu-dropdown" id="menuDropdown">
        <a href="#" class="link-animado">Meu perfil</a>
        <a href="#" class="link-animado">Meus agendamentos</a>
        <a href="#" class="link-animado">Sair</a>
    </div>
</div>
</div>
    <script>
function toggleMenu() {
    const menu = document.getElementById("menuDropdown");
    menu.classList.toggle("show");
}

// Fecha o menu ao clicar fora
document.addEventListener('click', function(event) {
    const menu = document.getElementById("menuDropdown");
    const foto = document.querySelector('.perfil-foto');
    if (!menu.contains(event.target) && !foto.contains(event.target)) {
        menu.classList.remove('show');
    }
});
</script>

    </div>
    </header>

    <main>
        <div class="container">
            <!-- Formulário de Login -->
            <div class="form-container">
                <h4>Entre</h4>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Senha">
                <button>Acessar</button>
            </div>

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
            <div class="profissionais">
                <img src="/img/profissionais.jpg" alt="Profissionais">   
                <a href="#">Nossos Profissionais</a>
            </div>
            <div class="local">
                <img src="/img/localizacao.png" alt="Localização">    
                <a href="#">Localização</a>
            </div>
        </div>
    </footer>

</body>

</html>
