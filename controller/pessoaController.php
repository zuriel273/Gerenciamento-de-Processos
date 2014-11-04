<?php

class PessoaController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new PessoaDAO();
    }

    public function render($action, $vars = array()){
        Base::$page_title   = "Pessoa";
        parent::render($action,$vars);
    }

    public function indexAction(){
        $query = $this->dao->getAll();
        $this->render("index",array("query" => $query));
    }


    public function atualizarAction($id){
        $pessoa = $this->dao->getPessoaByCodigo($id);
        $this->render("update",array("query" => $pessoa[0]));
    }

    public function viewAction($id){
        //Base::dd($_GET);
        $pessoa = $this->dao->getPessoaByCodigo($id);
        $this->render("view", array("query" => $pessoa));
    }

   // public function buscarAction(){
     //   $requerimento = $this->dao->getRequerimentoByCodigo($_POST["Requerimento"]["num"]);
       // $this->render("view", array("query" => $processo));
    //}

}

?>