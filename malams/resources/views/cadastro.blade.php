<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
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
                <li><a class="nav-links" href="{{ url('/agendamento') }}">Agendamento</a></li>
                <li><a class="nav-links" href="{{ url('/sobre') }}">Sobre</a></li>
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
                    <a href="{{ url('/perfil') }}" class="link-animado">Meu perfil</a>
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

    <div class="container">
        <div class="card-cadastro">
            <div class="imagem-cadastro">
                <img src="/img/cadastro1.jpeg" alt="Imagem de Cadastro">
            </div>

            <div class="form-container">
                <h4>Cadastro de Usuário</h4>
                <form action="/cadastro" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-columns">
                            <div class="form-column">
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="name">Nome</label>
                                        <input type="text" id="name" name="txtName" class="inputUser" value="{{ old('txtName') }}" placeholder="Maria Silva" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="cpf">CPF</label>
                                        <input type="text" id="cpf" name="txtCpf" class="inputUser" value="{{ old('txtCpf') }}" placeholder="000.000.000-00" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="nascimento">Data de Nascimento</label>
                                        <input type="text" id="nascimento" name="txtDatNascimento" class="inputUser" value="{{ old('txtDatNascimento') }}" required placeholder="dd/mm/aaaa" pattern="\d{2}/\d{2}/\d{4}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="celular">Celular</label>
                                        <input type="text" id="celular" name="txtCelular" class="inputUser" value="{{ old('txtCelular') }}" placeholder="(00) 00000-0000" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="email">Email</label>
                                        <input type="email" id="email" name="txtEmail" class="inputUser" value="{{ old('txtEmail') }}" placeholder="mariasilva@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="password">Senha:</label>
                                        <input type="password" id="password" name="password" class="inputUser" placeholder="Mínimo de 6 caracteres" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="password_confirmation">Confirmar Senha:</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="inputUser" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" id="submit" value="Cadastrar" class="form-btn">
                        </div>
                    </fieldset>
                </form>
            </div>
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
    
      <!-- Script para Data de Nascimento -->
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
