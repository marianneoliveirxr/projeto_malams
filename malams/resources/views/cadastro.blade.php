<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="/css/cadastro.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>

    <header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a class="home" href="#">Home</a></li>
                <li><a class="servicos" href="#">Serviços</a></li>
                <li><a class="contato" href="#">Contato</a></li>
                <li><a class="sobre" href="#">Sobre</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <img src=/img/facebook.png alt="Facebook">
            <img src=/img/instagram.png alt="Instagram">
            <a class="cadastre-se" href="/teste">Cadastre-se</a>
            <a class="login" href="{{ url('/login') }}">Login</a>
        </div>
    </header>

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
                                        <input type="text" id="name" name="txtName" class="inputUser" value="{{ old('txtName') }}" placeholder="Ex: Maria Bonita" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="cpf">CPF</label>
                                        <input type="text" id="cpf" name="txtCpf" class="inputUser" value="{{ old('txtCpf') }}" placeholder="Ex:12345678912" required>
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
                                        <input type="text" id="celular" name="txtCelular" class="inputUser" value="{{ old('txtCelular') }}" placeholder="Ex: 912657845" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="inputBox">
                                        <label class="labelInput" for="email">Email</label>
                                        <input type="email" id="email" name="txtEmail" class="inputUser" value="{{ old('txtEmail') }}" placeholder="Ex: maria@gmail.com" required>
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
            <div class="profissionais">
                <img src="/img/profissionais.jpg" alt="Profissionais">   
                <a href="#">Nossos Profissionais</a>
            </div>
            <div class="local">
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
