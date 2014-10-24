<div id="form_login" class="jumbotron col-md-6 col-md-offset-4" >
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="pessoa_login" class="direita">
                Login:
                <span class="requerido">*</span>
            </label>
            <input type="text" class="form-control" name="Pessoa[login]" id="pessoa_login" size="30" required="required" placeholder="Seu usuário">
        </div>
        <div class="form-group">
            <label for="pessoa_senha" class="direita">
                Senha:
                <span class="requerido">*</span>
            </label>
            <input type="password" class="form-control" name="Pessoa[senha]" id="pessoa_senha" size="30" required="required" placeholder="Sua senha">
        </div>
        <button type="submit" class="btn btn-success">Logar</button>
    </form>
</div>