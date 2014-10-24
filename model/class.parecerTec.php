<?php 

class ParecerTec{
	private $id;
	private $processo;
	private $tecnico;
	private $descricao;
	private $parecer;
	private $data;

	function __construct($id = "", $processo = "", $tecnico = "", $descricao = "", $parecer = "", $data = ""){
		$this->id = $id;
		$this->processo = $processo;
		$this->tecnico = $tecnico;
		$this->descricao = $descricao;
		$this->parecer = $parecer;
		$this->data = $data;

	}

	public function nomeTabela(){
        return "parecer_tec_administrativo";
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getId(){
    	return $this->id;
    }

    public function setProcesso($processo){
    	$this->processo = $processo;
    }

    public function getProcesso(){
    	return $this->processo;
    }

    public function setTecnico($tecnico){
    	$this->tecnico = $tecnico;
    }

    public function getTecnico(){
    	return $this->tecnico;
    }

    public function setDescricao($descricao){
    	$this->descricao = $descricao;
    }

    public function getDescricao(){
    	return $this->descricao;
    }

    public function setParecer($parecer){
    	$this->parecer = $parecer;
    }
    public function getParecer(){
    	return $this->parecer;
    }

    public function setData($data){
    	$this->data = $data;
    }

    public function getData(){
    	return $this->data;
    }
}

?>