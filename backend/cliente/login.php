<?php 
    //iniciar sessao
    session_start();

    echo 'Loginnnnn!';
    
    //conecta BD
    require('../conectaBD.php');
    
    //Obter dados
    $email = $_POST['email'];
    $sql = "SELECT * FROM Cliente WHERE email = '" . $email . "'";
    $results = $mysqli_connection->query($sql); 

    //e-mail nao encontrado
    if(!$results->num_rows) {
        $_SESSION['mensagem'] = 'Este e-mail nao possui nenhuma conta associada';
        $_SESSION['tipo-mensagem'] = 'danger';
        $novaUrl = '../../login/login.php';
    } else {
        while($row = $results->fetch_assoc()) {
            $cliente["id_cliente"] = $row["id_cliente"];
            $cliente["nome"] = $row["nome"];
            $cliente["senha"] = $row["senha"];
        }
    
        //senha correta
        if (password_verify($_POST['senha'], $cliente["senha"])) {
            echo 'Senha correta!';
            $_SESSION["id_cliente"] = $cliente["id_cliente"];
            $novaUrl = 'teste.php';
        } else {
            $_SESSION['mensagem'] = 'Senha incorreta';
            $_SESSION['tipo-mensagem'] = 'danger';
            $novaUrl = '../../login/login.php';
        }
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