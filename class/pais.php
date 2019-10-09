<?php

class pais {
    private $id;
    private $nome;
    private $dataNascimento;
    private $sexo;
    private $cpf;
    private $rg;
    private $orgaoExp;
    private $estadoCivil;
    private $telefone;
    private $email;
    private $dataRegistro;
    private $user;
    private $status;
    private $parentesco;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getOrgaoExp() {
        return $this->orgaoExp;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDataRegistro() {
        return $this->dataRegistro;
    }

    public function getUser() {
        return $this->user;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getParentesco() {
        return $this->parentesco;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setOrgaoExp($orgaoExp) {
        $this->orgaoExp = $orgaoExp;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }




}
