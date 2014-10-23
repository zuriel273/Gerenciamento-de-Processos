<?php
// Recebe a URL digitada 
$url_digitada = isSet($_GET["page"]) ? $_GET["page"] : "index"; 

// Transforma a URL em array separando a string a cada barra
$url_array = explode("/", $url_digitada);

$filename = Base::$pasta."/".$url_array[0];

if(file_exists($filename) || file_exists($filename.".php")){
	Base::$page = $url_array[0];
}else{
	Base::$page = "login";
}

?>