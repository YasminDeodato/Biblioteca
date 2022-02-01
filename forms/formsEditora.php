<?php
    if(count($_POST)>0) {
      $id = $_POST['id'];
      $_GET['tabela'] = 'Editora';
      $_GET['acao'] = 'infoEditora';
      $_GET['id'] = $id;
      include "backend/listagem.php";
      $forms = 'atualizar.php';
      $botao = 'Salvar';
    } else {
      $editora = array("nome"=>"");
      $id='';
      $forms = 'cadastrar.php';
      $botao = 'Cadastrar';
    }
?>
<div class="container-fluid">
  <form class="row g-3" action="./backend/<?php echo $forms; ?>" method="POST">
    <div class="col-md-8">
      <label for="inputNome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value=<?php echo '"' . $editora["nome"] .'"' ?> required>
    </div>
    <div class="col-12">
      <input type="hidden" id="tabela" name="tabela" value="Editora">
      <input type="hidden" id="id_editora" name="id_editora" value=<?php echo '"' . $id .'"' ?>>
      <button type="submit" class="btn btn-primary mt-2"><?php echo $botao;?></button>
    </div>
  </form>
</div>