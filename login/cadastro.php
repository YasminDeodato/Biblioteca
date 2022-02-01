<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title mb-4">Cadastro de conta</h5>
        <form class="row g-3" action="../backend/cliente/cadastrar.php" method="POST">
            <div class="col-8">
                <label for="inputNome" class="form-label">Nome Completo</label>
                <input type="text" maxlength="200" class="form-control" id="nome" name="nome" required autofocus>
            </div>
            <div class="col-4">
                <label for="inputDataNasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
            </div>
            <div class="col-12">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <label for="inputSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="col-12 text-center d-grid gap-2">
                <button type="submit" class="btn btn-primary mt-2">Criar conta</button>
            </div>
        </form>
        <br/>

        <p class="small text-center">
            Já possui uma conta? <a href="login.php" class="text-decoration-none">Faça o Login</a><br/>
        </p>  
    </div>
</div>