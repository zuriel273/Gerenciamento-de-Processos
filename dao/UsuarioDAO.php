<?php

class UsuarioDAO{
    
    private $conn;

    public function __construct() {
        //AQUI SERÁ CRIADA A CONEXAO COM O BD
    }
    
     /**
     * 
     * @param Usuario $usuario
     * 
     */
    public function insert(Usuario $usuario){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO '.Usuario::nomeTabela().'(`login`, `senha`, `pessoa_id`, `publicacao_id`, `publicacao_privacidade_id`, `publicacao_tipo_publicacao_id`, `publicacao_imagem_id`, `competicao_id`, `resultado_totem_id`, `objetivo_id`) VALUES (:login,:senha,:pessoa_id,:publicacao_id,:publicacao_privacidade_id,:publicacao_tipo_publicacao_id,:publicacao_imagem_id,:competicao_id,:resultado_totem_id,:objetivo_id)'
            );
            
            $pessoa = $usuario->getPessoa();
            $publicacao = $usuario->getPublicacao();
            $publicacao_privacidade = $usuario->getPublicacao_privacidade();
            $publicacao_tipo_publicacao = $usuario->getPublicacao_tipo_publicacao();
            $publicacao_imagem = $usuario->getPublicacao_imagem();
            $competicao = $usuario->getCompeticao();
            $resultado = $usuario->getResultado_totem();
            $objetivo = $usuario->getObjetivo();
            
            $stmt->bindValue(':login', $usuario->getLogin(),PDO::PARAM_STR);
            $stmt->bindValue(':senha', md5($usuario->getSenha()),PDO::PARAM_STR);
            $stmt->bindValue(':pessoa_id',$pessoa->id,PDO::PARAM_INT);
            $stmt->bindValue(':publicacao_id',$publicacao->id,PDO::PARAM_INT);
            $stmt->bindValue(':publicacao_privacidade_id',$publicacao_privacidade->id);
            $stmt->bindValue(':publicacao_tipo_publicacao_id',$publicacao_tipo_publicacao->id);
            $stmt->bindValue(':publicacao_imagem_id',$publicacao_imagem);
            $stmt->bindValue(':competicao_id',$competicao->id);
            $stmt->bindValue(':resultado_totem_id',$resultado->id);
            $stmt->bindValue(':objetivo_id',$objetivo->id);
            $stmt->execute();
            
            $this->conn->commit();
            return true;
        }
        catch(Exception $e) {
            print $e->getMessage();
        }
    }
    
    public function logado($user){
        $login = $user->getLogin();
        $senha = $user->getSenha();
        
        if(empty($login) || empty($senha))
            return NULL;
        
        $pass = md5($senha);
        $statement = $this->conn->query(
            'SELECT * FROM '.Usuario::nomeTabela().' WHERE login = "'.$login.'" AND senha = "'.$pass.'"'
        );
        
        $resultado = $this->processResults($statement);
        if(empty($resultado) || is_null($resultado))
            return NULL;
        
        $user = $resultado[0];
        return $user->getId();
    }
    /**
     * 
     * @param type $statement
     * @return array Usuario
     * 
     */
    private function processResults($statement){
        $results = array();
        if($statement){
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario();
                $usuario->setId($row->id);
                $usuario->setLogin($row->login);
                $usuario->setSenha($row->senha);
                $pessoa = new Pessoa();
                $pessoa->setId($row->pessoa_id);
                $usuario->setPessoa($pessoa->getId());
                $results[] = $usuario;
            }
        }

        return $results;
    }
    
}