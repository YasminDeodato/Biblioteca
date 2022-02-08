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
   <div class="bg-image"  style="background-image: url('../../../public/assets/imgs/bg.jpg'); height: 100vh;">
        <div class="mask h-100 w-100" style="background-color: rgba(0, 0, 0, 0.6);">
        
        <main class="flex-shrink-0">
            <div class="col text-center pt-2">
                <a href="../../funcionario/login.php"><button type="submit" class="btn btn-primary mt-2">&Aacute;rea de Funcion&aacute;rios</button></a>
            </div>
            <div class="container pt-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-md-6">
                        <!--Conteudo-->
                        <?php
                            if(count($_GET)>0) {
                                $url = $_GET['acao'] . ".php";
                                include_once $url;
                            } else {
                                include_once 'login-cliente.php';
                            }
                            ?>
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