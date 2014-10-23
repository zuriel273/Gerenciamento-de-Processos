<?php

class Usuario{
    
    private $id;
    private $login;
    private $senha;
    private $pessoa;

    function __construct($login='', $senha='', $pessoa= ''){
        $this->login = $login;
        $this->senha = $senha;
        $this->pessoa = $pessoa;
    }

    public function nomeTabela(){
        return "usuario";
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getPessoa() {
        return $this->pessoa;
    }

    public function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
    }

    public function getPublicacao() {
        return $this->publicacao;
    }

}