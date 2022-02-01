<?php
  $_GET['tabela']="Livro";
  $_GET['acao']="listaLivro";
  require("./backend/listagem.php");
?>
<h2 class="pb-2">Lista de Livros</h2>
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
          
          echo '<td><a data-bs-toggle="modal" data-bs-target="#editarModal" class="text-info" data-id="' . $livros[$key]["id_livro"] . 'data-toggle="modal">         
          <span class="material-icons" data-toggle="tooltip" title="Editar">edit</span>
          </a></td>';

          echo '<td><a data-bs-toggle="modal" data-bs-target="#excluirModal" class="text-danger" data-id="' . $livros[$key]["id_livro"] . 'data-toggle="modal">         
          <span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span>
          </a></td>';
          echo "</tr>";
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
          //$_POST['id']=1;
          
          require("./forms/formsLivro.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
          $_POST['id']=1;
          require("./forms/formsLivro.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Excluir -->
<div class="modal fade" id="excluirModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir Livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Voce tem certeza que deseja excluir a Livro X?</p>
        <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger">Deletar</button>
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
