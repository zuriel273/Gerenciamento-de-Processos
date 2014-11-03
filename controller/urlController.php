<?php
class UrlController{

	public static $page;
	
	function __construct(){
		
		$action = isset($_GET["action"]) ? $_GET["action"] : "index";
		$action .= "Action()";
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

		$this->page = new $classController;
	}

}

?>