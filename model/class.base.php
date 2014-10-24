<?php

Class Base{

    public static $short_empresa_nome = "UFBA";
    public static $full_empresa_nome  = "Universidade Federal da Bahia";
    public static $system_name        = "Sistema de Gerenciamento de Processos";
    public static $page_title         = "Página Inicial";
    public static $pasta              = "view/";
    public static $layout             = "main";
    public static $page               = "index";

    public static function BD(){ 
        return array(
            "host"=> "localhost",
            "dbname"=>"SGP",
            "user"=>"root",
            "password"=>"123",
        );
    }

    public static function baseURL(){
      $uri = explode('/',$_SERVER['REQUEST_URI']);
      return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']."/",
        $uri[1]."/"
      );
    }

    public static function render(){
        $filename = Base::$page;
        if($filename != ""){
            if(file_exists(Base::$pasta.$filename.".php")){
                include_once Base::$pasta.$filename.".php";
            }
        }
    }

    public static function renderPartial(){
        $filename = Base::$pasta.Base::$page.".php";
        echo 
        '<!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" href="'.Base::baseURL().'css/sticky-footer-navbar.css">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>'.Base::$system_name.' - '.Base::$short_empresa_nome.' :: '.Base::$page_title.'</title>'.
            Base::getCss().
            Base::getJs().
        '</head>
        <body id="'.Base::$layout.'_1">'
        .'<div class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">'.Base::$system_name.'</a>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="'.Base::baseURL().'index.php">Home</a></li>
                    <li><a href="'.Base::baseURL().'login.php">Login</a></li>
                    <li><a href="#contact">Contate-nos</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>'
            .'<div class="container">';
            include_once $filename;
        echo '</div>'.
                '<div class="footer">
                  <div class="container">
                    <p class="text-muted">&copy '.Base::$full_empresa_nome.'</p>
                  </div>
                </div>'
            .'</body>
          </html>';
    }

    public static function getJs(){
        return
        '<script type="text/javascript" src="'.Base::baseURL().'js/jQuery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="'.Base::baseURL().'js/MaskedInput/jquery.maskedinput-1.3.js"/></script>    
        <script type="text/javascript" src="'.Base::baseURL().'js/init.js"></script>';
    }

    public static function getCss(){
        return '
        <link rel="stylesheet" href="'.Base::baseURL().'css/bootstrap.css">
        <link href="'.Base::baseURL().'css/bootstrap.min.css">
        <link href="'.Base::baseURL().'css/bootstrap-responsive.css">
        <link href="'.Base::baseURL().'css/bootstrap-responsive.min.css">';
    }

    public static function logout(){
        session_start();
        session_destroy();
        redireciona("index.php");
    }

    public static function import($array = "*"){
        if($array == "*"){
            require_once 'model/class.conexao.php';  
            require_once 'model/class.pessoa.php';
            require_once 'model/class.usuario.php';

            require_once 'dao/UsuarioDAO.php';
            require_once 'dao/PessoaDAO.php';
        }else{
            foreach ($array as $file){
                require_once($file);
            }
        }
    }

    public static function redireciona($url){
        echo "<script>
                    window.location = '".Base::baseURL().$url."';
              </script>";
    }

    public static function validarData($string,$nascimento = false){
        
        $data = explode("/", $string);
        if(!isset($data[1])||!isset($data[2]))
            return false;
        
        $dia = $data[0];
        $mes = $data[1];
        
        $qtd_dias = date("t");
        if($dia > $qtd_dias || $dia < 1 || $mes > 12 || $mes < 1)
            return false;
        
        if($nascimento){
            $ano = $data[2];
            $ano_atual = date("Y");
            if($ano > $ano_atual)
                return false;
        }
        
        return true;
    }

    public static function dd($mixed = ""){
        echo "<pre>";
        var_dump($mixed);
        echo "</pre>";
        die();
    }

    public static function converterData($data, $lang='pt_br'){
        if($lang == 'pt_br' || $lang == 'us'){
            $separador = '/';
            $cont = substr_count($data,$separador);
            if($cont == 0)
                $separador = '-';
            
            $cont = substr_count($data,$separador);
            if($cont == 0)
                $separador = '.';
            
            $cont = substr_count($data,$separador);
            if($cont == 0)
                return $data;
            
            $date = explode($separador,$data);
            $nova_data = $date[2].$separador.$date[1].$separador.$date[0];
            return $nova_data;
        }
    }
}
?>