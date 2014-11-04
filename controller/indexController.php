<?php
class IndexController extends ActionController{
	public function indexAction(){
		Base::$page_title 	= "Página Inicial";
		parent::render("index");
	}
}
?>