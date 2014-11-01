<?php
class DocumentoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        
    }

    /**
     * 
     * @param Documento $documento
     * 
     */

    public function insert(Documento $documento){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Documento::nomeTabela().'(`numero_documento`, `codigo_processo`, `conteudo_documento`) VALUES (:numero,:processo,:conteudo)'
            );
            
            $stmt->bindValue(':numero', $documento->getCodigo(),PDO::PARAM_STR);
            $stmt->bindValue(':processo', $documento->getCodigoProcesso(),PDO::PARAM_STR);
            $stmt->bindValue(':conteudo', $documento->getDoc(),PDO::PARAM_STR);
            $$stmt->execute();
            
            $this->conn->commit();
            return true;
        }
        catch(Exception $e) {
            print $e->getMessage();
        }
    }

     /**
     * 
     * @return array de objetos @Documento
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Documento::nomeTabela()
        );

        return $this->processResults($statement);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Documento
     * 
     */
    private function processResults($statement) {
        $results = array();

        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $Documento = new Documento();
                $Documento->setDoc($row->conteudo_documento);
                $Documento->setCodigoProcesso($row->codigo_processo);
                $Documento->setCodigo($row->numero_documento);
                $results[] = $Documento;
            }
        }

        return $results;
    }

    /**
     * 
     * @param string $where
     * @param array $consulta
     * 
     */
    public function find($where = "1",$consulta=""){
        if(is_array($consulta)||(is_array($where) && !is_array($consulta))){
            if(is_array($where)){
                $consulta = $where;
                $where = 1;
            }
            if(!empty($consulta)){
                $string = "";
                foreach ($consulta as $cmd => $valor){
                    $string .= $cmd." ".$valor;
                }
                $query = 'SELECT * FROM '.Documento::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}

}
?>