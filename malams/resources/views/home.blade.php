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
                <a href="{{ url('/cadastro') }}">Cadastre-se</a>
                <a href="{{ url('/login') }}">Login</a>
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

<main class="px-8 py-12">

  <!-- Hero Section -->
  <section class="bg-cover bg-center h-[60vh] relative" style="background-image: url('/img/hero-bg.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 text-center text-white space-y-4">
      <h3 class="text-4xl font-bold">Bem-vindo(a) ao Malams Saloon</h3>
      <p class="text-lg">Veja abaixo tudo o que preparamos para cuidar de você.</p>
      <button class="bg-[#E8D6D3] text-[#c59595] py-3 px-6 rounded-full text-lg font-semibold hover:bg-[#c59595] hover:text-white transition duration-300">Começar</button>
    </div>
  </section>

  <!-- Nosso Espaço -->
  <section class="mt-12 text-center">
    <h2 class="text-3xl font-bold text-[#c59595] mb-6">Nosso Espaço</h2>
    <img src="/img/espaco.jpg" alt="Espaço" class="w-full h-96 object-cover rounded-lg shadow-lg mb-6">
    <p class="text-lg max-w-3xl mx-auto">Transforme sua beleza e sinta-se incrível em cada detalhe. No Malams Saloon, oferecemos um ambiente acolhedor, profissionais qualificados e serviços exclusivos para realçar sua melhor versão. Agende seu horário de forma simples e prática e venha viver uma experiência única de cuidado e bem-estar.</p>
  </section>

  <!-- Sobre Nós -->
  <section class="mt-16 flex flex-col md:flex-row gap-8 text-center md:text-left">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#c59595] mb-4">Sobre Nós</h2>
      <p class="text-lg">No Malams Saloon, acreditamos que a beleza começa pelo cuidado. Nossa equipe altamente qualificada está pronta para oferecer o melhor em cuidados com o cabelo, unhas e estética.</p>
      <p class="text-lg mt-4">Atuamos com as melhores marcas do mercado e priorizamos um atendimento personalizado, acolhedor e profissional.</p>
    </div>
    <div class="flex-1">
      <img src="/img/salao.jpg" alt="Sobre o salão" class="w-full rounded-lg shadow-lg">
    </div>
  </section>

  <!-- Nossos Serviços -->
  <section id="cards-servicos" class="mt-16">
    <h2 class="text-3xl font-bold text-[#c59595] text-center mb-8">Conheça nossos serviços</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="text-center">
        <h3 class="text-xl font-semibold text-[#c59595] mb-4">Luzes</h3>
        <img src="/img/luzes.jpg" alt="Luzes no Cabelo" class="w-full h-64 object-cover rounded-lg shadow-lg">
      </div>
      <div class="text-center">
        <h3 class="text-xl font-semibold text-[#c59595] mb-4">Design com Henna</h3>
        <img src="/img/henna.jpg" alt="Design com Henna" class="w-full h-64 object-cover rounded-lg shadow-lg">
      </div>
      <div class="text-center">
        <h3 class="text-xl font-semibold text-[#c59595] mb-4">Lash Lifting</h3>
        <img src="/img/lashlifting.jpg" alt="Lash Lifting" class="w-full h-64 object-cover rounded-lg shadow-lg">
      </div>
    </div>
  </section>

  <!-- Botão Agendar -->
  <div class="text-center mt-12">
    <button class="bg-[#c59595] text-white py-3 px-8 rounded-full text-lg font-semibold hover:bg-[#a37373] transition duration-300">Quero agendar meu horário</button>
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
</body>
</html>
