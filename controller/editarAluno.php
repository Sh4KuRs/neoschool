<?php

require_once '../class/aluno.php';
require_once '../class/user.php';
require_once '../class/control_aluno.php';
require_once '../class/control_user.php';
require_once '../class/control_pais.php';

$nome = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$matricula = $_POST["inputMatricula"];
$dataNascimento = $_POST["inputDataN"];
$sexo = $_POST["inputSexo"];
$telefone = $_POST["inputTelefone"];
$cpf = $_POST["inputCPF"];
$turma = $_POST["inputTurma"];
$senha = $_POST["inputSenha"];
$usuario = $_POST["inputUsuario"];


if (isset($_POST["inputResponsavel"])) {
    $respID = $_POST["inputResponsavel"];
}

try {

    if(isset($_FILES['upload_file'])){
            $extensao = strtolower(substr($_FILES['upload_file']['name'], -4));
            $novo_nome = md5(time()) . $extensao; 
            $diretorio = "../img/Alunos/";
            move_uploaded_file($_FILES['upload_file']['tmp_name'], $diretorio.$novo_nome);
        }  else {
            $novo_nome = "user.png";
        }
    
    $new_aluno = new aluno();

    $new_aluno->setNomeAluno($nome);
    $new_aluno->setMatricula($matricula);
    $new_aluno->setDataNascimento($dataNascimento);
    $new_aluno->setEmailAluno($email);
    $new_aluno->setSexo($sexo);
    $new_aluno->setTelefoneAluno($telefone);
    $new_aluno->setCpf($cpf);
    $new_aluno->setTuma($turma);
    $new_aluno->setStatus(isset($_POST["inputStatus"]) ? $status = $_POST["inputStatus"] : $status = "A");
    
    isset($respID) ? $new_aluno->setResponsavel($respID) : $new_aluno->setResponsavel("1");
    
    $control_aluno = new control_aluno();
    $control_aluno->updateAluno($new_aluno, $novo_nome);
    
    $msg = "Aluno $nome alterado com sucesso!";
    
    echo "<script>";
        echo "window.location = '../view/listaralunos.php?sucesso={$msg}';";
    echo "</script>";
    
} catch (PDOException $e) {
    echo $errMsg = $e->getMessage();
}
    