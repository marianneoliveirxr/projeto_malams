<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de perfil</title>
    <link rel="stylesheet" href="/css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

<header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="home" href="#">Home</a></li>
                <li><a class="servicos" href="#">Serviços</a></li>
                <li><a class="contato" href="#">Contato</a></li>
                <li><a class="sobre" href="#">Sobre</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <img src=/img/facebook.png alt="Facebook">
            <img src=/img/instagram.png alt="Instagram">
            <a class="cadastre-se" href="/teste">Cadastre-se</a>
            <a class="login" href="{{ url('/login') }}">Login</a>
        </div>
    </header>

    <div class="caixa-central">
        <!-- Lado esquerdo: foto e descrição -->
        <div class="lado-esquerdo">
            <img src="/img/login.jpg" alt="Foto do Cliente">
            <p>Cliente desde 2022<br>Gosta de tecnologia e inovação.</p>
        </div>

        <!-- Lado direito: informações -->
        <div class="lado-direito">
            <h1>Informações do Cliente</h1>
            <p><strong>Nome:</strong> Bruna Silva</p>
            <p><strong>Email:</strong> bruna@email.com</p>
            <p><strong>CPF:</strong> 123.456.789-00</p>
            <p><strong>Celular:</strong> (11) 99999-9999</p>
        </div>
    </div>

    <footer>

    </footer>

</body>

</html>
