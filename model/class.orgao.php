<?php 
	class Orgao{
		private $codigo;
		private $nome;

		function __construct($codigo = "", $nome = ""){
			//$this->teste();
			$this->codigo = $codigo;
			$this->nome = $nome;
			
		}

		public function nomeTabela(){
        	return "orgao";
    	}

		public function setCodigo ($codigo) {
	        $this->codigo = $codigo;
	    }
	    public function getCodigo () {
	         return $this->codigo;
	    }  

	    public function setNome($nome){
	    	$this->nome = $nome;
	    }
	    public function getNome(){
	    	return $this->nome;
	    }     

	}
?>