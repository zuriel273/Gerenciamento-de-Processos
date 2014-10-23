<?php

class Conexao extends PDO {
    public function __construct($db){
    	try{
	        $dsn = 'mysql:host='.$db['host'].';dbname='.$db['dbname'];
	        $username = $db["user"];
	        $password = $db["password"];
	        $driver_options = array();
	        parent::__construct($dsn,$username, $password, $driver_options);
	        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('PDOStatement', array($this)));
    	}catch(Exception $e){
    		throw new Exception("Não foi possivel estabelecer conexao com o Banco de Dados.");
    	}
    }
}

?>