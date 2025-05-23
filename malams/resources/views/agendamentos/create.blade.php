<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviço</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/cadastro.css">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

<main class="flex-grow flex justify-center items-center p-6">
  <form
    id="agendamentoForm"
    method="POST"
    action="{{ route('agendamentos.store') }}"
    class="bg-white/90 backdrop-blur-md rounded-2xl shadow-[0_6px_20px_rgba(0,0,0,0.4)] p-10 max-w-xl w-full flex flex-col gap-6 font-['Rubik',sans-serif]"
  >
    @csrf

    <h2 class="text-4xl font-semibold text-[#d19f9f] mb-6 text-center">Agendamento de Serviço</h2>

    <!-- Categoria -->
    <label class="flex flex-col text-[#000] font-semibold text-lg">
      Categoria
      <select name="idCategoria" id="categoriaSelect" class="mt-1 p-3 rounded-xl border border-[#d19f9f]" required>
        <option value="">Selecione...</option>
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
        @endforeach
      </select>
    </label>

    <!-- Serviço -->
    <label class="flex flex-col text-[#000] font-semibold text-lg">
      Serviço
      <select name="idServico" id="servicoSelect" class="mt-1 p-3 rounded-xl border border-[#d19f9f]" disabled required>
        <option value="">Selecione...</option>
      </select>
    </label>

    <!-- Preço e duração -->
    <div id="infoServico" class="text-[#000] font-medium hidden">
      <p><strong>Preço:</strong> R$ <span id="preco"></span></p>
      <p><strong>Duração:</strong> <span id="duracao"></span> min</p>
    </div>

    <!-- Funcionário -->
    <label class="flex flex-col text-[#000] font-semibold text-lg">
      Funcionário
      <select name="idFuncionario" id="funcionarioSelect" class="mt-1 p-3 rounded-xl border border-[#d19f9f]" disabled required>
        <option value="">Selecione...</option>
      </select>
    </label>

    <!-- Data -->
    <label class="flex flex-col text-[#000] font-semibold text-lg">
      Data
      <input
        type="date"
        name="dataAgendamento"
        id="dataInput"
        class="mt-1 p-3 rounded-xl border border-[#d19f9f] focus:outline-none focus:ring-2 focus:ring-[#c59595]"
        required
        min="{{ date('Y-m-d') }}"
      />
    </label>

    <!-- Hora -->
    <label class="flex flex-col text-[#000] font-semibold text-lg">
      Hora
      <select name="hora" id="horaSelect" class="mt-1 p-3 rounded-xl border border-[#d19f9f]" disabled required>
        <option value="">Selecione uma data e funcionário</option>
      </select>
    </label>

    <!-- Botão -->
    <button
      type="submit"
      class="mt-6 bg-[#cda1a1] text-white font-semibold py-4 rounded-xl shadow-md hover:bg-[#c48d8d] transition"
    >
      Agendar
    </button>
  </form>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const categoriaSelect = document.getElementById('categoriaSelect');
    const servicoSelect = document.getElementById('servicoSelect');
    const funcionarioSelect = document.getElementById('funcionarioSelect');
    const dataInput = document.getElementById('dataInput');
    const horaSelect = document.getElementById('horaSelect');
    const infoDiv = document.getElementById('infoServico');
    const precoSpan = document.getElementById('preco');
    const duracaoSpan = document.getElementById('duracao');

    // Armazenar duração do serviço selecionado em minutos
    let duracaoServico = 0;

    // Reset campos
    function resetServico() {
      servicoSelect.innerHTML = '<option value="">Selecione...</option>';
      servicoSelect.disabled = true;
      infoDiv.classList.add('hidden');
      precoSpan.textContent = '';
      duracaoSpan.textContent = '';
      duracaoServico = 0;
    }
    function resetFuncionario() {
      funcionarioSelect.innerHTML = '<option value="">Selecione...</option>';
      funcionarioSelect.disabled = true;
    }
    function resetHora() {
      horaSelect.innerHTML = '<option value="">Selecione uma data e funcionário</option>';
      horaSelect.disabled = true;
    }

    // Limitar seleção de data para dias úteis (segunda a sexta)
    dataInput.addEventListener('input', () => {
      const date = new Date(dataInput.value + 'T00:00'); // timezone safe
      const day = date.getDay();
      if (day === 0 || day === 6) {
        alert('Por favor, escolha um dia útil (segunda a sexta).');
        dataInput.value = '';
        resetHora();
        return;
      }
      if (funcionarioSelect.value) {
        carregarHorariosDisponiveis();
      }
    });

    // Quando muda categoria, carregar serviços
    categoriaSelect.addEventListener('change', async () => {
      resetServico();
      resetFuncionario();
      resetHora();
      if (!categoriaSelect.value) return;

      try {
        const res = await fetch(`/get-servicos/${categoriaSelect.value}`);
        if (!res.ok) throw new Error('Erro ao buscar serviços');
        const servicos = await res.json();

        servicos.forEach(s => {
          const opt = document.createElement('option');
          opt.value = s.idServico;
          opt.textContent = s.servico;
          opt.dataset.preco = s.preco;
          const [h, m] = s.duracao.split(':');
          opt.dataset.duracao = parseInt(h) * 60 + parseInt(m);
          servicoSelect.appendChild(opt);
        });
        servicoSelect.disabled = false;
      } catch (e) {
        console.error(e);
      }
    });

    // Quando muda serviço, mostrar info e carregar funcionários
    servicoSelect.addEventListener('change', async () => {
      resetFuncionario();
      resetHora();
      infoDiv.classList.add('hidden');

      const selected = servicoSelect.options[servicoSelect.selectedIndex];
      if (!selected || !selected.value) return;

      precoSpan.textContent = selected.dataset.preco;
      duracaoServico = parseInt(selected.dataset.duracao) || 0;
      duracaoSpan.textContent = duracaoServico;
      infoDiv.classList.remove('hidden');

      try {
        const res = await fetch(`/get-funcionarios/${selected.value}`);
        if (!res.ok) throw new Error('Erro ao buscar funcionários');
        const funcionarios = await res.json();

        funcionarios.forEach(f => {
          const opt = document.createElement('option');
          opt.value = f.idFuncionario;
          opt.textContent = f.nomeFuncionario; // ajuste se for outro campo
          funcionarioSelect.appendChild(opt);
        });
        funcionarioSelect.disabled = false;
      } catch (e) {
        console.error(e);
      }
    });

async function carregarHorariosDisponiveis() {
  horaSelect.innerHTML = '<option value="">Carregando...</option>';
  horaSelect.disabled = true;

  const idFuncionario = funcionarioSelect.value;
  const dataAgendamento = dataInput.value;
  const idServico = servicoSelect.value; // pegar o serviço selecionado para passar a duração

  if (!idFuncionario || !dataAgendamento || !idServico) return;

  try {
    const response = await fetch(`/get-horarios-disponiveis?idFuncionario=${idFuncionario}&dataAgendamento=${dataAgendamento}&idServico=${idServico}`);
    if (!response.ok) throw new Error('Erro ao buscar horários');
    const horariosDisponiveis = await response.json();

    if (horariosDisponiveis.length === 0) {
      horaSelect.innerHTML = '<option value="">Nenhum horário disponível</option>';
      horaSelect.disabled = true;
      return;
    }

    horaSelect.innerHTML = '<option value="">Selecione...</option>';
    horariosDisponiveis.forEach(hora => {
      const opt = document.createElement('option');
      opt.value = hora;
      opt.textContent = hora;
      horaSelect.appendChild(opt);
    });
    horaSelect.disabled = false;

  } catch (e) {
    console.error(e);
    horaSelect.innerHTML = '<option value="">Erro ao carregar horários</option>';
    horaSelect.disabled = true;
  }
}
});
</script>


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
            <p style="margin:0; font-size:1.1rem;">R. Marcial, 25 - Mooca, São Paulo </p>
        </div>
    </div>
</footer>

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

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#c59595' // dourado claro
        });
    </script>
@endif

</body> 
</html> 