<!DOCTYPE html>
<html lang="pt-br">
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

    html {
    scroll-behavior: smooth;
  }

  body {
    background-color: #f7f1f1 !important;
    color: #5c4a4a !important;
  }

  main {
    background-color: #f9f2f2 !important;
    color: #5c4a4a !important;
  }

  section, .bg-white {
    background-color: #fdf6f6 !important;
    color: #5c4a4a !important;
  }

  h1, h2, h3, .text-rose-600, .text-rose-500 {
    color: #c59595 !important;
  }

  a, button {
    background-color: #c59595 !important;
    color: white !important;
  }

  a:hover, button:hover {
    background-color: #a86f6f !important;
  }

  .text-gray-700, .text-gray-600 {
    color: #7f6565 !important;
  }

  </style>
  <script>
    // Função para rolar suavemente até a seção "Nosso Espaço"
    function scrollToOurSpace() {
      const element = document.getElementById('nosso-espaco');
      element.scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-900">

<header>
  <img class="logo" src="/img/malamslogo.png" alt="logo">
  <nav>
    <ul>
      <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
      <li><a class="nav-links" href="{{ url('/agendamento') }}">Agendamento</a></li>
      <li><a class="nav-links" href="{{ url('/home') }}#sobre">Sobre</a></li>
    </ul>
  </nav>
  
  <div class="header-right menu-direita">
    @guest
      <div class="social-icons">
        <a href="{{ url('/cadastro') }}">Cadastre-se</a>
        <a href="{{ url('/login') }}">Login</a>
      </div>
    @endguest
    @auth
      <div class="perfil-menu">
        <img src="/img/perfil.jpg" alt="Perfil" class="perfil-foto" onclick="toggleMenu()">
        <div class="menu-dropdown" id="menuDropdown">
          <a href="{{ url('/profile') }}" class="link-animado">Meu perfil</a>
          <a href="{{ url('/appointments') }}" class="link-animado">Meus agendamentos</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="link-animado">Sair</a>
        </div>
      </div>
    @endauth
  </div>
</header>

<main class="px-4 md:px-16 py-12 bg-white text-gray-800 font-[Cal+Sans]">

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-br from-pink-100 via-rose-100 to-rose-50 rounded-3xl p-10 mb-20 shadow-xl overflow-hidden">
    <div class="max-w-4xl mx-auto text-center space-y-6">
      <h1 class="text-4xl md:text-5xl font-bold text-rose-400">Bem-vindo(a) ao Malams Saloon</h1>
      <p class="text-lg md:text-xl text-gray-700">Transforme sua beleza em experiência. Agende com facilidade e sinta-se renovada.</p>
      <button onclick="scrollToOurSpace()" class="bg-rose-500 text-white px-6 py-3 rounded-full hover:bg-rose-600 transition">Começar</button>
    </div>

  </section>

  <!-- Nosso Espaço -->
  <section id="nosso-espaco" class="mb-24 bg-rose-50 py-16 rounded-3xl shadow-inner">
  <div class="max-w-7xl mx-auto px-6 text-center space-y-10">
    <h2 class="text-3xl md:text-4xl font-semibold text-rose-600">Nosso Espaço</h2>
    <p class="text-gray-600 text-lg max-w-3xl mx-auto">Um refúgio de beleza, conforto e sofisticação. Cada canto do Malams Saloon foi pensado para que você se sinta única.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">
      <img src="/img/salao.jpg" alt="Salão 1" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
      <img src="/img/home3.jpg" alt="Salão 2" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
      <img src="/img/home4.jpg" alt="Salão 3" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
    </div>

    <a href="{{ url('/agendamento') }}" class="inline-block bg-rose-500 text-white px-6 py-3 rounded-full hover:bg-rose-600 transition">
      Agende seu horário agora
    </a>
  </div>
</section>

  <!-- Sobre o Salão -->
  <section id="sobre" class="mb-24 bg-white py-16">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-8">
      
      <!-- Imagem esquerda -->
      <div class="hidden md:block">
        <img src="/img/salao.jpg" alt="Equipe" class="rounded-2xl shadow-lg" />
      </div>

      <!-- Texto central -->
      <div class="text-center space-y-6 px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-rose-600">Sobre o Malams Saloon</h2>
        <p class="text-gray-700 text-lg">
          Aqui, beleza é mais do que aparência — é uma experiência. Com atendimento personalizado, técnicas inovadoras e um ambiente acolhedor, o Malams Saloon eleva sua autoestima enquanto cuida de você com carinho.
        </p>
        <p class="text-gray-700 text-lg">
          Nossa missão é oferecer muito mais do que serviços de beleza: oferecemos momentos que encantam e transformam.
        </p>
      </div>

      <!-- Imagem direita -->
      <div class="hidden md:block">
        <img src="/img/home3.jpg" alt="Ambiente" class="rounded-2xl shadow-lg" />
      </div>
    </div>
  </div>
</section>

  <!-- Nossos Serviços -->
  <section class="mb-20">
    <div class="max-w-7xl mx-auto text-center space-y-10">
      <h2 class="text-3xl md:text-4xl font-semibold text-rose-600">Nossos Serviços</h2>

      <div class="grid gap-8 md:grid-cols-3 text-left mt-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
          <img src="/img/luzes.jpg" alt="Luzes" class="h-72 w-full object-cover" />
          <div class="p-5">
            <h3 class="text-xl font-semibold text-rose-500">Luzes</h3>
            <p class="text-gray-600 mt-2">Realce o brilho natural do seu cabelo com técnicas de luzes personalizadas.</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
          <img src="/img/henna.jpg" alt="Henna" class="h-72 w-full object-cover" />
          <div class="p-5">
            <h3 class="text-xl font-semibold text-rose-500">Design com Henna</h3>
            <p class="text-gray-600 mt-2">Sobrancelhas perfeitas e marcantes com produtos de alta qualidade.</p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">
          <img src="/img/lashlifting.jpg" alt="Lash Lifting" class="h-72 w-full object-cover" />
          <div class="p-5">
            <h3 class="text-xl font-semibold text-rose-500">Lash Lifting</h3>
            <p class="text-gray-600 mt-2">Curvatura e volume natural para seus cílios, sem extensões.</p>
          </div>
        </div>
      </div>

      <a href="{{ url('/agendamento') }}" class="inline-block bg-rose-500 text-white px-6 py-3 rounded-full hover:bg-rose-600 transition">
        Agende seu horário agora
      </a>
    </div>
  </section>

</main>


<footer class="bg-[#c59595] text-white text-center py-8">
    <p class="text-2xl">Faça parte da nossa família</p>
    <div class="footer-links flex justify-center mt-6">
        <div class="footer-items mx-6 ">
            <img src="/img/contato.jpg" alt="Contato" class="w-12 h-12 rounded-full">   
            <a href="#" class="text-2xl">Contato</a>
        </div>
        <div class="footer-items mx-6">
            <img src="/img/localizacao.png" alt="Localização" class="w-12 h-12 rounded-full">    
            <a href="#" class="text-2xl">Localização</a>
        </div>
    </div>
</footer>

</body>
</html>
