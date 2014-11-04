<?php
class MovimentacaoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param Movimentacao $movimentacao
     * 
     */

    public function insert(Movimentacao $movimentacao){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Movimentacao::nomeTabela().'(`codigo`, `descricao`, `codigo_tipo_movimentacao`) VALUES (:codigo,:descricao,:tipo)'
            );
            
            $stmt->bindValue(':codigo', $movimentacao->getCodigo(),PDO::PARAM_STR);
            $stmt->bindValue(':processo', $movimentacao->getProcesso(),PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $movimentacao->getDescricao(),PDO::PARAM_STR);
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
     * @return array de objetos @Movimentacao
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Movimentacao::nomeTabela()
        );

        return $this->processResults($statement);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Movimentacao
     * 
     */
    private function processResults($statement) {
        $results = array();

        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $movimentacao = new Movimentacao();
                $movimentacao->setCodigo($row->codigo);
                $movimentacao->setDescricao($row->descricao);
                $movimentacao->setTipo($row->codigo_tipo_movimentacao);
                $results[] = $movimentacao;
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
                $query = 'SELECT * FROM '.Movimentacao::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}
?>