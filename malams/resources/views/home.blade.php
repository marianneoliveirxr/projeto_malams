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
  @import url('https://fonts.googleapis.com/css2?family=Cal+Sans:wght@600;700&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');

  html {
    scroll-behavior: smooth;
  }

  body {
    background-color: #faf1f0 !important;
    color: #6d4c4c !important;
    font-family: 'Cal Sans', sans-serif;
    font-weight: 600; /* mais gordinho por padrão */
  }

  main {
    background-color: #faf1f0 !important;
    color: #6d4c4c !important;
  }

  section {
    background-color: transparent !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  h1, h2, h3, .text-rose-600, .text-rose-500 {
    color: #a86f6f !important;
    font-weight: 700 !important;
  }

  a, button {
    background-color: #c59595 !important;
    color: white !important;
    font-weight: 700 !important;
    transition: background-color 0.3s ease;
  }

  a:hover, button:hover {
    background-color: #a86f6f !important;
  }

  .bold-hover-suave {
    font-weight: 700 !important;
    transition: color 0.3s ease, transform 0.3s ease;
  }

  .bold-hover-suave:hover {
    color: #ffffff;
    transform: scale(1.05);
  }
</style>
  <script>
    // Função para rolar suavemente até a seção "Nosso Espaço"
    function scrollToOurSpace() {
      const element = document.getElementById('nosso-espaco');
      element.scrollIntoView({ behavior: 'smooth' });
    }
  </script>
  <script>
    function mostrarContato() {
      document.getElementById('contato-section').classList.remove('hidden');
      document.getElementById('localizacao-section').classList.add('hidden');
    }

    function mostrarLocalizacao() {
      document.getElementById('localizacao-section').classList.remove('hidden');
      document.getElementById('contato-section').classList.add('hidden');
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

<main class="px-4 md:px-16 py-12 bg-[#ffe7e3] text-gray-800 font-[Cal+Sans]">

  <!-- Hero Section -->
<section class="relative rounded-3xl p-10 overflow-hidden pb-6">

    <div class="max-w-4xl mx-auto text-center space-y-6">
      <h1 class="text-6xl md:text-7xl font-bold">Bem-vindo(a) ao Malams Saloon</h1>
      <p class="text-x1 md:text-3xl text-[ #6d4c4c]">Transforme sua beleza em experiência. Agende com facilidade e sinta-se renovada.</p>
      <button onclick="scrollToOurSpace()" class="text-lg bg-rose-500 text-white px-12 py-4 rounded-full">Começar</button>
    </div>

  </section>

  <!-- Nosso Espaço -->
<section id="nosso-espaco" class="relative rounded-3xl p-10 overflow-hidden pt-4">
  <div class="max-w-7xl mx-auto px-6 text-center space-y-10">
    <h2 class="text-5xl md:text-6xl font-bold">Nosso Espaço</h2>
    <p class="text-x1 md:text-2xl text-[ #6d4c4c]">Um refúgio de beleza, conforto e sofisticação. Cada canto do Malams Saloon foi pensado para que você se sinta única.</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">
      <img src="/img/nossoespaco1.jpg" alt="Salão 1" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
      <img src="/img/nossoespaco2.jpg" alt="Salão 2" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
      <img src="/img/nossoespaco3.jpg" alt="Salão 3" class="rounded-xl shadow-md hover:scale-105 transition duration-300" />
    </div>

    <a href="{{ url('/agendamento') }}" class="text-lg inline-block text-white px-12 py-4 rounded-full">
      Agende seu horário agora
    </a>
  </div>
</section>

  <!-- Sobre o Salão -->
  <section id="sobre" class="relative rounded-3xl p-10 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-8">
      
      <!-- Imagem esquerda -->
      <div class="hidden md:block">
      <img src="/img/esquerda.jpg" alt="Equipe" class="mr-10 w-full h-[500px] object-cover rounded-2xl shadow-lg" />
      </div>

      <!-- Texto central -->
      <div class="text-center space-y-6 px-4">
      <h2 class="text-4xl md:text-5xl font-bold text-rose-600">Sobre Malams Saloon</h2>
      <p class="text-gray-700 text-xl leading-relaxed">
          Aqui, beleza é mais do que aparência — é uma experiência. Com atendimento personalizado, técnicas inovadoras e um ambiente acolhedor, o Malams Saloon eleva sua autoestima enquanto cuida de você com carinho.
        </p>
        <p class="text-gray-700 text-xl leading-relaxed">
          Nossa missão é oferecer muito mais do que serviços de beleza: oferecemos momentos que encantam e transformam.
        </p>
      </div>

      <!-- Imagem direita -->
      <div class="hidden md:block">
      <img src="/img/salao.jpg" alt="Ambiente" class="ml-10 w-full h-[500px] object-cover rounded-2xl shadow-lg" />
      </div>
    </div>
  </div>
</section>

  <!-- Nossos Serviços -->
  <section class="relative rounded-3xl p-10 overflow-hidden">
    <div class="max-w-7xl mx-auto text-center space-y-10">
      <h2 class="text-4xl md:text-5xl font-semibold text-rose-600">Nossos Serviços</h2>

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

      <a href="{{ url('/agendamento') }}" class="inline-block bg-rose-500 text-white px-12 py-4 rounded-full">
        Agende seu horário agora
      </a>
    </div>
  </section>
</main>

<!-- Rodapé -->
<footer onclick="resetarFooter(event)" class="bg-[#c59595] text-white text-center py-6 transition-all duration-500">
  <p class="text-[28px] mb-3">Faça parte da nossa família</p>

  <!-- Bloco de Links -->
  <div id="footer-default" class="footer-links flex justify-center gap-12 mt-3 transition-opacity duration-300">
    <div onclick="mostrarFooter('contato')" class="footer-items flex items-center gap-3 cursor-pointer group">
      <img src="/img/contato.jpg" alt="Contato" class="w-9 h-9 rounded-full" />
      <span class="text-[28px] relative cursor-pointer bold-hover-suave">Contato</span>
    </div>
    <div onclick="mostrarFooter('localizacao')" class="footer-items flex items-center gap-3 cursor-pointer group">
      <img src="/img/localizacao.png" alt="Localização" class="w-9 h-9 rounded-full" />
      <span class="text-[28px] relative cursor-pointer bold-hover-suave">Localização</span>
    </div>
  </div>

  <!-- Conteúdo de Contato -->
  <div id="footer-contato" class="hidden opacity-0 flex flex-col items-center gap-2 transition-opacity duration-500">
    <a href="https://www.instagram.com/eteccamargoaranha" target="_blank" class="text-[22px] hover:underline transition-all duration-200">@eteccamargoaranha</a>
    <a href="https://www.instagram.com/n3rds.ca" target="_blank" class="text-[22px] hover:underline transition-all duration-200">@n3rds.ca</a>
  </div>

  <!-- Conteúdo de Localização -->
  <div id="footer-localizacao" class="hidden opacity-0 flex flex-col items-center gap-2 transition-opacity duration-500">
    <a href="https://www.google.com/maps/place/R.+Marcial,+25+-+Mooca,+São+Paulo+-+SP,+03169-040" target="_blank" class="text-[22px] hover:underline transition-all duration-200">
      R. Marcial, 25 - Mooca, São Paulo - SP, 03169-040
    </a>
  </div>
</footer>

<script>
  function mostrarFooter(tipo) {
    // Oculta tudo
    document.getElementById("footer-default").classList.add("hidden");
    document.getElementById("footer-contato").classList.add("hidden", "opacity-0");
    document.getElementById("footer-localizacao").classList.add("hidden", "opacity-0");

    // Mostra o conteúdo com transição
    const target = document.getElementById(`footer-${tipo}`);
    target.classList.remove("hidden");
    setTimeout(() => target.classList.remove("opacity-0"), 50);
  }

  function resetarFooter(event) {
    // Garante que só funcione ao clicar no fundo, e não nos elementos clicáveis
    const ignorarClique = event.target.closest('.footer-items') || event.target.tagName === 'A';
    if (ignorarClique) return;

    // Reseta: oculta conteúdo extra e mostra o padrão
    document.getElementById("footer-contato").classList.add("opacity-0");
    document.getElementById("footer-localizacao").classList.add("opacity-0");
    setTimeout(() => {
      document.getElementById("footer-contato").classList.add("hidden");
      document.getElementById("footer-localizacao").classList.add("hidden");
      document.getElementById("footer-default").classList.remove("hidden");
    }, 300); // espera a transição de opacidade terminar
  }
</script>
</body>
</html>
