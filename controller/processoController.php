<?php

class processoController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new ProcessoDAO();
    }

    public function render($action, $vars = array()){
        Base::$page_title   = "Processo";
        parent::render($action,$vars);
    }

    public function indexAction(){
        $query = $this->dao->getAll();
        $this->render("index",array("query" => $query));
    }

    public function atualizarAction($id){
        $processo = $this->dao->getProcessoByCodigo($id);
        $this->render("update",array("query" => $processo[0]));
    }

    public function buscarAction(){
        $processo = $this->dao->getProcessoByCodigo($_POST["Processo"]["num"]);
        $this->render("view", array("query" => $processo));
    }

}

?>