<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=Base::$system_name." :: ".Base::$page_title?></title>
    <link rel="stylesheet" href="<?=Base::baseURL()?>css/estilo.css">
    <?php echo Base::getJs(); ?>
    <?php echo Base::getCss(); ?>
</head>
<body>
    <form action="login.php" method="POST">
        <div class="form padding">
            <div class="conteudo_login">
                <header id="titulo">
                     <span class="glyphicon glyphicon-home" style="margin-right: 10px;"></span>
                     <a href="<?=Base::baseURL();?>">Página Inicial</a>
                </header>
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
