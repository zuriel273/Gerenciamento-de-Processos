<?php
class LoginController extends ActionController{
	public function render(){
		parent.$page_title = "Login";
		parent.$page = "login";
		parent::render();
	}
}
?>