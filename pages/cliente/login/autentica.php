<?php 
    session_start();

    if(!$_SESSION['autenticado']) {
      $_SESSION['mensagem'] = 'Faça o login para acessar o sistema!';
      $_SESSION['tipo-mensagem'] = 'warning';
     
      redirect("../login/login.php");
    } /*else {
        echo 'Usuario logado';
    }*/

    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
?>