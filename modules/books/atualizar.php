<?php 
  //iniciar sessao
  session_start();

  //conecta BD
  require('../conectaBD.php');

  if(count($_POST)>0) {
    $tabela = $_POST['tabela'];
    if($tabela == "Autor") {
      $id = $_POST['id_autor'];
      $nome = $_POST['nome'];
      $data_nasc = $_POST['data_nasc'];
      $stmt = $mysqli_connection->prepare("UPDATE Autor SET nome = ?, data_nasc = ? WHERE id_autor = ?");

      $stmt->bind_param('ssi', $nome, date($data_nasc), $id);
      
      if ($stmt->execute()) {
        $_SESSION['mensagem'] =  'Dados do(a) autor(a) ' .$nome . ' alterados com sucesso!';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao alterar dados do autor!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $novaUrl = '../../pages/books/index.php?acao=listaAutor';
    }

    if($tabela == "Editora") {
      $id = $_POST['id_editora'];
      $nome = $_POST['nome'];
      $stmt = $mysqli_connection->prepare("UPDATE Editora SET nome = ? WHERE id_editora = ?");
      $stmt->bind_param('si', $nome, $id);
      $stmt->execute();
      
      if ($stmt->execute()) {
        $_SESSION['mensagem'] =  'Dados da editora ' .$nome . ' alterados com sucesso!';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao alterar dados do autor!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $novaUrl = '../../pages/books/index.php?acao=listaEditora';
    }

    if($tabela == "Livro") {
      $id_livro = $_POST['id_livro'];
      $titulo = $_POST['titulo'];
      $ano = $_POST['ano'];
      $faixa_etaria = $_POST['faixa_etaria'];
      $idioma = $_POST['idioma'];
      $paginas = $_POST['paginas'];
      $id_editora = $_POST['id_editora'];
      $id_autores = $_POST['autor'];

      $stmt = $mysqli_connection->prepare("UPDATE Livro SET titulo = ?, ano = ?, faixa_etaria = ?,
      idioma = ?, n_paginas = ?, id_editora = ? WHERE id_livro = ?;");
      $stmt->bind_param('siisiii', $titulo, $ano, $faixa_etaria, $idioma, $paginas, $id_editora, $id_livro);
      $sucesso = $stmt->execute();

      //Inserir tupla no relacionamento - Livro e Autor
      foreach($id_autores as $id_autor){
        $stmt = $mysqli_connection->prepare("INSERT INTO Autor_Livro(id_autor, id_livro) VALUES (?, ?)");
        $stmt->bind_param('ii', $id_autor, $id_livro);
        $stmt->execute();
      }
      
      if ($sucesso) {
        $_SESSION['mensagem'] =  'Dados do livro ' . $titulo . ' alterados com sucesso!';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao alterar dados do livro!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }
      
      $novaUrl = '../../pages/books/index.php?acao=listaLivro';
    }

    if($tabela == "Exemplar") {
      $id_exemplar = $_POST['id_exemplar'];
      $status_e = $_POST['status_e'];
      $id_livro = $_POST['id_livro'];

      $stmt = $mysqli_connection->prepare("UPDATE Exemplar SET status_e = ? WHERE id_exemplar = ?");
      $stmt->bind_param('si', $status_e, $id_exemplar);
      $stmt->execute();
      
      if ($stmt->execute()) {
        $_SESSION['mensagem'] =  'Dados do exemplar ' .$id_exemplar . ' alterados com sucesso!';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao alterar dados do exemplar!';
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