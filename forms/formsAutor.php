<?php
    if(count($_POST)>0) {
      $id = $_POST['id'];
      $_GET['tabela'] = 'Autor';
      $_GET['acao'] = 'infoAutor';
      $_GET['id'] = $id;
      include "backend/listagem.php";
      $forms = 'atualizar.php';
      $botao = 'Salvar';
    } else {
      $autor = array("nome"=>"", "data_nasc"=>"");
      $id='';
      $forms = 'cadastrar.php';
      $botao = 'Cadastrar';
    }
?>
<div class="container-fluid">
  <form class="row g-3" action="./backend/<?php echo $forms; ?>" method="POST">
    <div class="col-md-8">
      <label for="inputNome" class="form-label">Nome</label>
      <input type="text" maxlength="200" class="form-control" id="nome" name="nome" value=<?php echo '"' . $autor["nome"] .'"' ?> required>
    </div>
    <div class="col-md-4">
      <label for="inputDataNasc" class="form-label">Data de Nascimento</label>
      <input type="date" class="form-control" id="data_nasc" name="data_nasc" value=<?php echo '"' . $autor["data_nasc"] .'"' ?> required>
    </div>
    <div class="col-12">
      <input type="hidden" id="tabela" name="tabela" value="Autor">
      <input type="hidden" id="id_autor" name="id_autor" value=<?php echo '"' . $id .'"' ?>>
      <button type="submit" class="btn btn-primary mt-2"><?php echo $botao;?></button>
    </div>
  </form>
</div>