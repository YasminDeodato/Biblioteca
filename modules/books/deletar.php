<?php 
  //iniciar sessao
  session_start();

  //conecta BD
  require_once('../conectaBD.php');

  //Obter dados
  $tabela = $_POST['tabela'];
  if($tabela == "Autor") {
    $id = $_POST['id'];
    
    //Antes de deletar o autor, precisamos deletar 
    //todos os relacionamentos deste com os livros
    $stmt = $mysqli_connection->prepare("DELETE FROM Autor_Livro WHERE id_autor = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    $stmt = $mysqli_connection->prepare("DELETE FROM Autor WHERE id_autor = ?");
    $stmt->bind_param('i', $id);
    
    if($stmt->execute()) {
      $_SESSION['mensagem'] = 'Exclusao realizada com sucesso';
      $_SESSION['tipo-mensagem'] = 'success';
    } else {
      $_SESSION['mensagem'] = 'Erro ao realizar exclusao!';
      $_SESSION['tipo-mensagem'] = 'danger';
    }

    $novaUrl = '../../pages/books/index.php?acao=listaAutor';
  } 

  if($tabela == "Editora") {
    $id = $_POST['id'];
    
    //Antes de deletar a editora, precisamos deletar 
    //os livros que essas tem publicados
    //obter livros publicados pela editora
    $sql = "SELECT Livro.id_livro FROM Autor_Livro INNER JOIN Livro ON Livro.id_livro = Autor_Livro.id_livro WHERE Livro.id_editora = " . $id;
    $results = $mysqli_connection->query($sql);    
    
    //apagar o livro, seus relacionamentos
    while($row = $results->fetch_assoc()) {
      $stmt = $mysqli_connection->prepare("DELETE FROM Autor_Livro WHERE Autor_Livro.id_livro = ?");
      $stmt->bind_param('i', $row["id_livro"]);
      $stmt->execute();

      $stmt = $mysqli_connection->prepare("DELETE FROM Livro WHERE Livro.id_livro = ?");
      $stmt->bind_param('i', $row["id_livro"]);
      $stmt->execute();
    }
    
    //apagar editora
    $stmt = $mysqli_connection->prepare("DELETE FROM Editora WHERE id_editora = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    if($stmt->execute()) {
      $_SESSION['mensagem'] = 'Exclusao realizada com sucesso';
      $_SESSION['tipo-mensagem'] = 'success';
    } else {
      $_SESSION['mensagem'] = 'Erro ao realizar exclusao!';
      $_SESSION['tipo-mensagem'] = 'danger';
    }

    $novaUrl = '../../pages/books/index.php?acao=listaEditora';
  } 

  if($tabela == "Livro") {
    $id = $_POST['id'];
        
    //apagar livro
    $stmt = $mysqli_connection->prepare("DELETE FROM Livro WHERE id_livro = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    if($stmt->execute()) {
      $_SESSION['mensagem'] = 'Exclusao realizada com sucesso';
      $_SESSION['tipo-mensagem'] = 'success';
    } else {
      $_SESSION['mensagem'] = 'Erro ao realizar exclusao!';
      $_SESSION['tipo-mensagem'] = 'danger';
    }

    $novaUrl = '../../pages/books/index.php?acao=listaLivro';
  } 

  if($tabela == "Exemplar") {
    $id = $_POST['id_exemplar'];
    $id_livro = $_POST['id_livro'];
        
    //apagar livro
    $stmt = $mysqli_connection->prepare("DELETE FROM Exemplar WHERE id_exemplar = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    if($stmt->execute()) {
      $_SESSION['mensagem'] = 'Exclusao realizada com sucesso';
      $_SESSION['tipo-mensagem'] = 'success';
    } else {
      $_SESSION['mensagem'] = 'Erro ao realizar exclusao!';
      $_SESSION['tipo-mensagem'] = 'danger';
    }

    $_SESSION['id_livro'] = $id_livro;
    $novaUrl = '../../pages/books/index.php?acao=listaExemplar';
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