<?php
class TipoRequerimentoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param Requerimento $requerimento
     * 
     */

    public function insert(TipoRequerimento $tipo){
            $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.TipoRequerimento::nomeTabela().'(`codigo`, `descricao`, `tipo_requerimento_processo`) VALUES (:codigo,:descricao,:tipo)'
            );
            
            $stmt->bindValue(':codigo', $tipo->getCodigo(),PDO::PARAM_STR);            
            $stmt->bindValue(':descricao', $tipo->getDescricao(),PDO::PARAM_STR);
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
     * @return array de objetos @TipoRequerimento
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.TipoRequerimento::nomeTabela()
        );

        return $this->processResults($statement);
    }

    /**
     * 
     * @param  int $codigo 
     * @return Processo retorna o processo buscado pelo codigo ou NULL caso não tenha na base
     */
    public function getTipoRequerimentoByCodigo($codigo){
        $stmt = $this->conn->prepare("SELECT * FROM ".TipoRequerimento::nomeTabela().' WHERE codigo = :codigo');
        $stmt->bindValue(':codigo', $codigo,PDO::PARAM_INT);
        $stmt->execute();
        return $this->processResults($stmt);
    }

     private function processResults($statement) {
        $results = array();
        
            
        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $tipo = new TipoRequerimento();
                $tipo->setCodigo($row->codigo);
                $tipo->setDescricao($row->descricao);
                //$processo->setPessoa($pDAO->getPessoaByCpf($row->pessoa_cpf));               
                //$processo->setRequerimento(new Requerimento($row->codigo_requerimento));
                $results[] = $tipo;
            }
        }

        return $results;
    }
}
?>