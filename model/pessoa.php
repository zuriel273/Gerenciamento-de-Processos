<?php
	class Pessoa{
		private $nome;
		private $cpf;
		private $orgao;

		function Pessoa(){

		}

		public function setNome($nome){
	    	$this->nome = $nome;
	    }
	    public function getNome(){
	    	return $this->nome;
	    } 

	    public function setCpf($cpf){
	    	$this->nome = $cpf;
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