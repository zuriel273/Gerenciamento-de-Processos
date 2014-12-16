<?php
class RequerimentoDAO{

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

    public function insert(Requerimento $requerimento){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Requerimento::nomeTabela().'(`codigo`, `descricao`, `codigo_tipo_requerimento_processo`) VALUES (:codigo,:descricao,:tipo)'
            );
            
            $stmt->bindValue(':codigo', $requerimento->getCodigo(),PDO::PARAM_STR);
            $stmt->bindValue(':tipo', $requerimento->getTipo(),PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $requerimento->getDescricao(),PDO::PARAM_STR);
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
     * @return array de objetos @Requerimento
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Requerimento::nomeTabela()
        );
        return $this->processResults($statement);
    }

    /**
     * 
     * @param  int $codigo 
     * @return Processo retorna o processo buscado pelo codigo ou NULL caso não tenha na base
     */
    public function getRequerimentoByCodigo($codigo){
        $stmt = $this->conn->prepare("SELECT * FROM ".Requerimento::nomeTabela().' WHERE codigo = :codigo');
        $stmt->bindValue(':codigo', $codigo,PDO::PARAM_INT);
        $stmt->execute();
        return $this->processResults($stmt);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Requerimento
     * 
     */
    private function processResults($statement) {
        $results = array();
        require_once("TipoRequerimentoDAO.php");
            
        $trD = new TipoRequerimentoDAO();

        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $requerimento = new Requerimento();
                $requerimento->setCodigo($row->codigo);
                $requerimento->setDescricao($row->descricao);
                $requerimento->setTipo($trD->getTipoRequerimentoByCodigo($row->codigo_tipo_requerimento_processo)); 
                //$processo->setPessoa($pDAO->getPessoaByCpf($row->pessoa_cpf));               
                //$processo->setRequerimento(new Requerimento($row->codigo_requerimento));
                $results[] = $requerimento;
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
                $query = 'SELECT * FROM '.Requerimento::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}
?>