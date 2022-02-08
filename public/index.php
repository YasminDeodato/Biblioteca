<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Icones -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <title>Biblioteca</title>
</head>
<body>
  <!-- Menu -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBotao" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarBotao">
        <a class="navbar-brand" href="index.php"><span class="material-icons align-middle">bookmark</span>Biblioteca</a>
          <ul class="navbar-nav gap-3">
            <li class="nav-item">
              <a href="../pages/cliente/login/login.php"><button type="submit" class="btn btn-warning btn-sm">Acesso ao Sistema</button></a>
            </li>
            <li class="nav-item">
              <a href="../pages/funcionario/login.php"><button type="submit" class="btn btn-primary btn-sm"><span class="material-icons align-middle fs-6">lock</span> Area dos Funcionarios</button></a>
            </li>
          </ul>
      </div>
    </div>
  </nav>


  <!-- Conteudo Principal -->
  <main class="flex-shrink-0">
    <div class="container gx-2">
      <div class="row d-flex align-items-center">
          <div class="col-md-5 col-auto">
            <h1 class="mt-5">Biblioteca</h1>
            <p class="lead">Aqui voce encontra os livros mais falados do momento!</p>
            <h5>Cadastre-se e usufrua dos beneficios!</h5>
            <div class="col my-4 col-auto">
                  <a href="../pages/cliente/login/login.php?acao=cadastro"><button type="submit" class="btn btn-warning">Come&ccedil;e agora mesmo!</button></a>
            </div>
          </div>
          <div class="col-md-7 col-auto mt-4 pl-4">
            <div class="text-center"><img class="img-fluid" src="assets/imgs/book.png" alt="Livro Laranja aberto"></img></div>
          </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>                                		                            