<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Meus Agendamentos</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/cadastro.css" />
    <link rel="icon" href="/img/icon.ico" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
    </style>
</head>
<body>
<header>
    <img class="logo" src="/img/malamslogo.png" alt="logo" />
    <nav>
        <ul>
            <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
            <li><a class="nav-links" href="{{ url('/agendamentos/create') }}">Agendamento</a></li>
            <li><a class="nav-links" href="{{ url('/home') }}#sobre">Sobre</a></li>
        </ul>
    </nav>

    <div class="header-right menu-direita">
        @guest
            <div class="social-icons">
                <a class="cadastre-se" href="{{ url('/cadastro') }}">Cadastre-se</a>
                <a class="login" href="{{ url('/login') }}">Login</a>
            </div>
        @endguest

        @auth
            <div class="perfil-menu">
                <img src="/img/perfil.jpg" alt="Perfil" class="perfil-foto" onclick="toggleMenu()" />
                <div class="menu-dropdown" id="menuDropdown">
                    <a href="{{ url('/perfil-cliente') }}" class="link-animado">Meu perfil</a>
                    <a href="{{ url('/agendamentos') }}" class="link-animado">Meus agendamentos</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="link-animado">Sair</a>
                </div>
            </div>
        @endauth
    </div>
</header>

<main class="flex-grow flex justify-center items-center p-6">
    <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-[0_6px_20px_rgba(0,0,0,0.4)] p-10 max-w-6xl w-full font-['Rubik',sans-serif]">
        <h2 class="text-4xl font-semibold text-[#d19f9f] mb-10 text-center">Meus Agendamentos</h2>

        {{-- AGENDAMENTOS ATIVOS --}}
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Agendamentos Ativos</h3>
        @if ($agendamentosAtivos->isEmpty())
            <p class="text-gray-700 mb-8">Você não possui agendamentos ativos no momento.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach ($agendamentosAtivos as $agendamento)
                   <div class="bg-white border-2 border-[#d19f9f] rounded-2xl shadow-md hover:shadow-[0_6px_20px_rgba(0,0,0,0.3)] transform hover:scale-[1.03] transition-all duration-300 p-6">
                        <h3 class="text-xl font-semibold text-[#000] mb-2">{{ $agendamento->servico->servico }}</h3>
                        <p><span class="font-medium">Data:</span> {{ \Carbon\Carbon::parse($agendamento->dataAgendamento)->format('d/m/Y') }}</p>
                        <p><span class="font-medium">Horário:</span> {{ $agendamento->hora }}</p>
                        <p><span class="font-medium">Funcionário:</span> {{ $agendamento->funcionario->nomeFuncionario }}</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @if ($agendamento->confirmacao === 'sim')
                                <span class="text-green-600 font-semibold">Confirmado</span>
                            @else
                                <form id="confirmar-form-{{ $agendamento->idAgendamento }}" action="{{ route('agendamentos.confirmar', $agendamento->idAgendamento) }}" method="POST">
                                    @csrf
                                    <button type="button" onclick="confirmarAgendamento({{ $agendamento->idAgendamento }})" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-xl text-sm">
                                        Confirmar
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('agendamentos.destroy', $agendamento->idAgendamento) }}" method="POST" onsubmit="return confirmarCancelamento(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-xl text-sm">
                                    Cancelar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- AGENDAMENTOS FINALIZADOS --}}
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Agendamentos Finalizados</h3>
        @if ($agendamentosFinalizados->isEmpty())
            <p class="text-gray-700">Você ainda não possui agendamentos finalizados.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($agendamentosFinalizados as $agendamento)
                    <div class="bg-gray-100 rounded-2xl shadow-inner p-6">
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $agendamento->servico->servico }}</h3>
                        <p><span class="font-medium">Data:</span> {{ \Carbon\Carbon::parse($agendamento->dataAgendamento)->format('d/m/Y') }}</p>
                        <p><span class="font-medium">Horário:</span> {{ $agendamento->hora }}</p>
                        <p><span class="font-medium">Funcionário:</span> {{ $agendamento->funcionario->nomeFuncionario }}</p>
                        <span class="text-gray-600 font-semibold block mt-4">Status: Finalizado</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</main>

<footer style="background:#c59595; color:white; padding:20px; display:flex; justify-content:center; gap:80px; font-family: 'Rubik', sans-serif;">
    <div style="display:flex; align-items:center; gap:15px; text-align:center;">
        <img src="/img/contato.jpg" alt="Contato" style="width:60px; height:60px; border-radius:8px; object-fit:cover;" />
        <div>
            <h3 style="margin:0 0 6px 0; font-weight:700; font-size:1.3rem;">Contato</h3>
            <p style="margin:0; font-size:1.1rem;">@eteccamargoaranha</p>
            <p style="margin:2px 0 0 0; font-size:1.1rem;">@n3rds.ca</p>
        </div>
    </div>

    <div style="display:flex; align-items:center; gap:15px; text-align:center;">
        <img src="/img/localizacao.png" alt="Localização" style="width:60px; height:60px; border-radius:8px; object-fit:cover;" />
        <div>
            <h3 style="margin:0 0 6px 0; font-weight:700; font-size:1.3rem;">Localização</h3>
            <p style="margin:0; font-size:1.1rem;">R. Marcial, 25 - Mooca, São Paulo</p>
        </div>
    </div>
</footer>

<script>
    function toggleMenu() {
        document.getElementById("menuDropdown").classList.toggle("show");
    }

    document.addEventListener('click', function(event) {
        const menu = document.getElementById("menuDropdown");
        const foto = document.querySelector('.perfil-foto');
        if (!menu.contains(event.target) && !foto.contains(event.target)) {
            menu.classList.remove('show');
        }
    });

    function confirmarCancelamento(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Deseja cancelar este agendamento?',
            text: 'Essa ação não poderá ser desfeita.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sim, cancelar',
            cancelButtonText: 'Voltar'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }

    function confirmarAgendamento(idAgendamento) {
        Swal.fire({
            title: 'Deseja confirmar este agendamento?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sim, confirmar',
            cancelButtonText: 'Voltar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`confirmar-form-${idAgendamento}`).submit();
            }
        });
    }

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Erro(s) no formulário',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonText: 'Ok'
        });
    @endif

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Ok'
        });
    @endif
</script>
</body>
</html>
