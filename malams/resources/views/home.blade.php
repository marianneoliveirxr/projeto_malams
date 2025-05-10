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
        <li><a class="nav-links" href="{{ url('/home') }}">Home</a></li>
        <li><a class="nav-links" href="#">Serviços</a></li>
        <li><a class="nav-links" href="#">Contato</a></li>
        <li><a class="nav-links" href="#">Sobre</a></li>
      </ul>
    </nav>
    <div class="social-icons">
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


  </main>

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
