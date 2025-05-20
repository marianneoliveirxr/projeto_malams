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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    
    html {
    scroll-behavior: smooth;
  }
    </style>

    <header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
                <li><a class="nav-links" href="{{ url('/agendamento') }}">Agendamento</a></li>
                <li><a class="nav-links" href="{{ url('/home') }}#sobre">Sobre</a></li>
            </ul>
        </nav>
        
    <!-- Parte Direita (Dependendo da Autenticação) -->
    <div class="header-right menu-direita">
        @guest
            <!-- Se o usuário NÃO estiver autenticado -->
            <div class="social-icons">
                <a class="cadastre-se" href="{{ url('/cadastro') }}">Cadastre-se</a>
                <a  href="{{ url('/login') }}">Login</a>
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
    </header>

    <main>
    <div class="container">
            <!-- Formulário de Login -->
            <div class="form-container">
                <h4>Entre</h4>
                <form action="{{ route('login-user') }}" method="POST">
                    @csrf
                    <input type="email" name="txtEmail" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Acessar</button>
                    <a type="text" class="frase" href="{{ url('/cadastro') }}">Ainda não tenho cadastro</a>
                </form>
            </div>

            <!-- Mensagem de erro -->
           @if ($errors->has('login'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Email ou Senha inválidos',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        }
                    });
                </script>
            @endif

            <!-- Imagem -->
            <div class="image-container">
                <img src="/img/login.jpg" alt="Mulher sorrindo">
            </div>
        </div>
    </main>

<!-- Rodapé -->
<!-- Rodapé -->
<footer class="bg-[#c59595] text-white text-center py-6">
  <p class="text-[28px] mb-3 ">Faça parte da nossa família</p>
  <div class="footer-links flex justify-center gap-12 mt-3">
    <div class="footer-items flex items-center gap-3 cursor-pointer select-none" id="contato-section">
      <img src="/img/contato.jpg" alt="Contato" class="w-9 h-9 rounded-full" />
      <a href="#" class="text-[28px] font-medium" id="contato-link">Contato</a>
    </div>
    <div class="footer-items flex items-center gap-3 cursor-pointer select-none" id="localizacao-section">
      <img src="/img/localizacao.png" alt="Localização" class="w-9 h-9 rounded-full" />
      <a href="#" class="text-[28px] font-medium" id="localizacao-link">Localização</a>
    </div>
  </div>
</footer>

<!-- Conteúdo extra fica numa div fora do footer -->
<div id="footer-info-container" 
     class="bg-[#c59595] text-white text-center py-6 overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out">
  <!-- Conteúdo extra será inserido aqui via JS -->
</div>

<script>
  const contatoSection = document.getElementById('contato-section');
  const localizacaoSection = document.getElementById('localizacao-section');
  const infoContainer = document.getElementById('footer-info-container');

  const contatoContent = `
    <div class="space-y-1 text-lg max-w-md mx-auto">
      <a href="https://instagram.com/eteccamargoaranha" target="_blank" rel="noopener" class="block hover:underline">@eteccamargoaranha</a>
      <a href="https://instagram.com/n3rds" target="_blank" rel="noopener" class="block hover:underline">@n3rds</a>
    </div>
  `;

  const localizacaoContent = `
    <div class="text-lg max-w-md mx-auto">
      <a href="https://maps.app.goo.gl/GpnGc9jKidV1iCub7" target="_blank" rel="noopener" class="hover:underline">
        R.Marcial, 25 - Mooca, São Paulo - SP, 03169-040
      </a>
    </div>
  `;

    const footer = document.querySelector('footer');

    function showContent(content) {
    const isOpen = infoContainer.innerHTML === content;

    // Alterna conteúdo
    infoContainer.innerHTML = isOpen ? '' : content;
    infoContainer.style.maxHeight = isOpen ? '0' : infoContainer.scrollHeight + 32 + 'px';

    // Aplica ou remove shrink
    footer.classList.toggle('shrink', !isOpen);

    // Rola suavemente para o conteúdo extra
    if (!isOpen) {
        setTimeout(() => {
        infoContainer.scrollIntoView({ behavior: 'smooth' });
        }, 100);
    }
    }

    document.addEventListener('click', (e) => {
    if (
        !contatoSection.contains(e.target) &&
        !localizacaoSection.contains(e.target) &&
        !infoContainer.contains(e.target)
    ) {
        infoContainer.style.maxHeight = '0';
        infoContainer.innerHTML = '';
        footer.classList.remove('shrink');
    }
    });
</script>
</body>

</html>
