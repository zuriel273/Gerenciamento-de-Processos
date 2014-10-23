<?php

Class Base{

    public static $name       = "Sistema de Gerenciamento de Processos - UFBA";
    public static $page_title = "Página Inicial";
    public static $site_url   = "http://localhost//Gerenciamento-de-Processo";
    public static $pasta      = "view/";
    public static $layout     = "main";
    public static $page       = "index";

    public static function BD(){ 
        return array(
            "host"=> "localhost",
            "dbname"=>"SGP",
            "user"=>"root",
            "password"=>"123",
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
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>'.Base::$name.' :: '.Base::$page_title.'</title>'.
            Base::getCss().
            Base::getJs().
        '</head>
        <body>';
        include_once $filename;
        echo '</body>
              </html>';
    }

    public static function getJs(){
        return
        '<script type="text/javascript" src="js/jQuery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/MaskedInput/jquery.maskedinput-1.3.js"/></script>    
        <script type="text/javascript" src="js/init.js"></script>';
    }

    public static function getCss(){
        return 
        '<link rel="stylesheet" href="css/bootstrap.css">
        <link href="css/bootstrap.min.css">
        <link href="css/bootstrap-responsive.css">
        <link href="css/bootstrap-responsive.min.css">';
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
        var_dump($_SERVER["URI"]);
        echo "<script>
                    window.location = 'http://localhost/Gerenciamento-de-Processo/".$url."';
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
        var_dump($mixed);
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