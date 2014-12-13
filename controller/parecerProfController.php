<?php

class ParecerProfController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new ParecerProfessorDAO();
    }

    public function render($action, $vars = array()){
        Base::$page_title   = "Parecer do Professor";
        parent::render($action,$vars);
    }

    public function indexAction($codigo){
        $query = $this->dao->getParecerProfByCodigoParecer($codigo);
        $this->render("index",array("query" => $query));
    }

    public function atualizarAction($id){
        $parecer = $this->dao->getParecerProfByCodigo($id);
        $this->render("update",array("query" => $parecer[0]));
    }

    public function buscarAction(){
        $parecer = $this->dao->getParecerProfByCodigo($_POST["Parecer"]["num"]);
        $this->render("view", array("query" => $parecer));
    }

}

?>