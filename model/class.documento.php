<?php 
	class Documento{
		private $codigo;
		private $codigo_processo;
		private $doc;

		function __construct($codigo = "", $codigo_processo = "", $doc = ""){
			$this->codigo = $codigo;
			$this->codigo_processo = $codigo_processo;
			$this->doc = $doc;

		}

		public function nomeTabela(){
        	return "documento";
    	}

		public function setDoc($doc){
			$this->doc = $doc;
		}
		public function getDoc(){
			return $this->doc;
		}

		public function setCodigo ($codigo) {
	        $this->codigo = $codigo;
	    }
	    
	    public function getCodigo () {
	         return $this->codigo;
	    }  

	    public function setCodigoProcesso ($codigo_processo) {
	        $this->codigo_processo = $codigo_processo;
	    }
	      
	    public function getCodigoProcesso () {
	         return $this->codigo_processo;
	    }
	}
?>