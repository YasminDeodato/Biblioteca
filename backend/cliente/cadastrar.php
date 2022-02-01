<?php 
  //conecta BD
  require('../conectaBD.php');

  echo 'Cadastrar Clienteee <br/>';
  
  if(count($_POST)>0) { 
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'] . '';
    $email = $_POST['email'];
    //senha criptografada
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    echo 'Nome: ' .$nome . ' | Data Nasc.: ' . $data_nasc;
    echo 'Email: ' . $email . ' | Senha:' . $senha;

    $stmt = $mysqli_connection->prepare("INSERT INTO Cliente(nome, data_nasc, email, senha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $nome, date($data_nasc), $email, $senha);
    $stmt->execute();
    $newID = $stmt->insert_id;

    //verificar senha
    $result = password_verify('123', $senha) ? 'Sim' : 'Nao';
    echo '<br/> Testando se senha esta correta: ' . $result;
    echo '<br/> Id: ' . $newID;
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