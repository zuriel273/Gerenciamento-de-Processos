<?php
class IndexController{
	public static function render(){
		Base::$page_title 	= "Página Inicial";
		Base::renderPartial();
	}
}
?>