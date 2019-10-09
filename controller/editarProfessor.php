<?php
require_once '../class/control_professor.php';
require_once '../class/professor.php';

$nome = $_POST["inputNome"];
$id = $_POST["inputID"];
$cpf = $_POST["inputCPF"];
$dataNascimento = $_POST["inputDataN"];
$rg = $_POST["inputRG"];
$sexo = $_POST["inputSexo"];
$orgaoExp = $_POST["inputOrgaoExp"];
$estadoCivil = $_POST["inputEstadoCivil"];
$telefone = $_POST["inputTelefone"];
$email = $_POST["inputEmail"];
$senha = $_POST["inputSenha"];
$turma = $_POST["inputTurma"];
$disciplina = $_POST["inputDisciplina"];

try {

    $objectProf = new professor();
    $objectProf->setId($id);
    $objectProf->setNome($nome);
    $objectProf->setCpf($cpf);
    $objectProf->setSexo($sexo);
    $objectProf->setRg($rg);
    $objectProf->setOrgaoExp($orgaoExp);
    $objectProf->setEstadoCivil($estadoCivil);
    $objectProf->setDataNascimento($dataNascimento);
    $objectProf->setTelefone($telefone);
    $objectProf->setEmail($email);
    $objectProf->setStatus(isset($_POST["inputStatus"]) ? $status = $_POST["inputStatus"] : $status = "A");
    
    
    $control_professor = new control_professor();
    
    $control_professor->atualizarProfessorById($objectProf);
    $control_professor->removerTurmaProfessor($id);
    $control_professor->removerDisciplinaProfessor($id);
    
    foreach ($turma as $value) {
        $turmaProf = new control_professor();
        $turmaProf->adicionarTurmaProfessor($id, $value);
    }
    foreach ($disciplina as $value) {
        $turmaProf = new control_professor();
        $turmaProf->adicionarDisciplinaProfessor($id, $value);
    }
    
    $msg = "Professor(a) <b>$nome</b> cadastrado(a) com sucesso!";
    echo "<script>";
    echo "window.location = '../view/adicionarprofessor.php?alteracao={$msg}';";
    echo "</script>";
    
} catch (PDOException $e) {
    echo $errMsg = $e->getMessage();
}
    