<?php 

class Processo {
	private $codigo;
	private $situacao;
	private $descricao;
	private $data_criacao;
	private $requerimento;
	private $pessoa;

	public function setCodigo ($codigo) {
        $this->codigo = $codigo;
    }
    public function getCodigo () {
         return $this->codigo;
    }   

}


?>