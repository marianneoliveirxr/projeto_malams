<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="/css/cadastro.css">
</head>
<body>
    <header>
        <img class="logo" src="/img/malamslogo.png" alt="logo">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Sobre</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <img src=/img/facebook.png alt="Facebook">
            <img src=/img/instagram.png alt="Instagram">
            <div href="#">Cadastre-se</div>
            <div href="#">Login</div>
        </div>
    </header>

    <div class="container">
    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert success-alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Erros de validação -->
    @if ($errors->any())
        <div class="alert error-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <div class="form-container">
        <h4>Cadastro de Usuário</h4>
        <form action="/cadastro" method="POST">
            @csrf

            <fieldset>
    <div class="form-columns">
        <!-- Coluna 1 -->
        <div class="form-column">
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="name">Nome</label>
                    <input type="text" id="name" name="txtName" class="inputUser" value="{{ old('txtName') }}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="cpf">CPF</label>
                    <input type="text" id="cpf" name="txtCpf" class="inputUser" value="{{ old('txtCpf') }}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="nascimento">Data de Nascimento</label>
                    <input type="text" id="nascimento" name="txtDatNascimento" class="inputUser" value="{{ old('txtDatNascimento') }}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="celular">Celular</label>
                    <input type="text" id="celular" name="txtCelular" class="inputUser" value="{{ old('txtCelular') }}" required>
                </div>
            </div>
        </div>

        <!-- Coluna 2 -->
        <div class="form-column">
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="email">Email</label>
                    <input type="email" id="email" name="txtEmail" class="inputUser" value="{{ old('txtEmail') }}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="inputBox">
                    <label class="labelInput" for="password">Senha:</label>
                    <input type="password" id="password" name="password" class="inputUser" required>
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
        <input type="submit" id="submit" value="Cadastrar">
    </div>
</fieldset>
        </form>
    </div>
</div>

    <footer>
        <p>Faça parte da nossa família</p>
        <div class="footer-links">
            <div class="link-item">
                <a href="#">Nossos Profissionais</a>
                <img src="profissionais.jpg" alt="Profissionais">
            </div>
            <div class="link-item">
                <a href="#">Localização</a>
                <img src="localizacao.jpg" alt="Localização">
            </div>
            <div class="link-item">
                <a href="#">Avaliações</a>
                <img src="avaliacoes.jpg" alt="Avaliações">
            </div>
        </div>
    </footer>

    <script>
        const inputData = document.getElementById('nascimento');

        inputData.addEventListener('input', () => {
            let value = inputData.value.replace(/\D/g, ''); // Remove tudo que não for número

            if (value.length > 2 && value.length <= 4) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            } else if (value.length > 4) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
            }

            inputData.value = value;
        });
    </script>
</body>
</html>
