<?php    
    $_GET['tabela'] = "Reserva";
    $_GET['acao'] = "listaReserva";

    require("../../../modules/reserva/listagem.php");

    if(!empty($reservas)) {
        foreach($reservas as $r) {
            $_POST['reserva'] = $r;
            include("infoReserva.php");
        }
    } else { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Notificacao: </strong>Voce ainda nao solicitou nenhuma Reserva de livros &#128542;
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
   }
?>