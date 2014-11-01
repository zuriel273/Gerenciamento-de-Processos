<?php
class ProcessoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
    }

    /**
     * 
     * @param Processo $processo
     * 
     */

     /**
     * 
     * @return array de objetos @pessoa
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Processo::nomeTabela()
        );

        return $this->processResults($statement);
    }

}
?>