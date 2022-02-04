<?php
    session_start();
    //conecta BD
    
    if(count($_GET)>0) { 
        require('../../../modules/conectaBD.php');
        $acao = $_GET['acao'];
        
        if($acao == 'infoCliente') {
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM Cliente WHERE id_cliente = " . $id;
            $results = $mysqli_connection->query($sql); 
            
            while($row = $results->fetch_assoc()) {
                $cliente = array(
                    'nome' => $row['nome'],
                    'data_nasc' => $row['data_nasc'],
                    'email' => $row['email']);
            }
        }

        if($acao == 'infoSenhaCliente') {
            $id = $_SESSION['id_cliente'];
            
            $sql = "SELECT senha FROM Cliente WHERE id_cliente = " . $id;
            $results = $mysqli_connection->query($sql); 
            
            while($row = $results->fetch_assoc()) {
                $clienteSenha = $row['senha'];
            }
        }
    }
        
    if(count($_POST)>0) { 
        require('../conectaBD.php');
        $acao = $_POST['acao'];
        if($acao == 'alterarCliente') {
            $id = $_SESSION['id_cliente'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $data_nasc = $_POST['data_nasc'];

            $stmt = $mysqli_connection->prepare("UPDATE Cliente SET nome = ?, email = ?, data_nasc = ? WHERE id_cliente = ?");
            $stmt->bind_param('sssi', $nome, $email, date($data_nasc), $id);
            $stmt->execute();
            
            if ($stmt->execute()) {
                $_SESSION['mensagem'] =  'Dados alterados com sucesso!';
                $_SESSION['tipo-mensagem'] = 'success';
            } else {
                $_SESSION['mensagem'] = 'Erro ao alterar dados!';
                $_SESSION['tipo-mensagem'] = 'danger';
            }

            $novaUrl = '../../pages/cliente/auth/index.php?acao=atualizarDados';
            ob_start();
            header('Location: '.$novaUrl);
            ob_end_flush();
            die();
        }
    }

    //fechar conexão com banco de dados
    $mysqli_connection->close();
?>