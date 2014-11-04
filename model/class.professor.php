<?php 

	class Professor extends Pessoa{

		private $siad;

		function __construct($siad = "" ,$nome = "", $cpf = "", $orgao = ""){
			$this->siad = $siad;
			return new Pessoa($nome = "", $cpf = "", $orgao = "");
		}

		public function nomeTabela(){
        	return "professor";
    	}

		public function setSiad($siad){
			$this->siad = $siad;
		}

		public function getSiad(){
			return $this->siad;
		}
		
	}
?>