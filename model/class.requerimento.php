<?php 
	class Requerimento{

		private $codigo;
		private $descricao;
		private $tipo;

		function __construct($codigo = "", $descricao = "", $tipo = ""){
			$this->codigo = $codigo;
			$this->descricao = $descricao;
			$this->tipo = $tipo;
		}

		public function nomeTabela(){
        	return "requerimento";
    	}

    	public function setCodigo($codigo){
    		$this->codigo = $codigo;
    	}

    	public function getCodigo(){
    		return $this->codigo;
    	}

    	public function setDescricao($descricao){
    		$this->descricao = $descricao;
    	}
    	public function getDescricao(){
    		return $this->descricao;
    	}

    	public function setTipo($tipo){
    		$this->tipo = $tipo;
    	}

    	public function getTipo(){
    		return $this->tipo;
    	}
	}
?>