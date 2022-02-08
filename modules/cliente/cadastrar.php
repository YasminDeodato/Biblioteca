<?php 
  //iniciar sessao
  session_start();

  //conecta BD
  require('../conectaBD.php');

  echo 'Cadastrar Clienteee <br/>';
  
  if(count($_POST)>0) { 
    $email = $_POST['email'];
    $sql = "SELECT * FROM Cliente WHERE email = '" . $email . "'";
    $results = $mysqli_connection->query($sql); 

    //e-mail ja cadastrado
    if($results->num_rows) {
        $_SESSION['mensagem'] = 'Este e-mail ja possui uma conta associada';
        $_SESSION['tipo-mensagem'] = 'warning';
        $novaUrl = '../../pages/cliente/login/login.php?acao=cadastro';
      } else {
        $nome = $_POST['nome'];
      $data_nasc = $_POST['data_nasc'] . '';
      //senha criptografada
      $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
      
      $stmt = $mysqli_connection->prepare("INSERT INTO Cliente(nome, data_nasc, email, senha) VALUES (?, ?, ?, ?)");
      $stmt->bind_param('ssss', $nome, date($data_nasc), $email, $senha);
      
      if($stmt->execute()) {
        $_SESSION['mensagem'] = 'Conta criada com sucesso! Faça o login para acessar o site';
        $_SESSION['tipo-mensagem'] = 'success';
      } else {
        $_SESSION['mensagem'] = 'Erro ao criar conta!';
        $_SESSION['tipo-mensagem'] = 'danger';
      }

      $novaUrl = '../../pages/cliente/login/login.php';
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