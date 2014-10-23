<?php

$sessao = session_id();
if(empty($sessao))
    session_start();

$conn = new Conexao(Base::BD());
$url = "cadastro.php";

if(isset($_SESSION['logado'])){ 
    Base::redireciona($url); 
} 

?>
