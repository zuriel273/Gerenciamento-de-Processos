<?php

class processoController extends ActionController{
    public function render(){
        Base::$page_title   = "Processo";
        parent::render();
    }
}

?>