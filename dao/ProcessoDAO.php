<?php

require_once('model/class.conexao.php');
require_once('model/class.base.php');

class ProcessoDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param Processo $processo
     * 
     */

    public function insert(Processo $processo){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Processo::nomeTabela().'(`codigo`, `situacao`, `descricao`, `data_criacao`, `codigo_requerimento`, `pessoa_cpf`) VALUES (:codigo,:situacao,:descricao,:data_criacao,:codigo_requerimento,:pessoa_cpf)'
            );
            
            $stmt->bindValue(':codigo', $processo->getCodigo(),PDO::PARAM_STR);
            $stmt->bindValue(':data_criacao', converterData($processo->getDataCriacao(),'pt_br'),PDO::PARAM_STR);
            $stmt->bindValue(':situacao', $processo->getSituacao(),PDO::PARAM_STR);
            $stmt->bindValue(':descricao', $processo->getDescricao(),PDO::PARAM_STR);
            $stmt->bindValue(':codigo_requerimento', $processo->getRequerimento(),PDO::PARAM_STR);
            $stmt->bindValue(':pessoa_cpf', $processo->getPessoa(),PDO::PARAM_STR);            
            $stmt->execute();
            
            $this->conn->commit();
            return true;
        }
        catch(Exception $e) {
            print $e->getMessage();
        }
    }

     /**
     * 
     * @return array de objetos @Processo
     * 
     */
    public function getAll(){
        $statement = $this->conn->query("SELECT * FROM ".Processo::nomeTabela());
        return $this->processResults($statement);
    }

    /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Processo
     * 
     */
    private function processResults($statement) {
        $results = array();
        if($statement){
            require_once("PessoaDAO.php");
            $pDAO = new PessoaDAO();
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $processo = new Processo();
                $processo->setCodigo($row->codigo);
                $processo->setSituacao($row->situacao);
                $processo->setDescricao($row->descricao);
                $processo->setRequerimento(new Requerimento($row->codigo_requerimento));
                $processo->setDataCriacao($row->data_criacao);
                $processo->setPessoa($pDAO->getPessoaByCpf($row->pessoa_cpf));
                $results[] = $processo;
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
                $query = 'SELECT * FROM '.Processo::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}
?>