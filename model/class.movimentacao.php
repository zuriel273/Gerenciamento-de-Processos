<?php 
	class Movimentacao{
		private $codigo;
		private $processo;
		private $descricao;
		private $tipo;
		private $data;

		function __construct($codigo = "", $processo = "", $descricao = "", $tipo = "", $data = ""){
			$this->codigo = $codigo;
			$this->processo = $processo;
			$this->descricao = $descricao;
			$this->tipo = $tipo;
			$this->data = $data;
		}

		public function nomeTabela(){
        	return "movimentacao";
    	}

		public function setCodigo ($codigo) {
	        $this->codigo = $codigo;
	    }
	    public function getCodigo () {
	         return $this->codigo;
	    }

	    public function setProcesso($processo){
	    	$this->processo = $processo;
	    }

	    public function getProcesso(){
	    	return $this->processo;
	    }

	    public function setDescricao($descricao){
	    	$this->descricao = $descricao;
	    }
	    public function getDescricao(){
	    	return $this->descricao;
	    }

	    public function setTipo($tipo){
	    	$this->tipo = $tipo;
	    }
	    public function getTipo(){
	    	return $this->tipo;
	    }

	    public function setData($data){
	    	$this->data = $data;
	    }
	    public function getData(){
	    	return $this->data;
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