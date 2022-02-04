<?php
    session_start();

    $_GET['acao'] = 'infoCliente';
    $_GET['id'] = $_SESSION['id_cliente'];
    
    require("../../../modules/cliente/atualizar.php");
    if(empty($cliente)) {
        $_SESSION['mensagem'] = 'Nao foi possivel recuperar seus dados. Tente em outro momento';
        $_SESSION['tipo-mensagem'] = 'warning';
        $cliente = array(
        'nome' => '',
        'data_nasc' => '',
        'email' => '');
    }
?>
<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-4">Editar Dados</h5>
        <?php include '../../common/notificacao.php'; ?>
        <form class="row g-3" action="../../../modules/cliente/atualizar.php" method="POST">
            <div class="row pt-2">
                <div class="col-md-8">
                    <label for="inputNome" class="form-label">Nome Completo</label>
                    <input type="text"class="form-control" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="inputDataNasc" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?php echo $cliente['data_nasc']; ?>" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['email']; ?>"  required>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-12 text-center d-grid gap-2">
                    <input type="hidden" id="acao" name="acao" value="alterarCliente">
                    <button type="submit" class="btn btn-primary mt-2">Alterar dados</button>
                </div>
            </div>
        </form>
        <br/>
    </div>
</div>