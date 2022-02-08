<?php
    session_start();

    //conecta BD
    if($_GET['acao'] == 'listaReservaFunc') {
        require('../../modules/conectaBD.php');
    } else {
        require('../../../modules/conectaBD.php');
    }

    if(count($_GET)>0) {
        $tabela = $_GET['tabela'];
        $acao = $_GET['acao'];

        if($tabela == 'Livro') {
            if($acao == 'nomeLivro') {
                $results = $mysqli_connection->query("SELECT id_livro, titulo FROM Livro ORDER BY titulo ASC");   
            
                $livros = array();
                $i=0;
                while($row = $results->fetch_assoc()) {
                    $livros[$i] = array(
                        'id_livro' => $row['id_livro'],
                        'titulo' => $row['titulo']
                    );
                    $i++;
                }
            }
        }

        if($tabela == 'Reserva') {
            if($acao == 'listaReserva') {
                $id_cliente = $_SESSION['id_cliente'];

                $sql = "SELECT * FROM Reserva
                JOIN Exemplar ON Reserva.id_exemplar = Exemplar.id_exemplar
                JOIN Livro ON Livro.id_livro = Exemplar.id_livro
                WHERE Reserva.id_cliente = " . $id_cliente . " ORDER BY data_fim DESC, status_r";
                
                $results = $mysqli_connection->query($sql);   
            
                $reservas = array();
                $i=0;
                while($row = $results->fetch_assoc()) {
                    $reservas[$i] = array(
                        'id_reserva' => $row['id_reserva'],
                        'id_exemplar' => $row['id_exemplar'],
                        'id_cliente' => $row['id_cliente'],
                        'id_func' => $row['id_func'],
                        'data_inicio' => $row['data_inicio'],
                        'data_fim' => $row['data_fim'],
                        'status_r' => $row['status_r'],
                        'multa' => $row['multa'],
                        'titulo_livro' => $row['titulo']
                    );
                    $i++;
                }
            }

            if($acao == 'listaReservaFunc') {
                $id_func = $_SESSION['id_func'];

                $sql = "SELECT * FROM Reserva
                JOIN Exemplar ON Reserva.id_exemplar = Exemplar.id_exemplar
                JOIN Livro ON Livro.id_livro = Exemplar.id_livro
                JOIN Cliente ON Cliente.id_cliente = Reserva.id_cliente
                WHERE isnull(Reserva.id_func) OR Reserva.id_func = " . $id_func .
                " ORDER BY data_fim, status_r;";

                $results = $mysqli_connection->query($sql);   
                            
                $reservas = array();
                $i=0;
                while($row = $results->fetch_assoc()) {
                    $reservas[$i] = array(
                        'id_reserva' => $row['id_reserva'],
                        'id_exemplar' => $row['id_exemplar'],
                        'id_cliente' => $row['id_cliente'],
                        'nome_cliente' => $row['nome'],
                        'id_func' => $row['id_func'],
                        'data_inicio' => $row['data_inicio'],
                        'data_fim' => $row['data_fim'],
                        'status_r' => $row['status_r'],
                        'multa' => $row['multa'],
                        'titulo_livro' => $row['titulo']
                    );
                    $i++;
                }
            }
        }
    }

    if(count($_POST)>0) {
        $tabela = $_POST['tabela'];
        $acao = $_POST['acao'];

        if($tabela == "Exemplar") {
            if($acao == "listaExemplar") {
               $id_livro = $_POST['id_livro'];
               $id_cliente = $_SESSION['id_cliente'];

               //verifica se o cliente ja possui 
               //reservas deste exemplar
               $permissao = true;
               $sqlTeste = "SELECT Reserva.id_reserva FROM Exemplar
                JOIN Reserva ON Reserva.id_exemplar = Exemplar.id_exemplar
                JOIN Livro ON Livro.id_livro = Exemplar.id_livro
                WHERE Reserva.status_r <> 'Finalizada' AND Reserva.id_cliente = " . $id_cliente . " AND Livro.id_livro = " . $id_livro . ";";
               $results = $mysqli_connection->query($sqlTeste); 
              
                while($row = $results->fetch_assoc()) {
                    $permissao = false;
                    $_SESSION['mensagem'] = 'Voce ja possui uma reserva deste livro no momento!';
                    $_SESSION['tipo-mensagem'] = 'warning';
                }
              
                if($permissao) {
                    $sql = "SELECT * FROM Exemplar WHERE id_livro = " . $id_livro . " AND status_e = 'Disponivel' ORDER BY id_exemplar";
                    $results = $mysqli_connection->query($sql);   
                    
                    $exemplares = array();
                    $i=0;
                    while($row = $results->fetch_assoc()) {
                      $exemplares[$i] = array(
                        'id_exemplar' => $row['id_exemplar'],
                        'status_e' => $row['status_e'],
                        'id_livro' => $row['id_livro']);
                        $i++;
                    }

                    if(empty($exemplares)) {
                        $_SESSION['mensagem'] = 'Nao ha exemplares deste livro disponiveis!';
                        $_SESSION['tipo-mensagem'] = 'warning';
                    }
                }

            }
        }
    }

  //fechar conexão com banco de dados
  $mysqli_connection->close();
?>