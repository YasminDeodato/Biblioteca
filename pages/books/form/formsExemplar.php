<?php
    $id = $_POST['id'];
    $_POST['tabela'] = 'Exemplar';
  
    $_POST['acao'] = 'infoExemplar';
    $forms = 'atualizar.php';
    $botao = 'Salvar';
    
    if(empty($_POST['id_exemplar'])) {
      $_POST['acao'] = 'proximoCodigo';
      $forms = 'cadastrar.php';
      $botao = 'Cadastrar';
    }
    
    require("../../modules/books/listagem.php");
    
    if(!empty($codigoProx) || empty($exemplar)) {
      $exemplar = array(
        "id_exemplar"=> $codigoProx, 
        "status_e"=> "", 
        "id_livro" => $id);
    }
?>
<div class="container-fluid">
  <form class="row g-md-0 g-sm-0 g-xs-0" action="../../modules/books/<?php echo $forms; ?>" method="POST">
    <div class="row">
      <div class="col-md-4">
        <label for="inputCodigoExemplar" class="form-label">Codigo</label>
        <input type="number" class="form-control" id="id_e" name="id_e" value="<?php echo $exemplar['id_exemplar']; ?>" disabled>
      </div>
      <div class="col-md-8">
        <label for="inputStatusExemplar" class="form-label">Status</label>
        <select class="form-select" name="status_e" id="status_e">
          <option value="Disponivel" <?php if($exemplar['status_e'] == 'Disponivel') echo 'selected'; ?>>Disponivel</option>
          <option value="Alugado" <?php if($exemplar['status_e'] == 'Alugado') echo 'selected'; ?>>Alugado</option>
          <option value="Reservado" <?php if($exemplar['status_e'] == 'Reservado') echo 'selected'; ?>>Reservado</option>
          <option value="Indisponivel" <?php if($exemplar['status_e'] == 'Indisponivel') echo 'selected'; ?>>Indisponivel</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <input type="hidden" id="tabela" name="tabela" value="Exemplar">
        <input type="hidden" id="id_livro" name="id_livro" value="<?php echo $exemplar['id_livro']; ?>">
        <input type="hidden" id="id_exemplar" name="id_exemplar" value="<?php echo $exemplar['id_exemplar']; ?>">
        <button type="submit" class="btn btn-primary mt-2"><?php echo $botao; ?></button>
      </div>
    </div>
  </form>
</div>