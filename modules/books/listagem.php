<?php 
  //conecta BD
  require('../../modules/conectaBD.php');

  //Obter dados
  if(count($_GET)>0) {
    $tabela = $_GET['tabela'];
    $acao = $_GET['acao'];
  
  
    if($tabela == "Autor") {
      //Resgatar dados de um autor especifico
      if($acao == "infoAutor") {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM Autor WHERE id_autor = " . $id;
        $results = $mysqli_connection->query($sql);    
        
        while($row = $results->fetch_assoc()) {
          $autor["nome"] = $row["nome"];
          $autor["data_nasc"] = $row["data_nasc"];
        }
      }
    }
    
    //Resgatar dados de todos autores
    if($acao == "listaAutor" || $acao == 'cadastroLivro' || $acao == 'infoLivro') {
      $results = $mysqli_connection->query("SELECT * FROM Autor ORDER BY nome ASC");   
    
      $autores = array();
      //captura linha a linha da selecao
      $i=0;
      while($row = $results->fetch_assoc()) {
        $autores[$i] = array(
        'id_autor' => $row['id_autor'],
        'nome' => $row['nome'],
        'data_nasc' => $row['data_nasc']);
        $i++;
      }
    }

    if($tabela == "Editora") {
      //Resgatar dados de uma editora especifica
      if($acao == "infoEditora") {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Editora WHERE id_editora = " . $id;
        $results = $mysqli_connection->query($sql);    
        
        while($row = $results->fetch_assoc()) {
            $editora["nome"] = $row["nome"];
        }
      }
    }

    //Resgatar dados de todas editoras
    if($acao == "listaEditora" || $acao == 'cadastroLivro' || $acao == 'infoLivro') {
      $results = $mysqli_connection->query("SELECT * FROM Editora ORDER BY nome ASC");   
    
      $editoras = array();
      $i=0;
      while($row = $results->fetch_assoc()) {
        $editoras[$i] = array(
        'id_editora' => $row['id_editora'],
        'nome' => $row['nome']);
        $i++;
      }
    }

    if($tabela == "Livro") {
      //Resgatar dados de um livro especifico
      if($acao == "infoLivro") {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Livro WHERE id_livro = " . $id;
        $results = $mysqli_connection->query($sql);   
        
        $sql = "SELECT nome, Autor.id_autor as 'id_autor' FROM Autor INNER JOIN Autor_Livro 
          ON Autor.id_autor = Autor_Livro.id_autor WHERE id_livro = " . $id;
        $autoresResults = $mysqli_connection->query($sql);
        $autoresSel = array();
        while($r = $autoresResults->fetch_assoc()) {
          $autoresSel[$j] = array('nome' => $r["nome"], 'id_autor' => $r['id_autor']);
          $j++;
        }

        $sql = "SELECT nome FROM Editora INNER JOIN Livro ON Editora.id_editora = Livro.id_editora WHERE id_livro = " . $id;
        $editoraResult = $mysqli_connection->query($sql);
        while($r = $editoraResult->fetch_assoc()) {
          $editora = $r["nome"];
        }
        
        while($row = $results->fetch_assoc()) {
          $livro = array(
            'id_livro' => $row['id_livro'],
            'titulo' => $row['titulo'],
            'idioma' => $row['idioma'],
            'n_paginas' => $row['n_paginas'],
            'faixa_etaria' => $row['faixa_etaria'],
            'ano' => $row['ano'],
            'id_editora' => $row['id_editora'],
            'editora' => $editora,
            'autoresSel' => $autoresSel
          );
        }
      }

      //Resgatar dados de todos livros
      if($acao == "listaLivro") {
        $results = $mysqli_connection->query("SELECT * FROM Livro ORDER BY titulo ASC");   
      
        $livros = array();
        $i=0;

        while($row = $results->fetch_assoc()) {
          $autores = array();
          $j=0;

          $sql = "SELECT nome, Autor.id_autor as 'id_autor' FROM Autor INNER JOIN Autor_Livro 
          ON Autor.id_autor = Autor_Livro.id_autor WHERE id_livro = " . $row["id_livro"];
          $autoresResults = $mysqli_connection->query($sql);
          while($r = $autoresResults->fetch_assoc()) {
            $autores[$j] = array('nome' => $r["nome"], 'id_autor' => $r['id_autor']);
            $j++;
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
      }
    }    
  }

  //fechar conexão com banco de dados
  $mysqli_connection->close();
?>
