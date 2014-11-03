<?php 

	class Professor extends Pessoa{

		private $siad;

		function __construct($siad = ""){
			parent::Pessoa;
			$this->siad = $siad;
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

		public function salvar(){
	   		// salvar
		}
		public function excluir(){
		  // excluir
		}	 
		public function selecionar(){
		  // selecionar
		}
	}
?>