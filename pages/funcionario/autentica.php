<?php 
    session_start();

    if(!$_SESSION['autenticado'] &&  empty($_SESSION['id_func'])) {
      $_SESSION['mensagem'] = 'Faça o login para acessar o sistema!';
      $_SESSION['tipo-mensagem'] = 'warning';
     
      redirect("../funcionario/login.php");
    }

    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
?>