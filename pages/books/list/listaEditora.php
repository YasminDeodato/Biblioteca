<?php
  $_GET['tabela']="Editora";
  $_GET['acao']="listaEditora";
  require("../../modules/books/listagem.php");   
?>
<h2 class="pb-2">Lista de Editoras</h2>
<?php include '../common/notificacao.php'; ?>
<hr/>
<div class="col pb-2">
  <a data-bs-toggle="modal" data-bs-target="#cadastrarModal" data-toggle="modal" class="btn btn-primary mb-2">
    <span class="material-icons align-middle">add</span>Adicionar Editora
  </a>
</div>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($editoras as $key => $value) {
          echo "<tr>";
          echo '<td>' . $editoras[$key]['id_editora']. '</td>';
          echo '<td>' . $editoras[$key]['nome']. '</td>';
          
          echo '<td><a data-bs-toggle="modal" data-bs-target="#editarModal'. $editoras[$key]["id_editora"] . '" class="text-info" data-id="' . $editoras[$key]["id_editora"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Editar">edit</span></a></td>';

          echo '<td><a data-bs-toggle="modal" data-bs-target="#excluirModal'. $editoras[$key]["id_editora"] . '" class="text-danger" data-id="' . $editoras[$key]["id_editora"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span>
          </a></td>';
          echo "</tr>";

        ?>

        <!-- Modal Editar -->
        <div class="modal fade" id="editarModal<?php echo $editoras[$key]['id_editora'];?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Editora: <?php echo $editoras[$key]['nome'];?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body mt-2">
                <?php
                  $_POST['id']=$editoras[$key]['id_editora'];
                  require("../../pages/books/form/formsEditora.php");
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Excluir -->
        <div class="modal fade" id="excluirModal<?php echo $editoras[$key]['id_editora'];?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Excluir Editora</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="row g-3" action="../../modules/books/deletar.php" method="POST">
                <div class="modal-body mt-2">
                  <p>Voce tem certeza que deseja excluir a editora <?php echo $editoras[$key]['nome'];?>?</p>
                  <p>Os livros publicadas por esta editora serao excluidos automaticamente.</p>
                  <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
                </div>
                <div class="modal-footer">
                  <input type="hidden" id="tabela" name="tabela" value="Editora">
                  <input type="hidden" id="id" name="id" value="<?php echo $editoras[$key]['id_editora']; ?>">
                  <button type="submit" class="btn btn-danger">Deletar</button>
                  <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
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

<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Editora</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body mt-2">
        <?php
          $_POST = array();
          require("../../pages/books/form/formsEditora.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
