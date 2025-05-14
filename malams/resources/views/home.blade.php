<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Malams Saloon</title>
  <link rel="stylesheet" href="/css/home.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="icon" href="/img/icon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
  </style>
</head>
<body class="bg-white text-gray-800">

<header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
                <li><a class="nav-links" href="{{ url('/agendamento') }}">Agendamento</a></li>
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

<main>

<!-- Seção Hero com imagem de fundo -->
<div>
  <div class="">
    <h3>Bem-vindo(a) ao Malams Saloon</h3>
    <p>Veja abaixo tudo o que preparamos para cuidar de você.</p>
    <button class="">Começar</button>
  </div>
</div>

<!--Seção Nosso Espaço-->
<div class="">
  <div class="">
    <h3 class="">Nosso Espaço</h3>
    <img class="aspect-<ratio>" src="/img/espaco.jpg">
    <p class="">Transforme sua beleza e sinta-se incrível em cada detalhe. 
      No Malams Saloon, oferecemos um ambiente acolhedor, profissionais qualificados
      e serviços exclusivos para realçar sua melhor versão. Agende seu horário de forma 
      simples e prática e venha viver uma experiência única de cuidado e bem-estar.</p>
    <p>Seu momento de beleza começa aqui. ✨</p>
  </div>
</div>

<!-- Seção Sobre Nós -->
<div class="">
  <div class="">
    <div class="">
      <h2 class="">Sobre Nós</h2>
      <p class="">
        No Malams Saloon, acreditamos que a beleza começa pelo cuidado. 
        Nossa equipe altamente qualificada está pronta para oferecer o melhor em cuidados com o cabelo, unhas e estética.
      </p>
      <p class="">
        Atuamos com as melhores marcas do mercado e priorizamos um atendimento personalizado, acolhedor e profissional.
      </p>
    </div>
    <div class="">
      <img src="/img/salao.jpg" alt="Sobre o salão">
    </div>
  </div>
</div>

<!-- Seção Nossos Serviços -->
<div id="cards-servicos" class="">
  <h2 class="">Conheça nosso trabalho</h2>
    <div class="luzes">
      <h3 class="">Luzes</h3>
      <div class="">
        <img class="" src="/img/luzes.jpg" alt="Luzes no Cabelo">
      </div>
    </div>

    <div class="henna">
      <h3 class="">Design com Henna</h3>
      <div class="">
        <img class="" src="/img/henna.jpg" alt="Design com Henna">
      </div>
    </div>

    <div class="lashLifting">
      <h3 class="">Lash Lifting</h3>
      <div class="">
        <img class="" src="/img/lashlifting.jpg" alt="Lash Lifting">
      </div>
    </div>

    <div class="manicure">
      <h3 class="">Manicure</h3>
      <div class="">
        <img class="" src="/img/maos.jpg" alt="Manicure">
      </div>
    </div>
</div>

<div class="">
  <button class="">Quero agendar meu horário</button>
</div>
</main>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
