<div id="form_login" class="center jumbotron col-md-6 col-md-offset-4" >
    <form action="<?=Base::baseUrl()?>login/loginAuth/" method="POST">
        <div class="form-group">
            <label for="pessoa_login">Login</label>
            <input type="text" class="form-control" name="Login[cpf]" id="pessoa_login" size="30" required="required" placeholder="Seu cpf. Com ponto e hífen.">
            <label>Ex: 000.000.000-00</label>
        </div>
        <div class="form-group">
            <label for="pessoa_senha">Senha</label>
            <input type="password" class="form-control" name="Login[senha]" id="pessoa_senha" size="30" required="required" placeholder="Sua senha">
        </div>
        <button type="submit" class="btn btn-success">Logar</button>
    </form>
</div>