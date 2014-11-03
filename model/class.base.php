<?php

Class Base{

    public static $short_empresa_nome = "UFBA";
    public static $full_empresa_nome  = "Universidade Federal da Bahia";
    public static $system_name        = "Sistema de Gerenciamento de Processos";
    public static $page_title         = "Página Inicial";
    public static $pasta              = "view/";
    public static $layout             = "main";
    public static $page               = "index";
    public static $conteudo           = "Bem Vindo";

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
    
    public static function renderizar(){
        if(Base::$layout == "main")
            Base::renderPartial();
        else
            Base::render();
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
        // $conteudo = Base::preprocessar(file_get_contents($filename));
        Base::$conteudo = $filename;
        include_once "template/template.".Base::$layout.".php";
    }

    private function preprocessarComandos($conteudo){
        $pos = strpos($conteudo, "{");
        while($pos){
            $sub_conteudo = substr($conteudo,$pos + 2);
            $pos_f = strpos($sub_conteudo, "}");
            if($pos_f){
                $comando = substr($sub_conteudo,0,$pos_f);
                eval("\$comando = ".$comando.";");
                $conteudo = substr_replace($conteudo, $comando, $pos, $pos_f + 4);
            }
            $pos = strpos($conteudo, "{");
        }
        return $conteudo;
    }

    private function preprocessar($conteudo){
        $pos = strpos($conteudo, "{{");
        while(gettype($pos) === "integer"){
            $sub_conteudo = substr($conteudo,$pos + 2);
            $pos_f = strpos($sub_conteudo, "}}");
            if($pos_f){
                $comando = substr($sub_conteudo,0,$pos_f);
                eval("\$comando = ".$comando.";");
                $conteudo = substr_replace($conteudo, $comando, $pos, $pos_f + 4);
            }
            $pos = strpos($conteudo, "{{");
        }

        $pos = strpos($conteudo, "<?php");
        while(gettype($pos) === "integer"){
            $sub_conteudo = substr($conteudo,$pos + 5);
            $pos_f = strpos($sub_conteudo, "?>");
            if($pos_f){
                $comando = substr($sub_conteudo,0,$pos_f);
                Base::dd($comando);
                eval($comando);
                $conteudo = substr_replace($conteudo," ", $pos, $pos_f + 7);
            }
            $pos = strpos($conteudo, "<?php");
        }

        $pos = strpos($conteudo, "<?=");
        while(gettype($pos) === "integer"){
            $sub_conteudo = substr($conteudo,$pos + 3);
            $pos_f = strpos($sub_conteudo, "?>");
            if($pos_f){
                $comando = substr($sub_conteudo,0,$pos_f);
                eval("\$comando = ".$comando."");
                $conteudo = substr_replace($conteudo, $comando, $pos, $pos_f + 5);
            }
            $pos = strpos($conteudo, "<?=");
        }
        return $conteudo;
    }

    public static function getJs(){
        return
        '<script type="text/javascript" src="'.Base::baseURL().'public/js/jQuery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="'.Base::baseURL().'public/js/MaskedInput/jquery.maskedinput-1.3.js"/></script>    
        <script type="text/javascript" src="'.Base::baseURL().'public/js/init.js"></script>';
    }

    public static function getCss(){
        return '
        <link rel="stylesheet" href="'.Base::baseURL().'public/css/bootstrap.css">
        <link href="'.Base::baseURL().'public/css/bootstrap.min.css">
        <link href="'.Base::baseURL().'public/css/bootstrap-responsive.css">
        <link href="'.Base::baseURL().'public/css/bootstrap-responsive.min.css">';
    }

    public static function logout(){
        session_start();
        session_destroy();
        redireciona("index.php");
    }

    public static function import($array = "*"){
        require_once 'controller/actionController.php';
        require_once 'model/class.conexao.php';  
        require_once 'model/class.pessoa.php';  
        if($array == "*"){
            foreach (scandir("model/") as $value) {
                if($value == "." || $value == "..")
                    continue;
                require_once "model/$value";
            }
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
        echo "<pre><code>";
        var_dump($mixed);
        echo "</code></pre>";
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