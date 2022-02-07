<?php
    session_start();

    //conecta BD
    require('../../modules/conectaBD.php');

    $acao = $_POST['acao'];

    if($acao == 'devolverReserva') {
        $reserva = $_POST['reserva'];
        $id_reserva = $_POST['id'];
        $statusNovo = 'Finalizada';
        
        echo 'Alterar dados da reserva ' . $id_reserva . ' do livro ' . $reserva['titulo_livro'];

        $stmt = $mysqli_connection->prepare("UPDATE Reserva SET status_r = ? WHERE id_reserva = ?");
        $stmt->bind_param('si', $statusNovo, $id_reserva);
       
        if($stmt->execute()) {
            $_SESSION['mensagem'] = 'Livro devolvido com sucesso!';
            $_SESSION['tipo-mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao devolver reserva do livro!';
            $_SESSION['tipo-mensagem'] = 'danger';
        }

        echo '<br/>' . $_SESSION['mensagem'];
    
        $novaUrl = '../../pages/cliente/auth/index.php?acao=formsReserva&sub=reserva';
    }
    
    //fechar conexão com banco de dados
    $mysqli_connection->close();

    //redirect($novaUrl);

    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
?>