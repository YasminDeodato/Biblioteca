<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    $from = "yasmin.deodato.beatriz@gmail.com";
    $to = "yasmin.deodato@unifesp.br";
    $subject = "E-mail de Teste";

    $message = "<b>This is HTML message.</b>";
    $message .= "<h1>This is headline.</h1>";
    $message .= "<p>Ola, estou enviando esse e-mail usando PHP</p>";
    
    $header = "From:yasmin.deodato.beatriz@gmail.com \r\n";
    $header .= "Cc:yasmin.deodato@unifesp.br \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail($to,$subject,$message,$header);
    
    if($retval == true) {
       echo "Message sent successfully...";
    }else {
       echo "Message could not be sent...";
    }
?>