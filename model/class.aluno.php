<?php 
	
	class Aluno extends Pessoa{
		private $matricula;
		private $colegiado;

		function __construct($matricula = "", $colegiado = ""){
			
			parent::Pessoa;

			$this->matricula = $matricula;
			$this->colegiado = $colegiado;
		}

		public function nomeTabela(){
        	return "aluno";
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

	    
	}
?>