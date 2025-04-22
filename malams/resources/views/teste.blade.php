<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Página Responsiva</title>
</head>
<body>
  <!-- Navbar Responsiva -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Meu Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Conteúdo Principal -->
  <div class="container my-5">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <img src="image.jpg" class="card-img-top img-fluid" alt="Imagem Responsiva">
          <div class="card-body">
            <h5 class="card-title">Título da Card</h5>
            <p class="card-text">Algum conteúdo de exemplo para este card.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <img src="image.jpg" class="card-img-top img-fluid" alt="Imagem Responsiva">
          <div class="card-body">
            <h5 class="card-title">Título da Card</h5>
            <p class="card-text">Algum conteúdo de exemplo para este card.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
          <img src="image.jpg" class="card-img-top img-fluid" alt="Imagem Responsiva">
          <div class="card-body">
            <h5 class="card-title">Título da Card</h5>
            <p class="card-text">Algum conteúdo de exemplo para este card.</p>
            <p href="/welcome.blade.php">Clique Aqui</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
