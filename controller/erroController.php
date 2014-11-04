<?php
class ErroController extends ActionController{
	public function indexAction(){
		Base::$page_title = "Página não encontrada.";
		Base::$page 	  = "erro";
		parent::render("erro");
	}
}
?>