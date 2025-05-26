@extends('layouts.admin')

@section('content')
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif


<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-5xl font-extrabold text-black mb-10 tracking-wide">Agendar Serviço</h1>

    <form action="{{ route('admin.agendas.store') }}" method="POST"
        class="bg-white rounded-2xl p-10 transition-shadow duration-300 ease-in-out"
        style="box-shadow: 0 4px 20px rgba(217, 176, 176, 0.4);"
        onmouseover="this.style.boxShadow='0 8px 32px rgba(217, 176, 176, 0.6)'"
        onmouseout="this.style.boxShadow='0 4px 20px rgba(217, 176, 176, 0.4)'"
    >
        @csrf

        <!-- Buscar Cliente -->
        <div class="mb-8 relative">
            <label for="cliente_email" class="block text-lg font-semibold text-black mb-2">Buscar cliente (e-mail)</label>
            <input type="text" id="cliente_email" name="cliente_email" autocomplete="off"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg placeholder-[#000] focus:outline-none transition"
                placeholder="Digite o e-mail do cliente"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                required
            >
            <div id="resultados-clientes" class="resultados absolute z-20 bg-white w-full rounded-lg border border-[#d9b0b0] max-h-48 overflow-auto mt-1 shadow-lg"></div>
            <input type="hidden" name="user_id" id="user_id">
            <p id="cliente_nome" class="mt-2 font-semibold text-black hidden"></p>
        </div>

        <!-- Categoria -->
        <div class="mb-8">
            <label for="categoriaSelect" class="block text-lg font-semibold text-black mb-2">Categoria</label>
            <select id="categoriaSelect" name="idCategoria"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                disabled required
            >
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
        </div>

        <!-- Serviço -->
        <div class="mb-8">
            <label for="servicoSelect" class="block text-lg font-semibold text-black mb-2">Serviço</label>
            <select id="servicoSelect" name="idServico"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                disabled required
            >
                <option value="">Selecione um serviço</option>
            </select>
        </div>

        <!-- Preço e Duração -->
        <div id="infoServico" class="mb-8 text-black font-medium hidden">
            <p><strong>Preço:</strong> R$ <span id="preco"></span></p>
            <p><strong>Duração:</strong> <span id="duracao"></span> min</p>
        </div>

        <!-- Funcionário -->
        <div class="mb-8">
            <label for="funcionarioSelect" class="block text-lg font-semibold text-black mb-2">Funcionário</label>
            <select id="funcionarioSelect" name="idFuncionario"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                disabled required
            >
                <option value="">Selecione um funcionário</option>
            </select>
        </div>

        <!-- Data -->
        <div class="mb-8">
            <label for="dataInput" class="block text-lg font-semibold text-black mb-2">Data</label>
            <input type="date" id="dataInput" name="dataAgendamento"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                required min="{{ date('Y-m-d') }}"
                disabled
            >
        </div>

        <!-- Hora -->
        <div class="mb-8">
            <label for="horaSelect" class="block text-lg font-semibold text-black mb-2">Hora</label>
            <select id="horaSelect" name="hora"
                class="w-full rounded-lg border px-6 py-4 text-black text-lg focus:outline-none transition"
                style="border-color:#d9b0b0;"
                onfocus="this.style.borderColor='#b88f8f'; this.style.boxShadow='0 0 10px #d9b0b0';"
                onblur="this.style.borderColor='#d9b0b0'; this.style.boxShadow='none';"
                disabled required
            >
                <option value="">Selecione uma data e funcionário</option>
            </select>
        </div>

        <!-- Botões -->
        <div class="flex justify-end space-x-6 mt-12">
            <a href="{{ route('admin.agendas.index') }}" 
               class="px-10 py-4 rounded-lg font-semibold bg-gray-700 text-white hover:bg-gray-800 transition"
            >
                Cancelar
            </a>
            <button type="submit"
                class="px-10 py-4 rounded-lg font-semibold bg-blue-600 text-white shadow-md hover:bg-blue-700 transition"
            >
                Agendar
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const clienteEmailInput = document.getElementById('cliente_email');
  const resultadosClientesDiv = document.getElementById('resultados-clientes');
  const clienteNomeP = document.getElementById('cliente_nome');
  const userIdInput = document.getElementById('user_id');

  const categoriaSelect = document.getElementById('categoriaSelect');
  const servicoSelect = document.getElementById('servicoSelect');
  const funcionarioSelect = document.getElementById('funcionarioSelect');
  const dataInput = document.getElementById('dataInput');
  const horaSelect = document.getElementById('horaSelect');
  const infoDiv = document.getElementById('infoServico');
  const precoSpan = document.getElementById('preco');
  const duracaoSpan = document.getElementById('duracao');

  let duracaoServico = 0;

  // Funções para resetar selects
  function resetServico() {
    servicoSelect.innerHTML = '<option value="">Selecione um serviço</option>';
    servicoSelect.disabled = true;
    infoDiv.classList.add('hidden');
    precoSpan.textContent = '';
    duracaoSpan.textContent = '';
    duracaoServico = 0;
  }
  function resetFuncionario() {
    funcionarioSelect.innerHTML = '<option value="">Selecione um funcionário</option>';
    funcionarioSelect.disabled = true;
  }
  function resetData() {
    dataInput.value = '';
    dataInput.disabled = true;
  }
  function resetHora() {
    horaSelect.innerHTML = '<option value="">Selecione uma data e funcionário</option>';
    horaSelect.disabled = true;
  }

  // Buscar clientes enquanto digita no campo de e-mail
  clienteEmailInput.addEventListener('input', async () => {
    const query = clienteEmailInput.value.trim();

    userIdInput.value = '';
    clienteNomeP.textContent = '';
    clienteNomeP.classList.add('hidden');

    if (query.length < 3) {
      resultadosClientesDiv.innerHTML = '';
      return;
    }

    try {
      const res = await fetch(`/admin/buscar-clientes?email=${encodeURIComponent(query)}`);
      if (!res.ok) throw new Error('Erro ao buscar clientes');
      const clientes = await res.json();

      resultadosClientesDiv.innerHTML = '';

      if (clientes.length === 0) {
        resultadosClientesDiv.innerHTML = '<p class="p-2 text-gray-500">Nenhum cliente encontrado.</p>';
        return;
      }

      clientes.forEach(cliente => {
        const div = document.createElement('div');
        div.textContent = `${cliente.nome} (${cliente.email})`;
        div.classList.add('p-2', 'cursor-pointer', 'hover:bg-gray-200');
        div.addEventListener('click', () => {
          clienteEmailInput.value = cliente.email;
          userIdInput.value = cliente.id;
          clienteNomeP.textContent = cliente.nome;
          clienteNomeP.classList.remove('hidden');
          resultadosClientesDiv.innerHTML = '';

          // Agora habilita categoria após cliente selecionado
          categoriaSelect.disabled = false;
        });
        resultadosClientesDiv.appendChild(div);
      });

    } catch (e) {
      console.error(e);
      resultadosClientesDiv.innerHTML = '<p class="p-2 text-red-500">Erro ao buscar clientes.</p>';
    }
  });

  // Quando muda categoria, carregar serviços
  categoriaSelect.addEventListener('change', async () => {
    resetServico();
    resetFuncionario();
    resetData();
    resetHora();

    if (!categoriaSelect.value) {
      categoriaSelect.disabled = false;
      servicoSelect.disabled = true;
      funcionarioSelect.disabled = true;
      dataInput.disabled = true;
      horaSelect.disabled = true;
      return;
    }

    try {
      const res = await fetch(`/admin/get-servicos/${categoriaSelect.value}`);
      if (!res.ok) throw new Error('Erro ao buscar serviços');
      const servicos = await res.json();

      servicoSelect.innerHTML = '<option value="">Selecione um serviço</option>';
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
    resetData();
    resetHora();
    infoDiv.classList.add('hidden');

    const selected = servicoSelect.options[servicoSelect.selectedIndex];
    if (!selected || !selected.value) {
      return;
    }

    precoSpan.textContent = selected.dataset.preco;
    duracaoServico = parseInt(selected.dataset.duracao) || 0;
    duracaoSpan.textContent = duracaoServico;
    infoDiv.classList.remove('hidden');

    try {
      const res = await fetch(`/admin/get-funcionarios/${selected.value}`);
      if (!res.ok) throw new Error('Erro ao buscar funcionários');
      const funcionarios = await res.json();

      funcionarioSelect.innerHTML = '<option value="">Selecione um funcionário</option>';
      funcionarios.forEach(f => {
        const opt = document.createElement('option');
        opt.value = f.idFuncionario;
        opt.textContent = f.nomeFuncionario;
        funcionarioSelect.appendChild(opt);
      });

      funcionarioSelect.disabled = false;
    } catch (e) {
      console.error(e);
    }
  });

  // Quando muda funcionário, habilitar campo data
  funcionarioSelect.addEventListener('change', () => {
    resetData();
    resetHora();

    if (funcionarioSelect.value) {
      dataInput.disabled = false;
    } else {
      dataInput.disabled = true;
      horaSelect.disabled = true;
    }
  });

  // Limitar seleção de data para dias úteis e carregar horários
  dataInput.addEventListener('input', () => {
    const date = new Date(dataInput.value + 'T00:00');
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

  // Carregar horários disponíveis conforme funcionário, data e serviço
  async function carregarHorariosDisponiveis() {
    horaSelect.innerHTML = '<option value="">Carregando...</option>';
    horaSelect.disabled = true;

    const idFuncionario = funcionarioSelect.value;
    const dataAgendamento = dataInput.value;
    const idServico = servicoSelect.value;

    if (!idFuncionario || !dataAgendamento || !idServico) return;

    try {
      const res = await fetch(`/admin/get-horarios-disponiveis?idFuncionario=${idFuncionario}&dataAgendamento=${dataAgendamento}&idServico=${idServico}`);
      if (!res.ok) throw new Error('Erro ao buscar horários');
      const horariosDisponiveis = await res.json();

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

  // Inicialização: desabilitar selects que dependem do cliente
  categoriaSelect.disabled = true;
  resetServico();
  resetFuncionario();
  resetData();
  resetHora();

});
</script>


@endsection
