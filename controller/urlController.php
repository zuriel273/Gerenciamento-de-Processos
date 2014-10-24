<?php
// Recebe a URL digitada 
$url_digitada = isSet($_GET["page"]) ? $_GET["page"] : "index";

$url_digitada = explode(".php", $url_digitada);
$url_array = explode("/", $url_digitada[0]);
$filename = Base::$pasta.$url_array[0];

if(file_exists($filename) || file_exists($filename.".php")){
	Base::$page = $url_array[0];
}else{
	Base::$page = "erro";
}

?>