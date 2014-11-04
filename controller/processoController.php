<?php

class processoController extends ActionController{
    private static $dao;

    public function render($action){
        Base::$page_title   = "Processo";
        parent::render($action);
    }

    public function indexAction(){
        // Instâncio a classe ProcessoDAO
        $PrDAO = new ProcessoDAO();
        $query = $PrDAO->getAll();
        $_POST["\$query"] = $query;
        $this->render("index");
    }

    public function atualizarAction($id){
        $dao = new ProcessoDAO();
        $processo = $dao->getProcessoByCodigo($id);
        $_POST["\$query"] = $processo[0];
        $this->render("update");
    }

    public function buscarAction(){
        $dao = new ProcessoDAO();
        $processo = $dao->getProcessoByCodigo($_POST["Processo"]["num"]);
        $_POST["\$query"] = $processo;
        $this->render("index");
    }

}

?>