<?php
	class Pessoa{
		private $nome;
		private $cpf;
		private $orgao;
		private $senha;

		function __construct($nome = "", $cpf = "", $orgao = "", $senha = ""){
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->orgao = $orgao;
			$this->senha = $senha;
		}

		public function nomeTabela(){
        	return "pessoa";
    	}

		public function setNome($nome){
	    	$this->nome = $nome;
	    }
	    public function getNome(){
	    	return $this->nome;
	    } 

	    public function setCpf($cpf){
	    	$this->cpf = $cpf;
	    }
	    public function getCpf(){
	    	return $this->cpf;
	    } 

	    public function setOrgao($orgao){
	    	$this->orgao = $orgao;
	    }
	    public function getOrgao(){
	    	return $this->orgao;
	    } 

	    public function getSenha(){
	    	return $this->senha;
	    }

	    public function setSenha($senha){
	    	$this->senha = $senha;
	    }

	}
?>