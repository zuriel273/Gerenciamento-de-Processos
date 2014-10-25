<?php
class ErroController extends ActionController{
	public function render(){
		Base::$page_title = "Página não encontrada.";
		Base::$page 	  = "erro";
		parent::render();
	}
}
?>