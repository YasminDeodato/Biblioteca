<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-2">Recuperação de Conta</h5>
        <h6 class="card-subtitle mb-4 text-muted fw-normal">Vamos te enviar um e-mail com as instruções para recuperação da sua conta!</h6>

        <form class="row g-3" action="#" method="POST">
            <div class="col-12">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" maxlength="200" class="form-control" id="email" name="email" autofocus required>
            </div>
            <div class="col-12 text-center d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-2">Recuperar senha</button>
            </div>
        </form>
        <br/>
        <p class="small text-center">
            Já possui uma conta? <a href="login.php" class="text-decoration-none">Faça o Login</a><br/>
        Ainda não tem uma conta? <a href="login.php?acao=cadastro" class="text-decoration-none">Cadastre-se</a>
        </p>        
    </div>
</div>