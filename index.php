<?php 
require_once('model/class.base.php');
require_once('controller/urlController.php');
Base::import();
$fileName = Base::$page."Controller";
$fileController = $fileName.".php";

if(file_exists("controller/".$fileController))
	include_once("controller/".$fileController);
else
	include_once("controller/erroController.php");

$classController = ucfirst($fileName);
$classController::render();
?>