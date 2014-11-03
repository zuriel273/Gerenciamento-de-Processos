<?php

class Conexao extends PDO {

	function __construct(){

	}

    public function Connecta($db){
    	try{
	        $dsn = 'mysql:host='.$db['host'].';dbname='.$db['dbname'];
	        $username = $db["user"];
	        $password = $db["password"];
			return new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'], $username, $password);
    	}catch(Exception $e){
    		throw new Exception("Não foi possivel estabelecer conexao com o Banco de Dados.");
    	}
    }
}

?>