<?php

class user {
    private $id;
    private $login;
    private $senha;
    private $perfil_id;
 
    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil_id() {
        return $this->perfil_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPerfil_id($perfil_id) {
        $this->perfil_id = $perfil_id;
    }


    
}
