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