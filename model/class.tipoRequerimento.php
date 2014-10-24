<?php 
	class TipoRequerimento{

		private $codigo;
		private $descricao;
		

		function __construct($codigo = "", $descricao = ""){
			$this->codigo = $codigo;
			$this->descricao = $descricao;
			

		}

		public function nomeTabela(){
        	return "tipo_requerimento_processo";
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

	}
?>