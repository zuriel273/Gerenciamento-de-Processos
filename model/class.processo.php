<?php 

	class Processo {
		private $codigo;
		private $situacao;
		private $descricao;
		private $data_criacao;
		private $requerimento;
		private $pessoa;
		private $documentos; // penso em uma lista de docs
		// penso q pode ter uma lista de movimentacoes

		function __construct($codigo = "", $situacao = "", $descricao = "",$data_criacao = "", $requerimento = "", $pessoa = "", $documentos = ""){
			$this->codigo = $codigo;
			$this->documentos = $documentos;
			$this->situacao = $situacao;
			$this->descricao = $descricao;
			$this->data_criacao = $data_criacao;
			$this->requerimento = $requerimento;
			$this->pessoa = $pessoa;

		}

		public function nomeTabela(){
        	return "processo";
    	}

		public function setDocumentos ($documentos) {
	        $this->documentos = $documentos;
	    }
	    public function getDocumentos () {
	         return $this->documentos;
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

	}

?>