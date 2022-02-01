<?php session_start(); ?>
<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-4">Login</h5>
        <?php if($_SESSION["mensagem"]) { ?>
            <div class="alert alert-<?php echo $_SESSION["tipo-mensagem"]; ?> alert-dismissible fade show" role="alert">
                <strong>Notificacao: </strong><?php echo $_SESSION["mensagem"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }
            session_unset();
        ?>
        <form class="row g-3" action="../backend/cliente/login.php" method="POST">
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
            Ainda não tem uma conta? <a href="login.php?acao=cadastro" class="text-decoration-none">Cadastre-se</a>
        </p>
    </div>
</div>