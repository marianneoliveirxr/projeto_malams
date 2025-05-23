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
   @vite('resources/css/app.css')
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Cal+Sans:wght@600;700&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
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

    <a href="{{ url('/agendamentos/create') }}" class="text-lg inline-block text-white px-12 py-4 rounded-full">
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

      <a href="{{ url('/agendamentos/create') }}" class="inline-block bg-rose-500 text-white px-12 py-4 rounded-full">
        Agende seu horário agora
      </a>
    </div>
  </section>
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
            <p style="margin:0; font-size:1.1rem;">R. Marcial, 25 - Mooca, São Paulo</p>
        </div>
    </div>
</footer>


</body>
</html>
