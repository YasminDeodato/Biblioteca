<?php 
    session_start();
    
    if($_SESSION["mensagem"]) {
?>
    <div class="alert alert-<?php echo $_SESSION["tipo-mensagem"]; ?> alert-dismissible fade show" role="alert">
        <strong>Notificacao: </strong><?php echo $_SESSION["mensagem"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    }
    $_SESSION["mensagem"] = '';
    //session_unset();
?>