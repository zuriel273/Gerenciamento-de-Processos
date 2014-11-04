<?php

class PessoaDAO{

    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
        $conexao = new Conexao();
        $this->conn = $conexao->Connecta(Base::BD());
    }

    /**
     * 
     * @param Pessoa $pessoa
     * 
     */
    public function insert(Pessoa $pessoa){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Pessoa::nomeTabela().'(`nome`, `data_nascimento`, `cpf`, `email`, `altura`, `peso`,`imc`) VALUES (:nome,:data_nascimento,:cpf,:email,:altura,:peso,:imc)'
            );
            
            $stmt->bindValue(':nome', $pessoa->getNome(),PDO::PARAM_STR);
            $stmt->bindValue(':data_nascimento', converterData($pessoa->getData_nascimento(),'pt_br'),PDO::PARAM_STR);
            $stmt->bindValue(':cpf', $pessoa->getCpf(),PDO::PARAM_STR);
            $stmt->bindValue(':email', $pessoa->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue(':altura', $pessoa->getAltura(),PDO::PARAM_STR);
            $stmt->bindValue(':peso', $pessoa->getPeso(),PDO::PARAM_STR);
            $stmt->bindValue(':imc', $pessoa->getImc(),PDO::PARAM_STR);
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
     * @return array de objetos @pessoa
     * 
     */
    public function getAll(){
        $statement = $this->conn->query(
            'SELECT * FROM '.Pessoa::nomeTabela()
        );

        return $this->processResults($statement);
    }

    public function getPessoaByCpf($cpf){
        $stmt = $this->conn->prepare("SELECT * FROM ".Pessoa::nomeTabela().' WHERE cpf = :cpf');
        $stmt->bindValue(':cpf', $cpf,PDO::PARAM_STR);
        $stmt->execute();
        return $this->processResults($stmt)[0];
    }

    public function getPessoaByCodigo($cpf){
        $antes = substr($cpf, 0, 3);
        $depois = substr($cpf, 3);
        $cpf = $antes . "." . $depois;
        $antes = substr($cpf, 0, 7);
        $depois = substr($cpf, 7 );
        $cpf = $antes . "." . $depois;
        $antes = substr($cpf, 0, 11);
        $depois = substr($cpf, 11 );
        $cpf = $antes . "-" . $depois;

        
        $stmt = $this->conn->prepare("SELECT * FROM ".Pessoa::nomeTabela().' WHERE cpf = :cpf');
        $stmt->bindValue(':cpf', $cpf,PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->processResults($stmt)[0];
    }

      /**
     * 
     * @param type $statement => query do banco de dados
     * @return array da classe Pessoa
     * 
     */
    private function processResults($statement) {
        $results = array();

        require_once("OrgaoDAO.php");
            
        $oD = new OrgaoDAO();

        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {

                $pessoa = new Pessoa();
                $pessoa->setNome($row->nome);
                $pessoa->setCpf($row->cpf);
                //$requerimento->setTipo($trD->getTipoRequerimentoByCodigo($row->codigo_tipo_requerimento_processo)); 
                $pessoa->setOrgao($oD->getOrgaoByCodigo($row->orgao_codigo));
                $results[] = $pessoa;
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
                $query = 'SELECT * FROM '.Pessoa::nomeTabela().' WHERE '.$where.' '.$string;
                $stmt = $this->conn->query(
                        $query
                );
                return $this->processResults($stmt);
            }
        }
    }
    
}

