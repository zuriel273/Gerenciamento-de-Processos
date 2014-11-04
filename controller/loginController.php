<?php
class LoginController extends ActionController{
	public function indexAction(){
		Base::$page_title = "Login";
		parent::render("index");
	}
}
?>