<?php 
require_once('model/class.base.php');
require_once('controller/urlController.php');
Base::import();
$fileName = Base::$page."Controller";
$fileController = $fileName.".php";

if(file_exists("controller/".$fileController))
	include_once("controller/".$fileController);
else{
	include_once("controller/erroController.php");
	$fileName = "erroController";
}

$classController = ucfirst($fileName);

if(isSet($_POST[ucfirst(Base::$page)])){
	//TODO quando passar algo por POST
	Base::dd($_POST[ucfirst(Base::$page)]);
}
$classController::render();
?>