<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Icones -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
  <title>Biblioteca</title>
</head>
<body>
    <?php
        session_unset();
    ?>
   <div class="bg-image"  style="background-image: url('../../public/assets/imgs/bg.jpg'); height: 100vh;">
        <div class="mask h-100 w-100" style="background-color: rgba(0.5, 0.2, 0.5, 0.4);">
            <div class="col text-center pt-2">
                <button type="submit" class="btn btn-primary mt-2 disabled"><span class="material-icons align-middle fs-6">lock</span> &Aacute;rea Restrita de Funcion&aacute;rios</button>
            </div>
        <main class="flex-shrink-0">
            <div class="container pt-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-md-6 col-auto">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Acesso ao Sistema - &Aacute;rea de Funcion&aacute;rios</h5>
                                <?php include '../common/notificacao.php'; ?>
                                <form class="row g-3" action="../../modules/funcionario/login.php" method="POST">
                                    <div class="col-12">
                                        <label for="inputNome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" autofocus required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAcesso" class="form-label">Acesso</label>
                                        <input type="number" minlength="6" maxlength="6" class="form-control" id="acesso" name="acesso" required>
                                    </div>
                                    
                                    <div class="col-12 text-center d-grid gap-2">
                                        <button type="submit" class="btn btn-primary mt-2">Entrar</button>
                                    </div>
                                </form>
                                <br/>
                                <p class="small text-center">
                                    Qualquer problema de acesso entre em contato com o supervisor!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
                
        </div>
    </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>                                		                            