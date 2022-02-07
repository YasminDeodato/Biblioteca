<?php
    session_start();

    //conecta BD
    require('../../modules/conectaBD.php');

    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $data_fim2 = $_POST['data_fim2'];
    $status_r = $_POST['status_r'];
    $id_exemplar = $_POST['id_exemplar'];
    $id_cliente = $_SESSION["id_cliente"];

    $stmt = $mysqli_connection->prepare("INSERT INTO Reserva(data_inicio, data_fim, status_r, id_exemplar, id_cliente)
    VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssii', date($data_inicio), date($data_fim), $status_r, $id_exemplar, $id_cliente);

    if($stmt->execute()) {
        $id_inserido = $stmt->insert_id;
        $_SESSION['mensagem'] = 'Reserva ' . $id_inserido . ' solicitada com sucesso!';
        $_SESSION['tipo-mensagem'] = 'success';
    } else {
        $_SESSION['mensagem'] = 'Erro ao solicitar reserva!';
        $_SESSION['tipo-mensagem'] = 'danger';
    }

    $novaUrl = '../../pages/cliente/auth/index.php?acao=formsReserva&sub=reserva';
    
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