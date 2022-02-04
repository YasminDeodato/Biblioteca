<?php 
    //iniciar sessao
    session_start();

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
        $novaUrl = '../../pages/cliente/login/login.php';

        if($_POST['acao'] == 'recupera')
            $novaUrl = '../../pages/cliente/login/login.php?acao=recupera';
    } else if($_POST['acao'] == 'recupera') {
        $emailCrip = substr_replace($email, '*****', strpos($email, '@')) . substr($email, strpos($email, '@')); 
        $_SESSION['mensagem'] = 'Um e-mail foi enviado para ' . $emailCrip . ' com as instrucoes';
        $_SESSION['tipo-mensagem'] = 'success';
        $novaUrl = '../../pages/cliente/login/login.php?acao=recupera';
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
            $_SESSION["nome"] = $cliente["nome"];
            $_SESSION["autenticado"] = true;
            
            //echo $_SERVER['PHP_SELF'];
            //echo '<br/><a href="../../pages/cliente/auth/index.php">Teste</a>';
            //echo '<br/><a href="../../../pages/cliente/auth/index.php">Teste</a>';
            $novaUrl = '../../pages/cliente/auth/index.php';
        } else {
            $_SESSION['mensagem'] = 'Senha incorreta';
            $_SESSION['tipo-mensagem'] = 'danger';
            $novaUrl = '../../pages/cliente/login/login.php';
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