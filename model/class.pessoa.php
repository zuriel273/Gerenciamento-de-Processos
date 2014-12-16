<?php
	class Pessoa{
		private $nome;
		private $cpf;
		private $orgao;
		private $senha;
		private $role;

		function __construct($nome = "", $cpf = "", $orgao = "", $senha = "", $role = ""){
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->orgao = $orgao;
			$this->senha = $senha;
			$this->role = $role;
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

	    public function getRole(){
	    	return $this->role;
	    }

	    public function setRole($role){
	    	$this->role = $role;
	    }

	}
?>