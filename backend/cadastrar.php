<?php 
  //conecta BD
  require('conectaBD.php');

  //Obter dados
  if(count($_POST)>0) { 
    $tabela = $_POST['tabela'];
    
    if($tabela == 'Autor') {
      $nome = $_POST['nome'];
      $data_nasc = $_POST['data_nasc'] . '';

      echo 'Nome: ' .$nome . ' | Data Nasc.: ' .$data_nasc;
      
      $stmt = $mysqli_connection->prepare("INSERT INTO Autor(nome, data_nasc) VALUES (?, ?)");
      $stmt->bind_param('ss', $nome, date($data_nasc));
      $stmt->execute();
      $newID = $stmt->insert_id;

      redirect("../index.php?acao=listaAutor");
    }

    if($tabela == 'Editora') {
      $nome = $_POST['nome'];

      $stmt = $mysqli_connection->prepare("INSERT INTO Editora(nome) VALUES (?)");
      $stmt->bind_param('s', $nome);
      $stmt->execute();
      $newID = $stmt->insert_id;

      redirect("../index.php?acao=listaEditora");
    }

    if($tabela == 'Livro') {
      $titulo = $_POST['titulo'];
      $ano = $_POST['ano'];
      $faixa_etaria = $_POST['faixa_etaria'];
      $idioma = $_POST['idioma'];
      $paginas = $_POST['paginas'];
      $id_editora = $_POST['id_editora'];
      $id_autores = $_POST['autor'];

      //INSERT
      $stmt = $mysqli_connection->prepare("INSERT INTO Livro(titulo, ano, faixa_etaria, idioma, n_paginas, id_editora) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('siisii', $titulo, $ano, $faixa_etaria, $idioma, $paginas, $id_editora);
      $stmt->execute();
      $id_livro = $stmt->insert_id;

      //Inserir tupla no relacionamento - Livro e Autor
      foreach($id_autores as $id_autor){
        $stmt = $mysqli_connection->prepare("INSERT INTO Autor_Livro(id_autor, id_livro) VALUES (?, ?)");
        $stmt->bind_param('ii', $id_autor, $id_livro);
        $stmt->execute();
      }
      
      redirect("../index.php?acao=listaLivro");
    }
  }
  
  //fechar conexão com banco de dados
  $mysqli_connection->close();

  function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }
?>