<?php 
    session_start();

    //print_r($_SESSION);

    //remover todas variaveis da sessao
    session_unset();

    //destruir a sessao
    session_destroy();

    
    //nova sessao
    session_start();
    $_SESSION['mensagem'] = 'Sessao finalizada!';
    $_SESSION['tipo-mensagem'] = 'success';
    redirect("login.php");
    
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
?>