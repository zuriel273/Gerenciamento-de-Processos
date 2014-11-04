<?php
class ParecerProfessorDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param ParecerProf $Parecer
     * 
     */

    public function insert(ParecerProf $parecer){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.ParecerProf::nomeTabela().'(`codigo_processo`, `num_siad_professor`, `descricao` , `parecer`, `dataParecer`) VALUES (:codigo,:numero,:descricao,:parecer,:data)'
            );
            
            $stmt->bindValue(':codigo', $parecer->getProcesso(),PDO::PARAM_STR);
            $stmt->bindValue(':numero', $parecer->getProfessor(),PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $parecer->getDescricao(),PDO::PARAM_STR);
            $stmt->bindValue(':data', converterData($parecer->getData(),'pt_br'),PDO::PARAM_STR);
            $stmt->bindValue(':parecer', $parecer->getParecer(),PDO::PARAM_STR);
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
     * @return array de objetos @Parecer
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.ParecerProf::nomeTabela()
        );
        return $this->processResults($statement);
    }

    public function getParecerProfByCodigoParecer($codigo){
        $stmt = $this->conn->prepare("SELECT * FROM ".ParecerProf::nomeTabela().' WHERE codigo_processo = :codigo');
        $stmt->bindValue(':codigo', $codigo,PDO::PARAM_INT);
        $stmt->execute();
        return $this->processResults($stmt);
    }

    public function getParecerProfById($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".ParecerProf::nomeTabela().' WHERE id = :id');
        $stmt->bindValue(':id', $id,PDO::PARAM_INT);
        $stmt->execute();
        return $this->processResults($stmt);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe ParecerProf
     * 
     */
    private function processResults($statement) {
        $results = array();
        require_once("ProfessorDAO.php");
        if($statement) {
            $prof = new ProfessorDAO();
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $parecer = new ParecerProf();
                $parecer->setId($row->id);
                $parecer->setProcesso($row->codigo_processo);
                $parecer->setDescricao($row->descricao);
                $parecer->setParecer($row->parecer);
                $parecer->setData($row->dataParecer);
                $parecer->setProfessor($prof->getProfessorBySiad($row->num_siad_professor));
                $results[] = $parecer;
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
                $query = 'SELECT * FROM '.ParecerProf::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}
?>