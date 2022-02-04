<?php
    $color = 'warning';
    $avalicao = 2;
?>
<div class="row mt-4">
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
                            <h5 class="card-title">Livro: O reino das vozes que nao se calam </h5>
                        </div>
                        <div class="col-auto">
                            <a data-bs-toggle="modal" data-bs-target="#cadastrarModal" data-toggle="modal" class="btn border-<?php echo $color; ?>">
                                <span class="material-icons align-middle">add</span>Delvover
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-between">
                        <div class="col-md-6 col-auto">
                            Data de inicio: 2021-01-10
                        </div>
                        <div class="col-md-6 col-auto">
                            Data final: 2021-01-13
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-auto">
                            Multa: 0 pontos
                        </div>
                        <div class="col-md-6 col-auto">
                            Avaliação: 
                            <?php 
                                for($i=0; $i<$avalicao; $i++)
                                    echo '<span class="material-icons text-' . $color .' align-middle">star</span>';

                                for($i=0; $i<5-$avalicao; $i++)
                                    echo '<span class="material-icons text-secondary align-middle">star</span>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Status: </small>
                </div>
            </div>
        </div>
        </div>
    </div>  
</div>