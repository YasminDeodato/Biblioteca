<?php
    if(count($_POST)>0) {
      $id = $_POST['id'];
      $_GET['tabela'] = 'Livro';
      $_GET['acao'] = 'infoLivro';
      $_GET['id'] = $id;
      include "backend/listagem.php";
    } else {
      $_GET['tabela'] = 'Livro';
      $_GET['acao'] = 'cadastroLivro';
      include "backend/listagem.php";
      
      $livro = array("titulo"=>"", "ano"=>"2022", "faixa_etaria"=>"", "idioma"=>"", "n_paginas"=>"0");
      //$editoras= array("Intrinseca"=>1, "Rocco"=>2, "ABALBASLD"=>3);
      //$autores = array("Fulano"=>1, "Ciclano"=>2, "Beltrano"=>3, "AAAAA"=>4);
    }
?>
<div class="container-fluid">
  <form class="row g-3" action="./backend/cadastrar.php" method="POST">
    <div class="col-md-8">
      <label for="inputNome" class="form-label">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value=<?php echo '"' . $livro["titulo"] .'"' ?>>
    </div>
    <div class="col-md-4">
      <label for="inputIdioma" class="form-label">Idioma</label>
      <input class="form-control" list="idiomas" name="idioma" id="idioma" placeholder="Digite para pesquisar...">
      <datalist id="idiomas">
        <option value="Alemao">
        <option value="Chines">
        <option value="Espanhol">
        <option value="Ingles">
        <option value="Portugues">
      </datalist>
    </div>

    <div class="col-md-8">
      <label for="inputAutores" class="form-label">Autores</label>
        <?php 
          foreach ($autores as $a => $id) {
            echo '<br/><input class="form-check-input me-1" type="checkbox" name="autor[]" id="' . $a . '" value="' . $a . '">' . $autores[$a]['nome'];
          }
        ?>
    </div>
    
    <div class="col-md-4">
      <label for="inputFaixaEtaria" class="form-label">Faixa Etaria</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="0">
        <label class="form-check-label">Livre</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="6">
        <label class="form-check-label">0 a 6 anos</label>
      </div>   
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="10">
        <label class="form-check-label">10 anos</label>
      </div>   
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="12">
        <label class="form-check-label">12 anos</label>
      </div>  
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="14">
        <label class="form-check-label">14 anos</label>
      </div>  
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="16">
        <label class="form-check-label">16 anos</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="faixa_etaria" value="18">
        <label class="form-check-label">a partir de 18 anos</label>
      </div>  
    </div>
    
    
    <div class="col-md-4">
      <label for="inputEditora" class="form-label">Editora</label>
      <input class="form-control" list="editoras" id="editora" placeholder="Digite para pesquisar...">
      <datalist id="editoras">
        <?php 
              foreach($editoras as $e) {
                echo '<option id="' . $e['id_editora'] . '" value="' . $e['nome'] .'">';
                echo '<input type="hidden" id="id_editora" name="id_editora" value="' . $e['id_editora']. '">';
              }
        ?>
      </datalist>
    </div>

    <div class="col-md-4">
      <label for="inputAno" class="form-label">Ano de Publicacao</label>
      <input type="number" class="form-control" id="ano" name="ano" min="1850" max="2022" step="1" value=<?php echo '"' . $livro["ano"] .'"' ?>>
    </div>

    <div class="col-md-4">
      <label for="inputNPaginas" class="form-label">Numero de Paginas</label>
      <input type="number" class="form-control" id="paginas" name="paginas" min="0" max="1000" step="1" value=<?php echo '"' . $livro["n_paginas"] .'"' ?>>
    </div>
    
    <div class="col-12">
      <input type="hidden" id="tabela" name="tabela" value="Livro">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </form>
</div>