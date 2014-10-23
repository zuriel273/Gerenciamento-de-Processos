<?php
class ErroController{
	public static function render(){
		Base::$page_title 	= "";
		Base::$page 		= "erro";
		Base::renderPartial();
	}
}
?>