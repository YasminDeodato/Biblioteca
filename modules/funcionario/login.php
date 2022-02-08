<?php
    //iniciar sessao
    session_start();

    //conecta BD
    require('../conectaBD.php');
    
    //Obter dados
    $nome = $_POST['nome'];
    $acesso = $_POST['acesso'];
    $sql = "SELECT * FROM Funcionario WHERE nome = '" . $nome . "' AND acesso = " . $acesso;
    $results = $mysqli_connection->query($sql); 

    //nome nao encontrado
    if(!$results->num_rows) {
        $_SESSION['mensagem'] = 'Nome/acesso nao estao registrados no sistema ou estao incorretos.';
        $_SESSION['tipo-mensagem'] = 'danger';
        $novaUrl = '../../pages/funcionario/login.php';
    } else {
        while($row = $results->fetch_assoc()) {
            $funcionario["id_func"] = $row["id_func"];
            $funcionario["nome"] = $row["nome"];
            $funcionario["acesso"] = $row["acesso"];
        }
        
        //registrar sessao
        $_SESSION['id_func'] = $funcionario["id_func"];
        $_SESSION['nome'] = $funcionario["nome"];
        $_SESSION['autenticado'] = true;

        $novaUrl = '../../pages/books/index.php';
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