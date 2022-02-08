<?php
    session_start();

    //conecta BD
    require('../../modules/conectaBD.php');

    $acao = $_POST['acao'];

    if($acao == 'devolverReserva') {
        $reserva = $_POST['reserva'];
        $id_reserva = $_POST['id'];
        $statusNovo = 'Finalizada';
        
        $stmt = $mysqli_connection->prepare("UPDATE Reserva SET status_r = ? WHERE id_reserva = ?");
        $stmt->bind_param('si', $statusNovo, $id_reserva);
       
        if($stmt->execute()) {
            $_SESSION['mensagem'] = 'Livro devolvido com sucesso!';
            $_SESSION['tipo-mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao devolver reserva do livro!';
            $_SESSION['tipo-mensagem'] = 'danger';
        }

        $novaUrl = '../../pages/cliente/auth/index.php?acao=formsReserva&sub=reserva';
    }

    if($acao == 'atualizarReserva') {
        $id_reserva = $_POST['id'];
        $statusNovo =  $_POST['status_r'];
        $id_func = $_SESSION['id_func'];

        $stmt = $mysqli_connection->prepare("UPDATE Reserva SET status_r = ?, id_func = ? WHERE id_reserva = ?");
        $stmt->bind_param('sii', $statusNovo, $id_func, $id_reserva);
       
        if($stmt->execute()) {
            $_SESSION['mensagem'] = 'Reserva ' . $id_reserva .' atualizada com sucesso!';
            $_SESSION['tipo-mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar reserva ' . $id_reserva;
            $_SESSION['tipo-mensagem'] = 'danger';
        }
    
        $novaUrl = '../../pages/books/index.php?acao=listaReserva';
    }

    if($acao == 'adicionarMulta') {
        $id_reserva = $_POST['id'];
        $multa =  $_POST['multa'];
        $id_func = $_SESSION['id_func'];

        $stmt = $mysqli_connection->prepare("UPDATE Reserva SET multa = ?, id_func = ? WHERE id_reserva = ?");
        $stmt->bind_param('iii', $multa, $id_func, $id_reserva);
       
        if($stmt->execute()) {
            $_SESSION['mensagem'] = 'Multa adicionada com sucesso para a reserva ' . $id_reserva;
            $_SESSION['tipo-mensagem'] = 'success';
        } else {
            $_SESSION['mensagem'] = 'Erro ao adicionar multa para a reserva ' . $id_reserva;
            $_SESSION['tipo-mensagem'] = 'danger';
        }
    
        $novaUrl = '../../pages/books/index.php?acao=listaReserva';
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