<?php
    session_start();

    $_GET['tabela']="Reserva";
    $_GET['acao']="listaReservaFunc";
    require("../../modules/reserva/listagem.php");  
    
    if(empty($reservas)) {
        $_SESSION['mensagem'] = 'Nao ha reservas';
        $_SESSION['tipo-mensagem'] = 'secondary';
    }
?>
<h2 class="pb-2">Lista de Reservas</h2>
<?php include '../common/notificacao.php'; ?>
<hr/>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Cliente</th>
      <th scope="col">Livro</th>
      <th scope="col">Status</th>
      <th scope="col">Exemplar</th>
      <th scope="col">Prazo</th>
      <th scope="col">Aprovar</th>
      <th scope="col">Cancelar</th>
      <th scope="col">Multa</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($reservas as $r) {
            echo "<tr>";
            echo '<td>';
                $cor = ($r['id_func'] == $_SESSION['id_func']) ? 'warning' : 'secondary';
                echo '<span class="material-icons text-' . $cor .' align-middle">star</span>';
            echo '</td>';
            echo '<td>' . $r['id_reserva']. '</td>';
            echo '<td>' . $r['nome_cliente'] . '</td>';
            echo '<td>' . $r['titulo_livro']. '</td>';
            echo '<td>' . $r['status_r'] . '</td>';
            echo '<td>' . $r['id_exemplar'] . '</td>';
            echo '<td>Inicio: ' . $r['data_inicio'] . '<br/>';
            echo 'Final: ' . $r['data_fim'] . '</td>';
          
            echo '<td><a data-bs-toggle="modal" data-bs-target="#aprovarModal'. $r['id_reserva']  . '" data-toggle="modal"';
            echo ' class="btn text-success ';
                if($r['status_r'] != 'Em analise') echo ' disabled';
            echo '"><span class="material-icons" data-toggle="tooltip" title="Aprovar reserva">check_circle</span></a></td>';

            echo '<td><a data-bs-toggle="modal" data-bs-target="#cancelarModal'. $r['id_reserva'] . '" data-toggle="modal"';
            echo 'class="text-danger btn';
                if($r['status_r'] == 'Cancelada' || $r['status_r'] == 'Finalizada') echo ' disabled';
            echo '"> <span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span></a></td>';

             echo '<td>';
            if (empty($r['multa'])) {
            echo '<a data-bs-toggle="modal" data-bs-target="#addMulta'. $r['id_reserva'] . '" class="text-warning" data-toggle="modal">
                    <span class="material-icons" data-toggle="tooltip" title="Adicionar multa">add_circle</span></a>';
            } else {
                echo $r['multa'];
            }
    
            echo '</td>';

            echo "</tr>"; ?>
        

          <!-- Modal Aprovar -->
          <div class="modal fade" id="aprovarModal<?php echo  $r['id_reserva']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Aprovar a Reserva <?php echo $r['id_reserva']; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" action="../../modules/reserva/devolver.php" method="POST">
                  <div class="modal-body mt-2">
                    <p>Voce tem certeza que deseja aprovar a reserva nº <?php echo  $r['id_reserva']?>?</p>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="acao" name="acao" value="atualizarReserva">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id_reserva']; ?>">
                    <input type="hidden" id="status_r" name="status_r" value="Em andamento">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Aprovar Reserva</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Cancelar -->
          <div class="modal fade" id="cancelarModal<?php echo  $r['id_reserva']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cancelamento da Reserva <?php echo $r['id_reserva']; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" action="../../modules/reserva/devolver.php" method="POST">
                  <div class="modal-body mt-2">
                    <p>Voce tem certeza que deseja cancelar a reserva nº <?php echo  $r['id_reserva']?>?</p>
                    <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="acao" name="acao" value="atualizarReserva">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id_reserva']; ?>">
                    <input type="hidden" id="status_r" name="status_r" value="Cancelada">
                    <button type="submit" class="btn btn-danger">Cancelar Reserva</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Cancelar -->
          <div class="modal fade" id="addMulta<?php echo  $r['id_reserva']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Adicionar multa para Reserva <?php echo $r['id_reserva']; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" action="../../modules/reserva/devolver.php" method="POST">
                  <div class="modal-body mt-2">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="inputExemplar" class="form-label">Valor da Multa</label>
                            <input type="number" class="form-control" id="multa" name="multa">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="acao" name="acao" value="adicionarMulta">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id_reserva']; ?>">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Multa</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
  </tbody>
</table>
</div>
