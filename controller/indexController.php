<?php
class IndexController extends ActionController{
	public function render(){
		Base::$page_title 	= "Página Inicial";
		parent::render();
	}
}
?>