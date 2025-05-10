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
                <li><a class="nav-links" href="#">Serviços</a></li>
                <li><a class="nav-links" href="#">Contato</a></li>
                <li><a class="nav-links" href="#">Sobre</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a class="cadastre-se" href="/teste">Cadastre-se</a>
            <a class="login" href="{{ url('/login') }}">Login</a>
        </div>
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
