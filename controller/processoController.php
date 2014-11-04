<?php

class processoController extends ActionController{
    public function render(){
        Base::$page_title   = "Processo";
        parent::render();
    }

    public function indexAction(){
    	Base::dd();
    	return "YES";
    }

    public function atualizarAction($id){
    	Base::dd($id);
    }
}

?>