<?php

class OrgaoController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new OrgaoDAO();
    }

    public function render($action, $vars = array()){
        Base::$page_title   = "Orgao";
        parent::render($action,$vars);
    }

    public function indexAction(){
        $query = $this->dao->getAll();
        $this->render("index",array("query" => $query));
    }


    public function atualizarAction($id){
        $orgao = $this->dao->getOrgaoByCodigo($id);
        $this->render("update",array("query" => $orgao[0]));
    }

    public function viewAction($id){
        $orgao = $this->dao->getOrgaoByCodigo($id);
        $this->render("view", array("query" => $orgao));
    }

   // public function buscarAction(){
     //   $requerimento = $this->dao->getRequerimentoByCodigo($_POST["Requerimento"]["num"]);
       // $this->render("view", array("query" => $processo));
    //}

}

?>