<?php
class UrlController{

	public static $page;
	
	function __construct(){

		// Recebe a URL digitada 
		$url_digitada = isSet($_GET["page"]) ? $_GET["page"] : "index";
		$url_digitada = explode(".php", $url_digitada);
		$url_array = explode("/", $url_digitada[0]);
		if($url_array[0] == "index")
			$filename = Base::$pasta."site/".$url_array[0];
		else
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
		$this->page = new $classController;
		$action = isset($_GET["action"]) ? $_GET["action"] : "index";
		if(in_array($action."Action",get_class_methods($this->page))){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			if($id){
				$action .= "Action(".$id.")";
			}else{
				$action .= "Action()";
			}
			eval('$this->page->'.$action.';');
		}else{
			$err = new ErroController();
			$err->indexAction();
		}

	}

}

?>