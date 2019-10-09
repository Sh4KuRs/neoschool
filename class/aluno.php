<?php
class aluno {
    private $matricula;
    private $nome;
    private $nomeMae;
    private $nomePai;
    private $dataNascimento;
    private $sexo;
    private $cpf;
    private $rg;
    private $orgaoExpeditor;
    private $estadoCivil;
    private $telefone;
    private $email;
    private $dataRegistro;
    private $tuma;
    private $turno;
    private $user;
    private $responsavel;
    private $status;
    
    public function getRg() {
        return $this->rg;
    }

    public function getOrgaoExpeditor() {
        return $this->orgaoExpeditor;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setOrgaoExpeditor($orgaoExpeditor) {
        $this->orgaoExpeditor = $orgaoExpeditor;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    
    public function getUser() {
        return $this->user;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    
    public function getTuma() {
        return $this->tuma;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function setTuma($tuma) {
        $this->tuma = $tuma;
    }

    public function setTurno($turno) {
        $this->turno = $turno;
    }

        public function getMatricula() {
        return $this->matricula;
    }

    public function getNomeAluno() {
        return $this->nome;
    }

    public function getNomeMae() {
        return $this->nomeMae;
    }

    public function getNomePai() {
        return $this->nomePai;
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

    public function getTelefoneAluno() {
        return $this->telefone;
    }

    public function getEmailAluno() {
        return $this->email;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setNomeAluno($nome) {
        $this->nome = $nome;
    }

    public function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
    }

    public function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
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

    public function setTelefoneAluno($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmailAluno($email) {
        $this->email = $email;
    }
    
    public function getDataRegistro() {
        $this->dataRegistro;
    }
    
    public function setDataRegistro($datar) {
        $this->dataRegistro = $datar;
    }


    
}
