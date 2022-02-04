<?php
  $host = 'localhost:3306/';
  $database = 'biblioteca';
  $password = 'yasmin311';
  $user = 'root';

  $mysqli_connection = new MySQLi($host, $user, $password, $database);

  if($mysqli_connection->connect_error) {
    echo "Nao foi possivel se conectar ao Banco de Dados! Comunique a equipe tecnica.";
    echo "Erro: " . $mysqli_connection->connect_error; 
  } /*else {
    echo 'Conectado';
  }*/
?>