<?php

class Sessao{
    
    public $usuario_id;
    
    function __construct($usuario_id) {
        if(empty(session_id()))
            session_start();
        
        $this->usuario_id = $usuario_id;
    }
    
}