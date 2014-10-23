<?php

require_once 'model/class.base.php';

if (empty($_POST) || !isset($_POST['Pessoa'])) {
    redireciona("index.php");
} else {
    $retorno = "index.php";

    $pessoa = $_POST['Pessoa'];
    $nome = $pessoa['nome'];
    $data_nascimento = $pessoa['data_nascimento'];
    $cpf = $pessoa["cpf"];
    $email = $pessoa["email"];
    
    if(empty($pessoa["altura"][0]) || empty($pessoa['altura'][1]))
        redireciona ($retorno."?acao=1&altura");
    
    $altura = $pessoa["altura"][0] . "." . $pessoa['altura'][1];
    $peso = $pessoa['peso'];
    $login = $pessoa['login'];
    $senha = $pessoa['senha'];

    if (empty($nome) || empty($cpf) || empty($email) || empty($altura) || empty($peso) || empty($login) || empty($senha))
        redireciona($retorno."?acao=1");

    if (!empty($data_nascimento))
        if (!validarData($data_nascimento, true))
            redireciona($retorno."?acao=1&data_nascimento");
        
    $db = include 'dao/banco.php';
    $conn = new Conexao($db);
    $conexao = $conn->conn;
    
    // Armazenar essa instância no Registry
    $registry = Registry::getInstance();
    $registry->set('Connection', $conexao);
    
    $person = new Pessoa($nome,$data_nascimento,$cpf,$email,$altura,$peso);
    $dao = new PessoaDAO();
    $ret = $dao->insert($person);
    if($ret === TRUE){
        redireciona($url);
    }
    else
    {
        redireciona($url."?acao=1&m=".$ret);
    }
    
}