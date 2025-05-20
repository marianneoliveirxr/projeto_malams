<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <form action="/perfil" method="GET">
            @csrf

            <h1>Informações do Cliente</h1>

            <label><strong>Nome:</strong></label>
            <input type="text" id="name" name="txtName" class="inputUser" value="{{ old('txtName', $user->nomeUser) }}" placeholder="{{ old('txtName', $user->nomeUser) }}" required>

            <label><strong>CPF:</strong></label>
            <input type="text" id="cpf" name="txtCpf" class="inputUser" value="{{ old('txtCpf', $user->cpfUser) }}" placeholder="{{ old('txtCpf', $user->cpfUser) }}" required>

            <label><strong>Data de nascimento:</strong></label>
            <input type="text" id="nascimento" name="txtDatNascimento" class="inputUser" value="{{ old('txtDatNascimento', \Carbon\Carbon::parse($user->dataNascimento)->format('d/m/Y')) }}" required placeholder="{{ old('txtDatNascimento', \Carbon\Carbon::parse($user->dataNascimento)->format('d/m/Y')) }}" pattern="\d{2}/\d{2}/\d{4}">

            <label><strong>Celular:</strong></label>
            <input type="text" id="celular" name="txtCelular" class="inputUser" value="{{ old('txtCelular', $user->celularUser) }}" placeholder="{{ old('txtCelular', $user->celularUser) }}" required>

            <label><strong>Email:</strong></label>
            <input type="email" id="email" name="txtEmail" class="inputUser" value="{{ old('txtEmail', $user->email) }}" placeholder="{{ old('txtEmail', $user->email) }}" required>

            <label><strong>Senha:</strong></label>
            <input type="password" id="password" name="password" class="inputUser" placeholder="Mínimo de 6 caracteres" required>

            <label class="labelInput" for="password_confirmation">Confirmar Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="inputUser" required>

            <button id="submit">Salvar Alterações</button>
        </form>
    </div>
</div>




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
