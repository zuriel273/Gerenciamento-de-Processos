<?php 
	class Tipo{
		private $codigo;
		private $descricao;

		function Tipo(){

		}

		public function setCodigo ($codigo) {
	        $this->codigo = $codigo;
	    }
	    public function getCodigo () {
	         return $this->codigo;
	    }   

	    public function setDescricao($descricao){
	    	$this->descricao = $descricao;
	    }
	    public function getDescricao(){
	    	return $this->descricao;
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
		
	}
?>