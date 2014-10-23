<?php 
	class Orgao{
		private $codigo;
		private $nome;

		function Orgao(){
			//$this->teste();
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