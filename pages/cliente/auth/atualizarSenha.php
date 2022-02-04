<?php
    session_start();

    $_GET['acao'] = 'infoSenhaCliente';
    $_GET['id'] = $_SESSION['id_cliente'];
    
    require("../../../modules/cliente/atualizar.php");
    //echo 'Senha ' . $clienteSenha; 
?>
<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-4">Atualizar senha</h5>
        <?php include '../../common/notificacao.php'; ?>
        <form class="row g-3" action="#" method="POST">
            <div class="row pt-2">
                <div class="col-10">
                    <label for="inputSenha" class="form-label">Senha atual</label>
                    <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" oninput="verificaTamanho()">
                </div>
                <div class="col-2">
                    <div class="form-check form-check-inline">
                        <label class="form-label">Verificar</label><br/>
                        <input class="form-check-input" type="checkbox" id="verificaCheckbox" value="Verifique senha atual" oninput="verificaSenha()" required>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-12">
                    <label for="inputSenha" class="form-label">Nova senha</label>
                    <input type="password" class="form-control" id="senhaNova" name="senhaNova" disabled>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-12">
                    <label for="inputSenhaConfirmar" class="form-label">Confirme a nova senha</label>
                    <input type="password" class="form-control" id="senhaConf" name="senhaConf" disabled>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-12 text-center d-grid gap-2">
                    <input type="hidden" id="acao" name="acao" value="alterarSenha">
                    <button type="submit" class="btn btn-primary mt-2">Alterar senha</button>
                </div>
            </div>
        </form>
        <br/>
    </div>
</div>
<script>
    var senhaAtual = document.getElementById("senhaAtual");
    var senhaNova = document.getElementById("senhaNova");
    var senhaConf = document.getElementById("senhaConf");
    var verificaCheck = document.getElementById("verificaCheckbox");

    function verificaSenha() {
        //console.log(''.concat('Tamanho: ', ' ', senhaAtual.value.length));
        if(verificaCheck.checked) {
            if(senhaAtual.value.length != 0) {
                senhaNova.disabled = false;
                senhaConf.disabled = false;
            }
            //console.log("<?php echo 'Oioi' . $clienteSenha;?>");
        } else {
            senhaNova.disabled = true;
            senhaConf.disabled = true;
        }        
        //var senhaAtualCripto = require()
    }

    function verificaTamanho() {
        if(senhaAtual.value.length == 0){
            senhaNova.disabled = true;
            senhaConf.disabled = true;
        }
    }

</script>