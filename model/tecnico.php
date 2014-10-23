<?php 
	class Tecnico extends Pessoa{

		private $codigo;

		function Tecnico(){
			parent::Pessoa;
		}

		public function setCodigo($codigo){
			this->codigo = $codigo;
		}

		public function getCodigo(){
			return this->codigo;
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