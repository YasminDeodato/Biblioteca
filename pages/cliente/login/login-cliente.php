<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-4">Login</h5>
        <?php include '../../common/notificacao.php'; ?>
        <form class="row g-3" action="../../../modules/cliente/login.php" method="POST">
            <div class="col-12">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" autofocus required>
            </div>
            <div class="col-12">
                <label for="inputSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-12 text-center d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-2">Entrar</button>
            </div>
        </form>
        <br/>
        <p class="small text-center">
            <a href="login.php?acao=recupera" class="text-decoration-none">Esqueceu a senha?</a><br/>
            Ainda n&atilde;o tem uma conta? <a href="login.php?acao=cadastro" class="text-decoration-none">Cadastre-se</a>
        </p>
    </div>
</div>