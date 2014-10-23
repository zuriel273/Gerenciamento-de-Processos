<?php

class Pessoa{
    
    private $id;
    private $nome;
    private $data_nascimento;
    private $cpf;
    
    function __construct($nome = "", $data_nascimento="", $cpf=""){
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->cpf = $cpf;
    }

    public function nomeTabela(){
        return "pessoa";
    }
    
    public function getId(){
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getData_nascimento() {
        return $this->data_nascimento;
    }

    public function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
 
}