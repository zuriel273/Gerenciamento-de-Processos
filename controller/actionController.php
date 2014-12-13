<?php

class ActionController{
	public function render($page = "", $vars = array()){
		Base::renderizar($page, $vars);
	}
}