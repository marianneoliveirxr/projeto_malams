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

    html {
    scroll-behavior: smooth;
  }
  
  </style>
</head>
<body class="bg-[#ffff] text-gray-800 font-sans">
<div class="content">
<header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
                <li><a class="nav-links" href="{{ url('/agendamento') }}">Agendamento</a></li>
                <li><a class="nav-links" href="{{ url('/home') }}#sobre"">Sobre</a></li>
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
  
  <div class="max-w-5xl mx-auto">
    <h1 class="text-5xl font-bold text-center text-[#c59595] mb-10 mt-12 ">Escolha o serviço</h1>

    <!-- Botões de Categoria -->
    <div class="flex justify-center gap-6 mb-12">
      <button onclick="mostrarCards('cabelereiro')" class="px-8 py-5 text-2x1 font-semibold bg-[#c59595] text-white rounded-full shadow hover:bg-[#a67878] transition">Cabelos</button>
      <button onclick="mostrarCards('unhas')" class="px-8 py-5 text21x1 font-semibold bg-[#c59595] text-white rounded-full shadow hover:bg-[#a67878] transition">Unhas</button>
      <button onclick="mostrarCards('estetica')" class="px-8 py-5 text-2x1 font-semibold bg-[#c59595] text-white rounded-full shadow hover:bg-[#a67878] transition">Estética</button>
    </div>

    <!-- Serviços - Cabelereiro -->
    <div id="cards-cabelereiro" class="hidden grid md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/corte.jpg" class="w-full h-40 object-cover" alt="Corte">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Corte</h3>
          <p><strong>Tempo:</strong> 1 hora</p>
          <p><strong>Preço:</strong> R$ 80,00</p>
          <button onclick="abrirModal('Corte')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/tintura.jpg" class="w-full h-40 object-cover" alt="Tintura">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Tintura</h3>
          <p><strong>Tempo:</strong> 1h30</p>
          <p><strong>Preço:</strong> R$ 120,00</p>
          <button onclick="abrirModal('Tintura')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/escova.jpg" class="w-full h-40 object-cover" alt="Escova">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Escova</h3>
          <p><strong>Tempo:</strong> 30 minutos</p>
          <p><strong>Preço:</strong> R$ 50,00</p>
          <button onclick="abrirModal('Escova')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
    </div>

    <!-- Serviços - Unhas -->
    <div id="cards-unhas" class="hidden grid md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/manicure.jpg" class="w-full h-40 object-cover" alt="Manicure">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Manicure</h3>
          <p><strong>Tempo:</strong> 30 minutos</p>
          <p><strong>Preço:</strong> R$ 30,00</p>
          <button onclick="abrirModal('Manicure')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/pedicure.jpg" class="w-full h-40 object-cover" alt="Pedicure">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Pedicure</h3>
          <p><strong>Tempo:</strong> 40 minutos</p>
          <p><strong>Preço:</strong> R$ 30,00</p>
          <button onclick="abrirModal('Pedicure')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/unhascompletas.jpg" class="w-full h-40 object-cover" alt="Manicure + Pedicure">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Manicure + Pedicure</h3>
          <p><strong>Tempo:</strong> 1h20</p>
          <p><strong>Preço:</strong> R$ 55,00</p>
          <button onclick="abrirModal('Manicure + Pedicure')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
    </div>

    <!-- Serviços - Estética -->
    <div id="cards-estetica" class="hidden grid md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/cilios.jpg" class="w-full h-40 object-cover" alt="Cílios">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Extensão de Cílios</h3>
          <p><strong>Tempo:</strong> 2 horas</p>
          <p><strong>Preço:</strong> R$ 100,00</p>
          <button onclick="abrirModal('Extensão de Cílios')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/sombrancelha.jpg" class="w-full h-40 object-cover" alt="Sombrancelha">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Design de Sobrancelhas</h3>
          <p><strong>Tempo:</strong> 1h20</p>
          <p><strong>Preço:</strong> R$ 50,00</p>
          <button onclick="abrirModal('Design de Sobrancelhas')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <img src="/img/limpezaPele.jpg" class="w-full h-40 object-cover" alt="Limpeza de Pele">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#c59595]">Limpeza de Pele</h3>
          <p><strong>Tempo:</strong> 1 hora</p>
          <p><strong>Preço:</strong> R$ 70,00</p>
          <button onclick="abrirModal('Limpeza de Pele')" class="mt-4 w-full bg-[#c59595] text-white py-2 rounded-lg hover:bg-[#a67878]">Agendar agora</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Agendamento -->
  <div id="modalAgendamento" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6 relative">
      <h2 class="text-xl font-bold text-[#c59595] mb-4">Agendar: <span id="servicoSelecionado"></span></h2>
      <label class="block mb-3">
        <span class="text-sm">Escolha a data:</span>
        <input type="date" class="w-full mt-1 border border-gray-300 rounded p-2" />
      </label>
      <label class="block mb-4">
        <span class="text-sm">Selecione o profissional:</span>
        <select class="w-full mt-1 border border-gray-300 rounded p-2">
          <option>Fernanda</option>
          <option>Camila</option>
          <option>Juliana</option>
        </select>
      </label>
      <div class="flex justify-end gap-2">
        <button onclick="fecharModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
        <button class="px-4 py-2 bg-[#c59595] text-white rounded hover:bg-[#a67878]">Agendar</button>
      </div>
    </div>
  </div>

  <script>
    function mostrarCards(categoria) {
      document.getElementById("cards-cabelereiro").classList.add("hidden");
      document.getElementById("cards-unhas").classList.add("hidden");
      document.getElementById("cards-estetica").classList.add("hidden");
      document.getElementById(`cards-${categoria}`).classList.remove("hidden");
    }

    function abrirModal(servico) {
      document.getElementById('modalAgendamento').classList.remove('hidden');
      document.getElementById('servicoSelecionado').innerText = servico;
    }

    function fecharModal() {
      document.getElementById('modalAgendamento').classList.add('hidden');
    }

    window.onload = function() {
        mostrarCards('cabelereiro'); // Exibir "cabelereiro" por padrão
    };

    function mostrarCards(categoria) {
        const categorias = ['cabelereiro', 'unhas', 'estetica'];
        
        categorias.forEach(cat => {
            const card = document.getElementById(`cards-${cat}`);
            card.classList.add('hidden');
        });

        const cardToShow = document.getElementById(`cards-${categoria}`);
        cardToShow.classList.remove('hidden');
    }
    
    function agendarServico(servico) {
        window.location.href = `/agendamento/${servico}`; // Redireciona para a página de agendamento do serviço
    }
  </script>

<!-- Cards das Profissionais -->
<div class="max-w-7xl mx-auto mt-16 px-4 sm:px-6 lg:px-8 mb-16">
  <h2 class="text-5xl font-bold text-center text-[#c59595] mb-8">Nossas Profissionais</h2>

  <!-- Grid Responsivo, Centralizado -->
  <div class="flex flex-wrap justify-center gap-8">
    <!-- Card da Profissional 1 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-transform transform hover:scale-105 w-full sm:w-80">
      <img src="/img/fernanda.jpg" alt="Profissional 1" class="w-full h-40 object-cover">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-[#c59595]">Fernanda</h3>
        <p class="mt-2 text-x1 text-gray-600">Unhas, Estética</p>
      </div>
    </div>

    <!-- Card da Profissional 2 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-transform transform hover:scale-105 w-full sm:w-80">
      <img src="/img/camila.jpg" alt="Profissional 2" class="w-full h-40 object-cover">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-[#c59595]">Camila</h3>
        <p class="mt-2 text-x1 text-gray-600">Cabelos, Unhas</p>
      </div>
    </div>

    <!-- Card da Profissional 3 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-transform transform hover:scale-105 w-full sm:w-80">
      <img src="/img/juliana.jpg" alt="Profissional 3" class="w-full h-40 object-cover">
      <div class="p-4 text-center">
        <h3 class="text-2xl font-semibold text-[#c59595]">Juliana</h3>
        <p class="mt-2 text-x1 text-gray-600">Estética, Cabelos</p>
      </div>
    </div>
  </div>
</div>

<!-- Rodapé -->
<footer onclick="resetarFooter(event)" class="bg-[#c59595] text-white text-center py-6 transition-all duration-500">
  <p class="text-[28px] mb-3">Faça parte da nossa família</p>

  <!-- Bloco de Links -->
  <div id="footer-default" class="footer-links flex justify-center gap-12 mt-3 transition-opacity duration-300">
    <div onclick="mostrarFooter('contato')" class="footer-items flex items-center gap-3 cursor-pointer group">
      <img src="/img/contato.jpg" alt="Contato" class="w-9 h-9 rounded-full" />
      <span class="footer-hover text-[28px] font-medium relative cursor-pointer">Contato</span>
    </div>
    <div onclick="mostrarFooter('localizacao')" class="footer-items flex items-center gap-3 cursor-pointer group">
      <img src="/img/localizacao.png" alt="Localização" class="w-9 h-9 rounded-full" />
      <span class="footer-hover text-[28px] font-medium relative cursor-pointer">Localização</span>
    </div>
  </div>

  <!-- Conteúdo de Contato -->
  <div id="footer-contato" class="hidden opacity-0 flex flex-col items-center gap-2 transition-opacity duration-500">
    <a href="https://www.instagram.com/eteccamargoaranha" target="_blank" class="text-[22px] hover:underline transition-all duration-200">@eteccamargoaranha</a>
    <a href="https://www.instagram.com/n3rds" target="_blank" class="text-[22px] hover:underline transition-all duration-200">@n3rds</a>
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
</div>
</body>
</html>
