<?php 
    //iniciar sessao
    session_start();

    if($_SESSION["id_cliente"]) {
        echo '<h1>Conectadooo</h1>';
        echo '<br/>ID do cliente conectado: ' . $_SESSION["id_cliente"];
    }
    
    session_destroy();
?>