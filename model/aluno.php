<?php 
	require_once 'pessoa.php';

	class Aluno extends Pessoa{
		private $matricula;
		private $colegiado;

		function Aluno(){
			parent::Pessoa;
		}

		public function setMatricula($matricula){
	    	$this->matricula = $matricula;
	    }
	    public function getMatricula(){
	    	return $this->matricula;
	    } 

		public function setColegiado($colegiado){
	    	$this->colegiado = $colegiado;
	    }
	    public function getColegiado(){
	    	return $this->colegiado;
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