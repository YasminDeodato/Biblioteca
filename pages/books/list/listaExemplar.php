<?php
  session_start();

 if(!empty($_SESSION['id_livro']) && empty($_POST['id'])) {
    $_POST['id'] = $_SESSION['id_livro'];
  }

  if(!empty($_POST['id'])) {      
    $_POST['tabela']="Exemplar";
    $_POST['acao'] = "listaExemplar";
    $idLivro = $_POST['id'];
    $_POST['id_livro']= $idLivro;
  }   

  //obter nomes de todos os livros
  $_GET['tabela']="Livro";
  $_GET['acao']="nomeLivro";
  require("../../modules/books/listagem.php");

  if(empty($exemplares) && !empty($_POST['id']))  {
    $_SESSION["mensagem"] = 'Ainda nao ha exemplares deste livro';
    $_SESSION["tipo-mensagem"] = 'warning';
  }
?>

<form class="g-md-0 g-sm-0 g-xs-0" action="../../pages/books/index.php?acao=listaExemplar" method="POST">
  <div class="row pb-4">
    <div class="col-md-6 col-auto">
      <select class="form-select" name="id" id="id">
          <option value="" selected disabled>Escolha o Livro</option>
          <?php 
            foreach($livros as $key => $value) {
              echo '<option value="' .  $livros[$key]['id_livro']  . '"';
              if($idLivro == $livros[$key]['id_livro']) echo ' selected';
              echo '>' .  $livros[$key]['titulo'] . '</option>';
            }
          ?>
        </select>
    </div>
    <div class="col-md-4 col-auto">
        <input type="hidden" id="acao" name="acao" value="listaExemplar">
        <button type="submit" class="btn btn-primary" id="botaoPesquisa">Pesquisar Exemplares</button>
    </div>
  </div>
</form>
<?php 
  include '../../pages/common/notificacao.php';
?>
<hr/>
<div class="col pb-2">
  <a data-bs-toggle="modal" data-bs-target="#cadastrarModal" data-toggle="modal" class="btn btn-primary mb-2 <?php if(empty($_POST['id'])) echo 'disabled'; ?>">
    <span class="material-icons align-middle">add</span>Adicionar Exemplar
  </a>
</div>
<div class="table-responsive" id="tableExemplar">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Status</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if(!empty($exemplares)) {
          foreach ($exemplares as $key => $value) {
              echo "<tr>";
              echo '<td>' . $exemplares[$key]['id_exemplar']. '</td>';
              echo '<td>' . $exemplares[$key]['status_e']. '</td>';
              
              echo '<td><a data-bs-toggle="modal" data-bs-target="#editarModal'. $exemplares[$key]["id_exemplar"] . '" class="text-info" data-id="' . $exemplares[$key]["id_exemplar"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Editar">edit</span></a></td>';

              echo '<td><a data-bs-toggle="modal" data-bs-target="#excluirModal'. $exemplares[$key]["id_exemplar"] . '" class="text-danger" data-id="' . $exemplares[$key]["id_exemplar"] . '" data-toggle="modal"><span class="material-icons" data-toggle="tooltip" title="Excluir">delete</span></a></td>';

              echo "</tr>";
      ?>     

            <!-- Modal Editar -->
            <div class="modal fade" id="editarModal<?php echo $exemplares[$key]["id_exemplar"]; ?>" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Editar Exemplar <?php echo $exemplares[$key]["id_exemplar"]; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>
                  <div class="modal-body">
                  <?php 
                      unset($_POST['acao']);
                      unset($_POST['tabela']);
                      unset($_GET['tabela']);
                      unset($_GET['acao']);
                      $_POST['id_exemplar'] =  $exemplares[$key]["id_exemplar"];
                      require("../../pages/books/form/formsExemplar.php");
                  ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Excluir -->
          <div class="modal fade" id="excluirModal<?php echo $exemplares[$key]["id_exemplar"]; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Excluir exemplar <?php echo $exemplares[$key]["id_exemplar"]; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3" action="../../modules/books/deletar.php" method="POST">
                  <div class="modal-body mt-2">
                    <p>Voce tem certeza que deseja excluir o exemplar nº <?php echo $exemplares[$key]["id_exemplar"];?>?</p>
                    <p class="text-danger"><small>Essa acao nao pode ser desfeita.</small></p>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" id="tabela" name="tabela" value="Exemplar">
                    <input type="hidden" id="id_exemplar" name="id_exemplar" value="<?php echo $exemplares[$key]["id_exemplar"]; ?>">
                    <input type="hidden" id="id_livro" name="id_livro" value="<?php echo $exemplares[$key]["id_livro"]; ?>">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      
      <?php
          }
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Exemplar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <?php 
          unset($_POST['id_exemplar']);
          require("../../pages/books/form/formsExemplar.php");
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<?php 
  unset($_SESSION['id_livro']);
  unset($_POST['id']);
  unset($_POST['id_exemplar']);
  unset($_POST['acao']);
  unset($_POST['tabela']);
  unset($_GET['tabela']);
  unset($_GET['acao']);
?>