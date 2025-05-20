<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Funcionario</title>
    <link rel="stylesheet" href="/css/perfil.css">
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

<div class="caixa-central">
    <div class="info">
        <form action="/perfilfuncionario" method="GET">
            @csrf

            <h1>Informações do Funcionario</h1>

            <label><strong>Nome:</strong></label>
            <input type="text" id="name" name="txtName" class="inputUser" value="{{ old('txtName', $user->nomeFuncionario) }}" placeholder="{{ old('txtName', $user->nomeUser) }}" required>

            <label><strong>Email:</strong></label>
            <input type="email" id="email" name="txtEmail" class="inputUser" value="{{ old('txtEmail', $user->emailFuncionario) }}" placeholder="{{ old('txtEmail', $user->email) }}" required>

            <label><strong>Celular:</strong></label>
            <input type="text" id="celular" name="txtCelular" class="inputUser" value="{{ old('txtCelular', $user->celularFuncionario) }}" placeholder="{{ old('txtCelular', $user->celularUser) }}" required>

            <label><strong>CPF:</strong></label>
            <input type="text" id="cpf" name="txtCpf" class="inputUser" value="{{ old('txtCpf', $user->cpfFuncionario) }}" placeholder="{{ old('txtCpf', $user->cpfUser) }}" required>

            <label><strong>Senha:</strong></label>
            <input type="password" id="password" name="senhaFuncionario" class="inputUser" placeholder="Mínimo de 6 caracteres" required>

            <label class="labelInput" for="password_confirmation">Confirmar Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="inputUser" required>

            <button id="submit">Salvar Alterações</button>
        </form>
    </div>
</div>




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

<script>
        const inputData = document.getElementById('nascimento');
        inputData.addEventListener('input', () => {
            let value = inputData.value.replace(/\D/g, '');
            if (value.length > 2 && value.length <= 4) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            } else if (value.length > 4) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
            }
            inputData.value = value;
        });
    </script>

    <!-- Script para CPF -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cpfInput = document.getElementById('cpf');

        cpfInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Aplica a máscara
            if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d)/, '$1.$2');
            }
            if (value.length > 6) {
                value = value.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            }
            if (value.length > 9) {
                value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
            }

            // Limita a 14 caracteres (com pontos e traço)
            value = value.substring(0, 14);

            e.target.value = value;
        });
    });
    </script>

    <!-- Script para número de celular -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const celularInput = document.getElementById('celular');

        celularInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Aplica a máscara
            if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d)/, '($1) $2');
            }
            if (value.length > 7) {
                value = value.replace(/^(\(\d{2}\)) (\d{5})(\d)/, '$1 $2-$3');
            }

            // Limita a 15 caracteres com formatação
            value = value.substring(0, 15);

            e.target.value = value;
        });
    });
    </script>

     <!-- SweetAlert2 Mensagens -->
     @if (session('success'))
         <script>
             Swal.fire({
                 icon: 'success',
                 title: 'Sucesso!',
                 text: '{{ session('success') }}',
                 confirmButtonColor: '#d08989'
             });
         </script>
     @endif
 
     @if ($errors->any())
         <script>
             Swal.fire({
                 icon: 'error',
                 title: 'Erro',
                 html: `{!! implode('<br>', $errors->all()) !!}`,
                 confirmButtonColor: '#d08989'
             });
         </script>
     @endif
 
     <script>

</body>

</html>
