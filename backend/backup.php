if($tabela == "Livro") {
      //Resgatar dados de um livro especifico
      if($acao == "infoLivro") {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Livro WHERE id_livro = " . $id;
        $results = $mysqli_connection->query($sql);    
        
        while($row = $results->fetch_assoc()) {
            $editora["nome"] = $row["nome"];
        }
      }

      //Resgatar dados de todos livros
      /*if($acao == "listaLivro") {
        $results = $mysqli_connection->query("SELECT * FROM Livros ORDER BY titulo ASC");   
      
        $livros = array();
        $i=0;

        while($row = $results->fetch_assoc()) {
          $autores = array();
          $i=0;
          $sql = "SELECT nome FROM Autor INNER JOIN Autor_Livro ON Autor.id_autor = Autor_Livro.id_autor  WHERE id_livro = " . $row["id_livro"];
          $autoresResults = $mysqli_connection->query($sql);
          while($r = $autoresResults->fetch_assoc()) {
            $autores[$i] = $r["nome"];
            $i++;
          }

          $sql = "SELECT nome FROM Editora INNER JOIN Livro ON Editora.id_editora = Livro.id_editora WHERE id_livro = " . $row["id_livro"];
          $editoraResult = $mysqli_connection->query($sql);
          while($r = $editoraResult->fetch_assoc()) {
            $editora = $r["nome"];
          }

          $livros[$i] = array(
            'id_livro' => $row['id_livro'],
            'titulo' => $row['titulo'],
            'idioma' => $row['idioma'],
            'n_paginas' => $row['n_paginas'],
            'faixa_etaria' => $row['faixa_etaria'],
            'ano' => $row['ano'],
            'id_editora' => $row['id_editora'],
            'editora' => $editora,
            'autores' => $autores       
          );

          $i++;
        }

      }*/
    }    


//
echo '<a href="../index.php?acao=listaAutor">AQUII</a><br/>';
      echo '<a href="./index.php?acao=listaAutor">AQUII2</a><br/>';
      echo '<a href="././index.php?acao=listaAutor">AQUII3</a><br/>';

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
  <!-- Menu -->
  <?php include "menu.html"; ?>

  <!-- Conteudo Principal -->
  <main class="flex-shrink-0">
    <div class="container mt-5">
      <?php
        if(count($_GET)>0) {
          $msg = $_COOKIE['mensagem'];
          if(!empty($msg)) {
      ?>
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
          <strong>Notificacao: </strong><?php echo $msg; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
          }
          $url = "listas/". $_GET['acao'] . ".php";
          include $url;
        } else {
      ?>
    
      <h1 class="mt-5">Biblioteca</h1>
      <p class="lead">Aqui voce encontra os livros mais falados do momento!</p>
      <p>Cadastra-se e usufrua dos beneficios!</p>

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


