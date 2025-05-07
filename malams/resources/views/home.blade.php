<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Malams Saloon</title>
  <link rel="stylesheet" href="/css/home.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="icon" href="/img/icon.ico" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Merriweather:opsz,wght@18..144,900&family=Rubik:ital,wght@0,605;1,605&display=swap');
  </style>
</head>
<body class="bg-white text-gray-800">

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
      <img src="/img/facebook.png" alt="Facebook">
      <img src="/img/instagram.png" alt="Instagram">
      <a class="cadastre-se" href="/teste">Cadastre-se</a>
      <a class="login" href="{{ url('/login') }}">Login</a>
    </div>
  </header>

  <main class="p-4">
    <section class="text-center my-8">
      <h4 class="text-2xl font-bold mb-2">Bem-vindo(a) ao Malams Saloon</h4>
      <p class="mb-4">Veja abaixo tudo o que preparamos para cuidar de você.</p>
      <button class="px-6 py-2 bg-pink-600 text-white rounded-full hover:bg-pink-700">Começar</button>
    </section>

    <!-- Botões de Categoria -->
    <div class="text-center my-6">
      <h2 class="text-xl font-semibold mb-4">Escolha a categoria de sua preferência</h2>
      <div class="flex justify-center space-x-6">
        <button onclick="mostrarCards('cabelereiro')" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Cabelo</button>
        <button onclick="mostrarCards('unhas')" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Unhas</button>
        <button onclick="mostrarCards('estetica')" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Estética</button>
      </div>
    </div>

    <!-- Cabelo -->
    <div id="cards-cabelereiro" class="card-cabelereiro flex flex-wrap justify-center gap-6 hidden">
      <div class="card">
        <img src="/img/corte.jpg" alt="Corte">
        <h3>Corte</h3>
        <strong>Tempo:</strong> 1 hora<br>
        <strong>Preço:</strong> R$ 80,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/tintura.jpg" alt="Tintura">
        <h3>Tintura</h3>
        <strong>Tempo:</strong> 1h30<br>
        <strong>Preço:</strong> R$ 120,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/escova.jpg" alt="Escova">
        <h3>Escova</h3>
        <strong>Tempo:</strong> 30 minutos<br>
        <strong>Preço:</strong> R$ 50,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
    </div>

    <!-- Unhas -->
    <div id="cards-unhas" class="card-unhas flex flex-wrap justify-center gap-6 hidden">
      <div class="card">
        <img src="/img/manicure.jpg" alt="Manicure">
        <h3>Manicure</h3>
        <strong>Tempo:</strong> 30 minutos<br>
        <strong>Preço:</strong> R$ 30,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/pedicures.jpg" alt="Pedicure">
        <h3>Pedicure</h3>
        <strong>Tempo:</strong> 40 minutos<br>
        <strong>Preço:</strong> R$ 30,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/unhascompletas.jpg" alt="Manicure + Pedicure">
        <h3>Manicure + Pedicure</h3>
        <strong>Tempo:</strong> 1h20<br>
        <strong>Preço:</strong> R$ 55,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
    </div>

    <!-- Estética -->
    <div id="cards-estetica" class="card-estetica flex flex-wrap justify-center gap-6 hidden">
      <div class="card">
        <img src="/img/cilios.jpg" alt="Cílios">
        <h3>Extensão de Cílios</h3>
        <strong>Tempo:</strong> 2 horas<br>
        <strong>Preço:</strong> R$ 100,00
        <p>Tenha cílios volumosos, longos e elegantes. Trabalhamos com extensões variadas.</p>
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/sombrancelha.jpg" alt="Sombrancelha">
        <h3>Design de Sombrancelhas</h3>
        <strong>Tempo:</strong> 1h20<br>
        <strong>Preço:</strong> R$ 50,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
      <div class="card">
        <img src="/img/limpezaPele.jpg" alt="Limpeza de Pele">
        <h3>Limpeza de Pele</h3>
        <strong>Tempo:</strong> 1 hora<br>
        <strong>Preço:</strong> R$ 70,00
        <a href="#" class="btn-agendar">Agendar agora</a>
      </div>
    </div>
  </main>

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

  <!-- Script -->
  <script>
    function mostrarCards(tipo) {
      const categorias = ['cabelereiro', 'unhas', 'estetica'];
      categorias.forEach(cat => {
        document.getElementById('cards-' + cat).classList.add('hidden');
      });
      document.getElementById('cards-' + tipo).classList.remove('hidden');
    }
  </script>
</body>
</html>
