<?php

class ProcessoController extends ActionController{
    private static $dao;

    function __construct(){
        $this->dao = new ProcessoDAO();
    }

    public function render($action="", $vars = array()){
        Base::$page_title   = "Processo";
        parent::render($action,$vars);
    }

    public function createAction(){
        session_start(session_id());
        if(isset($_POST["Processo"])){
            $processo = new Processo();
            $processo->setDescricao($_POST["Processo"]["descricao"]);
            $processo->setRequerimento(new Requerimento($_POST["Processo"]["requerimento"]));
            $pessoa = new Pessoa();
            $pessoa->setCpf($_SESSION[logado]->getCpf());
            $processo->setPessoa($pessoa);
            $dao = new ProcessoDAO();
            $dao->insert($processo);
        }
        $this->render("create",array());
    }

    public function indexAction(){
        session_start(session_id());
        if(empty($_SESSION) || !isset($_SESSION["logado"]) || empty($_SESSION["logado"])){
            $query = $this->dao->getAll();
        }else{
            $pessoa = $_SESSION["logado"];
            if($pessoa->getRole() == "aluno")
                $query = $this->dao->getProcessoByCpf($pessoa->getCpf());
            else if($pessoa->getRole() == "docente")
                $query = $this->dao->getTodosAberturaProcesso();
            else
                $query = $this->dao->getAll();
        }
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