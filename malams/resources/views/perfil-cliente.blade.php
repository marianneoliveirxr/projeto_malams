<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Cliente</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/cadastro.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icon.ico">
</head>
<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

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
                    <a href="{{ url('/perfil-cliente') }}" class="link-animado">Meu perfil</a>
                    <a href="{{ url('/agendamentos') }}" class="link-animado">Meus agendamentos</a>
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

<body>
<main class="flex-grow flex justify-center items-center p-6">
  <form
    action="{{ route('cliente.atualizarPerfil') }}"
    method="POST"
    class="bg-white/90 backdrop-blur-md rounded-2xl shadow-[0_6px_20px_rgba(0,0,0,0.4)] p-10 max-w-xl w-full flex flex-col gap-6 font-['Rubik',sans-serif]"
  >
    @csrf
    @method('PUT')

    <h2 class="text-4xl font-semibold text-[#d19f9f] mb-6 text-center">Detalhes do Cliente</h2>

    <label for="nomeUser" class="flex flex-col text-[#000] font-semibold text-lg">
      Nome:
      <input
        type="text"
        name="nomeUser"
        id="nomeUser"
        value="{{ old('nomeUser', $cliente->nomeUser) }}"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#c59595]"
        required
      >
    </label>

    <label for="cpfUser" class="flex flex-col text-[#000] font-semibold text-lg">
      CPF:
      <input
        type="text"
        name="cpfUser"
        id="cpfUser"
        value="{{ $cliente->cpfUser }}"
        readonly
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] bg-gray-100 text-gray-600 cursor-not-allowed"
      >
    </label>

    <label for="dataNascimento" class="flex flex-col text-[#000] font-semibold text-lg">
      Data de Nascimento:
      <input
        type="date"
        name="dataNascimento"
        id="dataNascimento"
        value="{{ old('dataNascimento', \Carbon\Carbon::parse($cliente->dataNascimento)->format('Y-m-d')) }}"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#c59595]"
        required
      >
    </label>

    <label for="celularUser" class="flex flex-col text-[#000] font-semibold text-lg">
      Celular:
      <input
        type="text"
        name="celularUser"
        id="celularUser"
        value="{{ old('celularUser', $cliente->celularUser) }}"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#c59595]"
        required
      >
    </label>

    <label for="email" class="flex flex-col text-[#000] font-semibold text-lg">
      Email:
      <input
        type="email"
        name="email"
        id="email"
        value="{{ old('email', $cliente->email) }}"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#c59595]"
        required
      >
    </label>

    <label for="password" class="flex flex-col text-[#000] font-semibold text-lg">
      Senha (deixe em branco para não alterar):
      <input
        type="password"
        name="password"
        id="password"
        placeholder="********"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#c59595]"
      >
    </label>

        <div class="flex justify-center gap-6 mt-6">
        <button
            type="submit"
            class="bg-[#cda1a1] text-white font-semibold py-4 px-10 rounded-xl shadow-md hover:bg-[#c48d8d] transition"
        >
            Salvar Alterações
        </button>

        <button
            type="button"
            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-4 px-10 rounded-xl shadow-md transition"
            onclick="confirmarExclusao()"
        >
            Excluir Conta
        </button>
        </div>
  </form>
</main>
<form id="form-excluir" action="{{ route('cliente.excluirConta') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>


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

    <!-- Script para número de celular -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const celularInput = document.getElementById('celularUser');

            celularInput.addEventListener('input', function (e) {
                let value = e.target.value;

                // Remove tudo que não for número
                value = value.replace(/\D/g, '');

                // Aplica a máscara (99) 99999-9999
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

<!-- SweetAlert2 -->

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro(s) no formulário',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonText: 'Ok'
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Ok'
        });
    </script>
@endif

<script>
    function confirmarExclusao() {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Essa ação não poderá ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-excluir').submit();
            }
        });
    }
</script>


</body>
</html>