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
  <script src="https://cdn.tailwindcss.com"></script>
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
<section class="hero">
  <div class="hero-content">
    <h1>Bem-vindo(a) ao Malams Saloon</h1>
    <p>Veja abaixo tudo o que preparamos para cuidar de você.</p>
    <button class="btn-comecar">Começar</button>
  </div>
</section>

<!-- Seção Sobre Nós -->
<section class="sobre-nos">
  <div id="sobre-nos" class="sobre-conteudo">
    <div class="texto">
      <h2>Sobre Nós</h2>
      <p>
        No Malams Saloon, acreditamos que a beleza começa pelo cuidado. 
        Nossa equipe altamente qualificada está pronta para oferecer o melhor em cuidados com o cabelo, unhas e estética.
      </p>
      <p>
        Atuamos com as melhores marcas do mercado e priorizamos um atendimento personalizado, acolhedor e profissional.
      </p>
    </div>
    <div class="imagem">
      <img src="/img/salao.jpg" alt="Sobre o salão">
    </div>
  </div>
</section>
<script>
  // Seleciona o botão "Começar"
  const btnComecar = document.querySelector('.btn-comecar');

  // Adiciona um evento de clique ao botão
  btnComecar.addEventListener('click', function () {
    // Seleciona a seção "Sobre Nós" pelo id
    const sobreNos = document.getElementById('sobre-nos');
    
    // Rola suavemente até a seção
    sobreNos.scrollIntoView({
      behavior: 'smooth', // Rolagem suave
      block: 'start' // A rolagem começa no topo da seção
    });
  });
</script>


<!-- Seção Nossos Serviços -->
<section class="servicos">
  <h2>Nossos Serviços</h2>
  <div class="cards-servicos">
    <div class="card">
      <h3>Cabelos</h3>
      <ul>
        <li>Corte Feminino/Masculino</li>
        <li>Coloração</li>
        <li>Hidratação</li>
      </ul>
    </div>
    <div class="card">
      <h3>Unhas</h3>
      <ul>
        <li>Manicure</li>
        <li>Pedicure</li>
        <li>Manicure + Pedicure</li>
      </ul>
    </div>
    <div class="card">
      <h3>Estética</h3>
      <ul>
        <li>Limpeza de Pele</li>
        <li>Sobrancelha (Henna, Linha, Pinça)</li>
        <li>Extensão de Cílios</li>
      </ul>
    </div>
  </div>
</section>

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

</body>
</html>
