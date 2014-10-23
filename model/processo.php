<?php 

	class Processo {
		private $codigo;
		private $situacao;
		private $descricao;
		private $data_criacao;
		private $requerimento;
		private $pessoa;

		function Processo(){
			$this->teste();
		}

		function teste(){
			$this->codigo = 192;
			$this->situacao = "teste";
			$this->descricao = "teste de classe";
			$this->data_criacao = "22-10-2014";
		}

		public function setCodigo ($codigo) {
	        $this->codigo = $codigo;
	    }
	    public function getCodigo () {
	         return $this->codigo;
	    }   

	    public function setSituacao($situacao){
	    	$this->situacao = $situacao;
	    }
	    public function getSituacao(){
	    	return $this->situacao;
	    }

	    public function setDescricao($descricao){
	    	$this->descricao = $descricao;
	    }
	    public function getDescricao(){
	    	return $this->descricao;
	    }

	    public function setDataCriacao($data_criacao){
	    	$this->data_criacao = $data_criacao;
	    }
	    public function getDataCriacao(){
	    	return $this->data_criacao;
	    }

	    public function setRequerimento($requerimento){
	    	$this->requerimento = $requerimento;
	    }
	    public function getRequerimento(){
	    	return $this->requerimento;    	
	    }

	    public function setPessoa($pessoa){
	    	$this->pessoa = $pessoa;
	    }
	    public function getPessoa(){
	    	return $this->pessoa;
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