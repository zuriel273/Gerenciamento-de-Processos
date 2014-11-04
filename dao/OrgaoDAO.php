<?php
class OrgaoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param Orgao $orgao
     * 
     */

    public function insert(Orgao $orgao){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Orgao::nomeTabela().'(`codigo`, `nome`) VALUES (:codigo,:nome)'
            );
            
            $stmt->bindValue(':codigo', $orgao->getCodigo(),PDO::PARAM_STR);
            $stmt->bindValue(':nome', $orgao->getTipo(),PDO::PARAM_STR);
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
     * @return array de objetos @Orgao
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Orgao::nomeTabela()
        );

        return $this->processResults($statement);
    }

    /**
     * 
     * @param  int $codigo 
     * @return Processo retorna o processo buscado pelo codigo ou NULL caso não tenha na base
     */
    public function getOrgaoByCodigo($codigo){
        $stmt = $this->conn->prepare("SELECT * FROM ".Orgao::nomeTabela().' WHERE codigo = :codigo');
        $stmt->bindValue(':codigo', $codigo,PDO::PARAM_INT);
        $stmt->execute();
        return $this->processResults($stmt);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Orgao
     * 
     */
    private function processResults($statement) {
        $results = array();
            
        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $orgao = new Orgao();
                $orgao->setCodigo($row->codigo);
                $orgao->setNome($row->nome);
                $results[] = $orgao;
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
                $query = 'SELECT * FROM '.Orgao::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}
?>