<?php

require_once '../class/control_professor.php';
require_once '../class/user.php';
require_once '../class/control_user.php';
require_once '../class/professor.php';


$nome = $_POST["inputNome"];
$cpf = $_POST["inputCPF"];
$datanascimento = $_POST["inputDataN"];
$telefone = $_POST["inputTelefone"];
$sexo = $_POST["inputSexo"];
$rg = $_POST["inputRG"];
$orgaoExp = $_POST["inputOrgaoExp"];
$estadoCivil = $_POST["inputEstadoCivil"];
$email = $_POST["inputEmail"];
$senha = $_POST["inputSenha"];
$turma = $_POST["inputTurma"];
$disciplina = $_POST["inputDisciplina"];

            
try {
    //Object Usuário        
    $userProf = new user();
    $userProf->setLogin($email);
    $userProf->setSenha($senha);
    $userProf->setPerfil_id("3");
    
    $userProf_Control = new control_user();
    $userid = $userProf_Control->Inserir($userProf);
    
    //Object Professor
    $objectProf = new professor();
    $objectProf->setNome($nome);
    $objectProf->setCpf($cpf);
    $objectProf->setRg($rg);
    $objectProf->setSexo($sexo);
    $objectProf->setOrgaoExp($orgaoExp);
    $objectProf->setEstadoCivil($estadoCivil);
    $objectProf->setDataNascimento($datanascimento);
    $objectProf->setTelefone($telefone);
    $objectProf->setEmail($email);
    
    $new_professor = new control_professor();
    $new_professor->inProfessor($objectProf, $userid, $turma, $disciplina);
    

    $msg = "Professor(a) <b>$nome</b> cadastrado(a) com sucesso!";
    echo "<script>";
        echo "window.location = '../view/adicionarprofessor.php?sucesso={$msg}';";
    echo "</script>";
        //}
    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
    }
    