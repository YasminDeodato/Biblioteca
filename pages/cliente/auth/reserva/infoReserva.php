<?php
    $reserva = $_POST['reserva'];

    switch($reserva['status_r']) {
        case 'Em analise':
            $color = 'warning';
            break;
        case 'Em andamento':
            $color = 'info';
            break;
        case 'Finalizada': 
            $color = 'success';
            break;
        case 'Em atraso':
        case 'Cancelada':
            $color = 'danger';
    }
?>
<div class="row my-4">
    <div class="col-md-10 col-auto">
        <div class="card">
        <div class="row g-0">
            <div class="col-md-2 col-sm-12">
                <div class="card h-100 bg-<?php echo $color; ?> d-flex align-items-center justify-content-center">
                    <span class="fs-1 text-light material-icons align-text-bottom py-2">auto_stories</span>
                </div>
            </div>
            <div class="col-md-10 col-auto">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h5 class="card-title">Livro: <?php echo $reserva['titulo_livro']; ?> </h5>
                        </div>
                        <div class="col-auto">
                            <a data-bs-toggle="modal" data-bs-target="#devolucaoModal<?php echo $reserva['id_reserva']; ?>" data-toggle="modal" class="btn border-<?php echo $color; ?> 
                                <?php 
                                    if($reserva['status_r'] == 'Em analise' || $reserva['status_r'] == 'Finalizada' || $reserva['status_r'] == 'Cancelada') { echo 'disabled'; }
                                ?>
                            ">
                                <span class="material-icons align-middle">add</span>Delvover
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-md-6 col-auto">
                            Data de inicio: <?php echo $reserva['data_inicio']; ?>
                        </div>
                        <div class="col-md-6 col-auto">
                            Data final: <?php echo $reserva['data_fim']; ?>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-auto">
                            Multa: <?php echo $reserva['multa']; ?> pontos
                        </div>
                        <div class="col-md-6 col-auto"> 
                            <?php 
                                if($reserva['data_fim'] == date('Y-m-d'))
                                    echo '<p class="text-warning">A reserva termina hoje!</p>';
                                    
                                if($reserva['data_fim'] < date('Y-m-d') && $reserva['status_r'] == 'Em andamento')
                                    echo '<p class="text-danger">A entrega esta atrasada! Devolva logo.</p>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Status: Reserva <?php echo $reserva['status_r']; ?></small>
                </div>
            </div>
        </div>
        </div>
    </div>  
</div>

<!-- Modal Devolução -->
<div class="modal fade" id="devolucaoModal<?php echo $reserva['id_reserva'];?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Reserva do Livro <?php echo $reserva['titulo_livro'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row" action="../../../modules/reserva/devolver.php" method="POST">
            <div class="modal-body m-2">
                <p>Voce tem certeza que deseja devolver o livro <?php echo $reserva['titulo_livro'];?>?</p>
                <p class="text-muted"><small>Essa acao nao pode ser desfeita. <br/>
                Voce pode reservar este livro novamente, caso queira.</small></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="acao" name="acao" value="devolverReserva">
                <input type="hidden" id="id" name="id" value="<?php echo $reserva['id_reserva']; ?>">
                <?php $_POST['reserva'] = $reserva; ?>
                <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Devolver</button>
            </div>
        </form>
    </div>
    </div>
</div>

