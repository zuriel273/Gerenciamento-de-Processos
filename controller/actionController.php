<?php

class ActionController{
	public $page_title;
	public $page;
	public $layout;

	public function render(){
		Base::renderizar();
	}
}