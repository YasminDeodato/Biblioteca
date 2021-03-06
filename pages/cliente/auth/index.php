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
	
  <title>Biblioteca</title>
</head>
<body>
  <?php 
    include("../login/autentica.php");
    include_once "../../common/menu-cliente.html"; 
  ?>

<!-- Conteudo Principal -->
<main class="flex-shrink-0">
  <div class="container mt-5">
      <?php
          if(count($_GET)>0) {
            if(!empty($_GET['sub'])) $url = 'reserva/';
            else include_once "../../common/notificacao.php"; 
            
              $url .= $_GET['acao'] . ".php";
              include_once($url);
          } else {
      ?>
        <h1 class="mt-5">Bem vinde ao sistema, <?php  echo $_SESSION["nome"]; ?></h1>
        <p class="lead">Aqui voce encontra os livros mais falados do momento!</p>
      <?php
          }
      ?>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>                                		                            