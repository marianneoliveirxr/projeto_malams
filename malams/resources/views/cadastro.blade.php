<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="">
</head>
<body>


    <div class="box">
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

        <h1>Cadastro de Usuário</h1>

        <form action="/cadastro" method="POST">
    @csrf

    <fieldset>
        <legend>Informações do Usuário</legend>

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

        <div>
            <input type="submit" id="submit" value="Cadastrar">
        </div>
    </fieldset>
</form>

</body>
</html>

