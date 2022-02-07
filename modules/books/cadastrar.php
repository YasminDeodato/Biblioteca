<?php 
  //iniciar sessao
  session_start();
  
  //conecta BD
  require_once('../conectaBD.php');

  //Obter dados
  if(count($_POST)>0) { 
    $tabela = $_POST['tabela'];
    
    if($tabela == 'Autor') {
      $nome = $_POST['nome'];
      $data_nasc = $_POST['data_nasc'] . '';

      $stmt = $mysqli_connection->prepare("INSERT INTO Autor(nome, data_nasc) VALUES (?, ?)");
      $stmt->bind_param('ss', $nome, date($data_nasc));

      if($stmt->execute()) {
        $_SESSION['mensagem'] = 'Autor ' . $nome . ' cadastrado com sucesso';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao inserir autor!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }

      $novaUrl = '../../pages/books/index.php?acao=listaAutor';
    }

    if($tabela == 'Editora') {
      $nome = $_POST['nome'];

      $stmt = $mysqli_connection->prepare("INSERT INTO Editora(nome) VALUES (?)");
      $stmt->bind_param('s', $nome);

      if($stmt->execute()) {
        $_SESSION['mensagem'] = 'Editora ' . $nome . ' cadastrada com sucesso';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao inserir editora!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $novaUrl = '../../pages/books/index.php?acao=listaEditora';
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
      $sucesso = $stmt->execute();
      $id_livro = $stmt->insert_id;
      
      //Inserir tupla no relacionamento - Livro e Autor
      foreach($id_autores as $id_autor){
        $stmt = $mysqli_connection->prepare("INSERT INTO Autor_Livro(id_autor, id_livro) VALUES (?, ?)");
        $stmt->bind_param('ii', $id_autor, $id_livro);
        $stmt->execute();
      }
      
      if($sucesso) {
        $_SESSION['mensagem'] = 'Livro ' . $titulo . ' cadastrado com sucesso';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao inserir livro!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $novaUrl = '../../pages/books/index.php?acao=listaLivro';
    }

    if($tabela == 'Exemplar') {
      $id_exemplar = $_POST['id_exemplar'];
      $status_e = $_POST['status_e'];
      $id_livro = $_POST['id_livro'];

      $stmt = $mysqli_connection->prepare("INSERT INTO Exemplar(status_e, id_livro) VALUES (?, ?)");
      $stmt->bind_param('si', $status_e, $id_livro);
  
      if($stmt->execute()) {
        $id_inserido = $stmt->insert_id;
        $_SESSION['mensagem'] = 'Exemplar ' . $id_inserido . ' cadastrado com sucesso';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao inserir exemplar!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $_SESSION['id_livro'] = $id_livro;
      $novaUrl = '../../pages/books/index.php?acao=listaExemplar';
    }
  }
  
  //fechar conexão com banco de dados
  $mysqli_connection->close();

  redirect($novaUrl);

  function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }
?>