<?php 
	require_once 'pessoa.php';

	class Professor extends Pessoa{

		private $siad;

		function Professor(){
			parent::Pessoa;
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