<?php
    if(count($_POST)>0) {
      $id = $_POST['id'];
      $_GET['tabela'] = 'Livro';
      $_GET['acao'] = 'infoLivro';
      $_GET['id'] = $id;
      require("../../modules/books/listagem.php");
      $forms = 'atualizar.php';
      $botao = 'Salvar';
    } else {
      $_GET['tabela'] = 'Livro';
      $_GET['acao'] = 'cadastroLivro';
      require("../../modules/books/listagem.php");
      $autoresSel = array(array('nome' => '', 'id_autor' => ''));
      $livro = array("titulo"=>"", "ano"=>"2022", "faixa_etaria"=>"-1", "idioma"=>"", "n_paginas"=>"0",
      "autoresSel" => $autoresSel);
      $id='';
      $forms = 'cadastrar.php';
      $botao = 'Cadastrar';
    }
?>
<div class="container-fluid">
  <form class="row mt-2" action="../../modules/books/<?php echo $forms; ?>" method="POST">
    <div class="row">
      <div class="col-auto col-md-8">
        <label for="inputNome" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" size=200 value="<?php echo $livro['titulo']; ?>">
      </div>
      <div class="col-auto col-md-4">
        <label for="inputIdioma" class="form-label">Idioma</label>
        <select class="form-select" name="idioma" id="idioma">
          <option value="Alemao" <?php if($livro['idioma'] == 'Alemao') echo 'selected'; ?>>Alemao</option>
          <option value="Chines" <?php if($livro['idioma'] == 'Chines') echo 'selected'; ?>>Chines</option>
          <option value="Espanhol" <?php if($livro['idioma'] == 'Espanhol') echo 'selected'; ?>>Espanhol</option>
          <option value="Ingles" <?php if($livro['idioma'] == 'Ingles') echo 'selected'; ?>>Ingles</option>
          <option value="Portugues" <?php if($livro['idioma'] == 'Portugues') echo 'selected'; ?>>Portugues</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-auto col-md-8">
        <label for="inputAutores" class="form-label">Autores</label>
          <?php 
            foreach ($autores as $a => $id) {
              echo '<br/><input class="form-check-input me-1" type="checkbox" name="autor[]" id="' . $a . '" value="' . $autores[$a]['id_autor'] . '" ';
              foreach($livro['autoresSel'] as $autoresSel) {
                if ($autoresSel['nome'] == $autores[$a]['nome']) echo ' checked';
              }
              echo '>' . $autores[$a]['nome'];
            }
          ?>
      </div>
    
      <div class="col-auto col-md-4">
        <label for="inputFaixaEtaria" class="form-label">Faixa Etaria</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="0" <?php if($livro['faixa_etaria'] == 0) echo ' checked'; ?>>
          <label class="form-check-label">Livre</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="6" <?php if($livro['faixa_etaria'] == 6) echo ' checked'; ?>>
          <label class="form-check-label">0 a 6 anos</label>
        </div>   
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="10" <?php if($livro['faixa_etaria'] == 10) echo ' checked'; ?>>
          <label class="form-check-label">10 anos</label>
        </div>   
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="12" <?php if($livro['faixa_etaria'] == 12) echo ' checked'; ?>>
          <label class="form-check-label">12 anos</label>
        </div>  
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="14" <?php if($livro['faixa_etaria'] == 14) echo ' checked'; ?>>
          <label class="form-check-label">14 anos</label>
        </div>  
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="16" <?php if($livro['faixa_etaria'] == 16) echo ' checked'; ?>>
          <label class="form-check-label">16 anos</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="faixa_etaria" value="18" <?php if($livro['faixa_etaria'] == 18) echo ' checked'; ?>>
          <label class="form-check-label">a partir de 18 anos</label>
        </div>  
      </div>
    </div>

    <div class="row">
      <div class="col-auto col-md-4">
        <label for="inputEditora" class="form-label">Editora</label>
        <select class="form-select" name="id_editora" id="id_editora">
          <?php 
            foreach($editoras as $e => $id) {
              echo '<option value="' . $editoras[$e]['id_editora'] . '"';
              if($livro['editora'] == $editoras[$e]['nome']) echo ' selected';
              echo '>' . $editoras[$e]['nome'] . '</option>';
            }
          ?>
        </select>
      </div>

      <div class="col-auto col-md-4">
        <label for="inputAno" class="form-label">Ano de Publicacao</label>
        <input type="number" class="form-control" id="ano" name="ano" min="1850" max="2022" step="1" value=<?php echo '"' . $livro["ano"] .'"' ?>>
      </div>

      <div class="col-auto col-md-4">
        <label for="inputNPaginas" class="form-label">Numero de Paginas</label>
        <input type="number" class="form-control" id="paginas" name="paginas" min="0" max="1000" step="1" value=<?php echo '"' . $livro["n_paginas"] .'"' ?>>
      </div>
    </div>
    
    <div class="row mt-2">
      <div class="col-auto col-12">
        <input type="hidden" id="tabela" name="tabela" value="Livro">
        <input type="hidden" id="id_livro" name="id_livro" value="<?php echo $livro['id_livro']; ?>">
        <button type="submit" class="btn btn-primary"><?php echo $botao; ?></button>
      </div>
    </div>
  </form>
</div>