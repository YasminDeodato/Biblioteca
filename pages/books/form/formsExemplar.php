<?php
    $id = $_POST['id'];
    $_POST['tabela'] = 'Exemplar';
    require("../../modules/books/listagem.php");

    if(empty($exemplar)) {
        $exemplar = array("id_exemplar"=>$codigo, "status_e"=>"", "id_livro" => "");
    }
?>
<div class="container-fluid">
  <form class="row g-md-0 g-sm-0 g-xs-0" action="#" method="POST">
    <div class="row">
      <div class="col-md-4">
        <label for="inputCodigoExemplar" class="form-label">Codigo</label>
        <input type="number" class="form-control" id="codigo" name="codigo" value="<?php echo $exemplar['codigo']; ?>" disabled>
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
        <input type="hidden" id="id_autor" name="id_livro" value="<?php echo $exemplar['id_livro']; ?>">
        <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
      </div>
    </div>
  </form>
</div>