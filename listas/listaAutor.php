<?php
  $_GET['tabela']="Autor";
  $_GET['acao']="listaAutor";
  require("./backend/listagem.php");
  
?>
<h2 class="pb-2">Lista de Autores</h2>
<hr/>
<div class="col pb-2">
  <a data-bs-toggle="modal" data-bs-target="#cadastrarModal" data-toggle="modal" class="btn btn-primary mb-2">
    <span class="material-icons align-middle">add</span>Adicionar Autor
  </a>
</div>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($autores as $key => $value) {
          echo "<tr>";
          echo '<td>' . $autores[$key]['id_autor']. '</td>';
          echo '<td>' . $autores[$key]['nome']. '</td>';
          echo '<td>' . $autores[$key]['data_nasc']. '</td>';
          
          echo '<td><a data-bs-toggle="modal" data-bs-target="#editarModal'. $autores[$key]["id_autor"] . '" class="text-info" data-id="' . $autores[$key]["id_autor"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Editar">edit</span></a></td>';

          echo '<td><a data-bs-toggle="modal" data-bs-target="#excluirModal'. $autores[$key]["id_autor"] . '" class="text-danger" data-id="' . $autores[$key]["id_autor"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span>
          </a></td>';
          echo "</tr>";

        ?>

        <!-- Modal Editar -->
        <div class="modal fade" id="editarModal<?php echo $autores[$key]['id_autor'];?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Editar Autor(a): <?php echo $autores[$key]['nome'];?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body mt-2">
                <?php
                  $_POST['id']=$autores[$key]['id_autor'];
                  require("./forms/formsAutor.php");
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Excluir -->
        <div class="modal fade" id="excluirModal<?php echo $autores[$key]['id_autor'];?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Excluir Autor(a)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="row g-3" action="./backend/deletar.php" method="POST">
                <div class="modal-body mt-2">
                  <p>Voce tem certeza que deseja excluir o(a) autor(a) <?php echo $autores[$key]['nome'];?>?</p>
                  <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
                </div>
                <div class="modal-footer">
                  <input type="hidden" id="tabela" name="tabela" value="Autor">
                  <input type="hidden" id="id" name="id" value="<?php echo $autores[$key]['id_autor']; ?>">
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
        <h5 class="modal-title">Cadastrar Autor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body mt-2">
        <?php
          $_POST = array();
          require("./forms/formsAutor.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
