<?php
  $_GET['tabela']="Livro";
  $_GET['acao']="listaLivro";
  require("../../modules/books/listagem.php");
?>
<h2 class="pb-2">Lista de Livros</h2>
<?php include '../common/notificacao.php'; ?>
<hr/>
<div class="col pb-2">
  <a data-bs-toggle="modal" data-bs-target="#cadastrarModal" data-toggle="modal" class="btn btn-primary mb-2">
    <span class="material-icons align-middle">add</span>Adicionar Livro
  </a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Autores</th>
      <th scope="col">Editora</th>
      <th scope="col">Idioma</th>
      <th scope="col">Ano</th>
      <th scope="col">Faixa Etaria</th>
      <th scope="col">Paginas</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($livros as $key => $value) {
          echo "<tr>";
          echo '<td>' . $livros[$key]['id_livro']. '</td>';
          echo '<td>' . $livros[$key]['titulo']. '</td>';
          echo '<td>'; 
            foreach($livros[$key]['autores'] as $autor) {
              echo $autor['nome'] . '<br/>';
            }
          echo '</td>';
          echo '<td>' . $livros[$key]['editora']. '</td>';
          echo '<td>' . $livros[$key]['idioma']. '</td>';
          echo '<td>' . $livros[$key]['ano']. '</td>';
          echo '<td>' . $livros[$key]['faixa_etaria']. '</td>';
          echo '<td>' . $livros[$key]['n_paginas']. '</td>';
          
          echo '<td><a data-bs-toggle="modal" data-bs-target="#editarModal' . $livros[$key]["id_livro"] . '" class="text-info" data-id="' . $livros[$key]["id_livro"] . 'data-toggle="modal">         
          <span class="material-icons" data-toggle="tooltip" title="Editar">edit</span>
          </a></td>';

          echo '<td><a data-bs-toggle="modal" data-bs-target="#excluirModal' . $livros[$key]["id_livro"] .'" class="text-danger" data-id="' . $livros[$key]["id_livro"] . 'data-toggle="modal">         
          <span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span>
          </a></td>';
          echo "</tr>"; ?>
        
          <!-- Modal Editar -->
          <div class="modal fade" id="editarModal<?php echo $livros[$key]['id_livro'];?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Editar Livro: <?php echo $livros[$key]['titulo'];?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mt-2">
                  <?php
                    $_POST['id']=$livros[$key]['id_livro'];
                    require("../../pages/books/form/formsLivro.php");
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
        </div>

          <!-- Modal Excluir -->
          <div class="modal fade" id="excluirModal<?php echo $livros[$key]['id_livro'];?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Excluir Livro: <?php echo $livros[$key]['titulo']; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" action="../../modules/books/deletar.php" method="POST">
                  <div class="modal-body mt-2">
                    <p>Voce tem certeza que deseja excluir o livro <?php echo $livros[$key]['titulo']; ?>?</p>
                    <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="tabela" name="tabela" value="Livro">
                    <input type="hidden" id="id" name="id" value="<?php echo $livros[$key]['id_livro']; ?>">
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

<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <?php 
          $_POST = array();
          require("../../pages/books/form/formsLivro.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
