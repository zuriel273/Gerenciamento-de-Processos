<?php 
	class Tecnico extends Pessoa{

		private $codigo;

		function __construct($codigo = ""){
			parent::Pessoa;
			$this->codigo = $codigo;
		}

		public function nomeTabela(){
        	return "tec_administrativo";
    	}

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function getCodigo(){
			return $this->codigo;
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