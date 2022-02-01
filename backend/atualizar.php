<?php 
  //conecta BD
  require('conectaBD.php');

  if(count($_POST)>0) {
    $tabela = $_POST['tabela'];
    if($tabela == "Autor") {
      $id = $_POST['id_autor'];
      $nome = $_POST['nome'];
      $data_nasc = $_POST['data_nasc'];
      $stmt = $mysqli_connection->prepare("UPDATE Autor SET nome = ?, data_nasc = ? WHERE id_autor = ?");

      echo 'id ' . $id . ' | nome: ' . $nome . ' | data_nasc: ' . $data_nasc;
      $stmt->bind_param('ssi', $nome, date($data_nasc), $id);
      $stmt->execute();
      
      if ($stmt)
        $msg ='Dados do(a) autor(a) ' .$nome . ' alterados com sucesso!';
      else
        $msg = 'Erro ao alterar autor(a) ' . $nome . '!';
      
      redirect('../index.php?acao=listaAutor');      
    }

     if($tabela == "Editora") {
      $id = $_POST['id_editora'];
      $nome = $_POST['nome'];
      $stmt = $mysqli_connection->prepare("UPDATE Editora SET nome = ? WHERE id_editora = ?");
      $stmt->bind_param('si', $nome, $id);
      $stmt->execute();
      
      if ($stmt)
        $msg ='Dados da editora ' .$nome . ' alterados com sucesso!';
      else
        $msg = 'Erro ao alterar editora ' . $nome . '!';
      
      redirect('../index.php?acao=listaEditora');  
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