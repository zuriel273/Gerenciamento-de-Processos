<?php

class RequerimentoController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new RequerimentoDAO();
    }

    public function render($action="", $vars = array()){
        Base::$page_title   = "Requerimento";
        parent::render($action,$vars);
    }

    public function indexAction(){
        $query = $this->dao->getAll();
        $this->render("index",array("query" => $query));
    }


    public function atualizarAction($id){
        $requerimento = $this->dao->getRequerimentoByCodigo($id);
        $this->render("update",array("query" => $requerimento[0]));
    }

    public function viewAction($id){
        $requerimento = $this->dao->getRequerimentoByCodigo($id);
        $this->render("view", array("query" => $requerimento));
    }

   // public function buscarAction(){
     //   $requerimento = $this->dao->getRequerimentoByCodigo($_POST["Requerimento"]["num"]);
       // $this->render("view", array("query" => $processo));
    //}

}

?>