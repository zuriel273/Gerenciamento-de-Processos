<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?=Base::baseURL()?>public/css/sticky-footer-navbar.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=Base::$system_name.' - '.Base::$short_empresa_nome.' :: '.Base::$page_title?></title>
    <?=Base::getCss()?>
    <?=Base::getJs()?>
</head>
  <body id="<?=Base::$layout?>_1">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id="logo">
            <img src="<?=Base::baseURL()?>/public/img/martelo.jpg" width="40"/>
            <a class="navbar-brand" href="<?=Base::baseURL()?>index.php"><?=Base::$system_name?></a>
          </div>
        </div>
        <div class="collapse navbar-collapse">
          <ul id="main_menu" class="nav navbar-nav">
            <li>
                <a href="<?=Base::baseURL()?>index.php">
                    <span class="glyphicon glyphicon-home"></span> Home
                </a>
            </li>
            <li>
                <a href="<?=Base::baseURL()?>processo/">
                    <span class="glyphicon glyphicon-bullhorn"></span> Processo
                </a>
            </li>
          </ul>
          <ul class="nav navbar-nav" style="float: right">
            <li>
              <div id="search">
                <form method="POST" action="<?=Base::baseUrl()?>processo/buscar/">
                  <div class="form-group col-lg-9">
                    <input name='Processo[num]' type="number" class="search form-control" placeholder="Num. do processo">
                  </div>
                  <div class="form-group col-lg-3">
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </div>
                </form>
              </div>
            </li>
            <?php
            if(isset($_SESSION["logado"])){
            $usuario  = $_SESSION["logado"];
            ?>
            <li>
              <a href="<?=Base::baseURL()?>login/desAuth"><span class="glyphicon glyphicon-user"></span>
              Logout( <?= $usuario->getRole() ?> )</a>
            </li>            
            <?php  
            }else{
            ?>
            <li>
              <a href="<?=Base::baseURL()?>login/"><span class="glyphicon glyphicon-user"></span>
               Login</a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        <?php include_once Base::$conteudo; ?>
    </div>
    <div class="footer">
      <div class="container">
        <p class="text-muted">&copy <?=Base::$full_empresa_nome?></p>
      </div>
    </div>
  </body>
</html>