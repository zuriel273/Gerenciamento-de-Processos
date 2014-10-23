<?php 

include_once 'model/class.base.php'; 
import();

$sessao = session_id();
if(empty($sessao))
    session_start();


$conn = new Conexao(BD());
$url = "cadastro.php";

if(isset($_SESSION['logado'])){ redireciona($url); } 

?>
<!DOCTYPE html>
<html>
<head>
    <?php getJs(); getCss(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Pessoas :: Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <div class="form padding">
            <div class="conteudo_login">
                <header id="titulo"><span class="icon-user" style="margin-right: 10px;"></span>Login</header>
                <div class="campos">
                    <div class="ln">
                        <div class="_30">
                            <label for="pessoa_login" class="direita">
                                Login:
                                <span class="requerido">*</span>
                            </label>
                        </div>
                        <div class="_70 ">
                            <input type="text" name="Pessoa[login]" id="pessoa_login" size="30" required="required">
                        </div>
                    </div>
                    <div class="ln">
                        <div class="_30">
                            <label for="pessoa_senha" class="direita">
                                Senha:
                                <span class="requerido">*</span>
                            </label>
                        </div>
                        <div class="_70">
                            <input type="password" name="Pessoa[senha]" id="pessoa_senha" size="30" required="required">
                        </div>
                    </div>
                </div>
                <div class="ln footer">
                    <div class="bt">
                        <input class="btn btn-success" type="submit" value="Logar" name="logar">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>