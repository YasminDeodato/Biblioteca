    } else if($_POST['acao'] == 'recupera') {
        $emailCrip = substr_replace($email, '*****', strpos($email, '@')) . substr($email, strpos($email, '@')); 
        $_SESSION['mensagem'] = 'Um e-mail foi enviado para ' . $emailCrip . ' com as instrucoes';
        $_SESSION['tipo-mensagem'] = 'success';
        $novaUrl = '../../pages/cliente/login/login.php?acao=recupera';
