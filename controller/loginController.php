<?php
class LoginController extends ActionController{
	public function render(){
		Base::$page_title = "Login";
		parent::render();
	}
}
?>