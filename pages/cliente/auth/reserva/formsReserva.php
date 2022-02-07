<?php
    session_start();

    $id_livro = $_POST['id'];

    if(!empty($_POST['id'])) {      
      $_POST['tabela']="Exemplar";
      $_POST['acao'] = "listaExemplar";
      $_POST['id_livro']= $id_livro;
    }   
  
    //obter nomes de todos os livros
    $_GET['tabela']="Livro";
    $_GET['acao']="nomeLivro";
    require("../../../modules/reserva/listagem.php");
  
    $reserva = array(
      "data_inicio"=>date('Y-m-d'),
      "data_fim"=>date('Y-m-d', strtotime($date. ' + 7 days')),
      "status_r"=> 'Em analise',
      "id_exemplar" => $exemplares[0]['id_exemplar']
    );

    $forms = 'cadastrar.php';
    $botao = 'Solicitar reserva';
?>
<div class="container-fluid">
  <h4 class="pb-4">Solicitar Reserva</h4>
  <?php if(!empty($_SESSION['mensagem'])) {
      include("../../common/notificacao.php"); 
  } ?>
  <form class="g-md-0 g-sm-0 g-xs-0" action="../../../pages/cliente/auth/index.php?acao=formsReserva&sub=reserva" method="POST">
    <div class="row pb-4">
      <div class="col-md-8 col-auto">
        <select class="form-select" name="id" id="id">
          <option value="" selected disabled>Escolha o Livro</option>
          <?php 
            foreach($livros as $key => $value) {
              echo '<option value="' .  $livros[$key]['id_livro']  . '"';
              if($id_livro == $livros[$key]['id_livro']) echo ' selected';
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
  <form action="../../../modules/reserva/cadastrar.php" method="POST">
    <div class="row">
      <div class="col-md-4">
        <label for="inputExemplar" class="form-label">Exemplar</label>
        <input type="number" class="form-control" id="id_exemplar" name="id_exemplar" value="<?php echo $reserva['id_exemplar']; ?>" disabled>
      </div>
      <div class="col-md-4">
        <label for="inputDataInicioReserva" class="form-label">Data de Inicio (Previsao)</label>
        <input type="date" class="form-control" value="<?php echo $reserva['data_inicio']; ?>" disabled>
      </div>
      <div class="col-md-4">
        <label for="inputDataFimReserva" class="form-label">Data final (Previsao)</label>
        <input type="date" class="form-control" value="<?php echo $reserva['data_fim']; ?>" disabled>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-2">
        <input type="hidden" id="tabela" name="tabela" value="Reserva">
        <input type="hidden" id="data_inicio" name="data_inicio" value="<?php echo $reserva['data_inicio']; ?>">
        <input type="hidden" id="data_fim" name="data_fim" value="<?php echo $reserva['data_fim']; ?>">
        <input type="hidden" id="status_r" name="status_r" value="<?php echo $reserva['status_r']; ?>">
        <input type="hidden" id="id_exemplar" name="id_exemplar" value="<?php echo $reserva['id_exemplar']; ?>">
        <button type="submit" class="btn btn-primary mt-2" <?php if(empty($exemplares)) echo 'disabled'; ?>><?php echo $botao; ?></button>
      </div>
    </div>
  </form>
</div>