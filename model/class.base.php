<?php

function BD(){ 
    return array(
        "host"=> "localhost",
        "dbname"=>"mydb",
        "user"=>"root",
        "password"=>"",
    );
}

function render($filename = ""){
    if($filename != ""){
        if(file_exists($filename.".php")){
            include_once $filename.".php";
        }
    }
}

function getJs(){
    echo
    '<script type="text/javascript" src="js/jQuery/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/MaskedInput/jquery.maskedinput-1.3.js"/></script>    
    <script type="text/javascript" src="js/init.js"></script>';
}

function getCss(){
    echo 
    '<link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css">
    <link href="css/bootstrap-responsive.css">
    <link href="css/bootstrap-responsive.min.css">';
}

function logout(){
    session_start();
    session_destroy();
    redireciona("index.php");
}

function import(){
    require_once 'model/class.conexao.php';  
    require_once 'model/class.pessoa.php';
    require_once 'model/class.usuario.php';

    require_once 'dao/UsuarioDAO.php';
    require_once 'dao/PessoaDAO.php';
}

function redireciona($url){
    echo "<script>
                window.location = 'http://localhost/projeto/".$url."';
          </script>";
}

function validarData($string,$nascimento = false){
    
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

function dd($mixed = ""){
    var_dump($mixed);
    die();
}

function converterData($data, $lang='pt_br'){
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

?>