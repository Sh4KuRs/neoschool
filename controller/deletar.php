<?php
session_start();
if(isset($_GET["matricula"])){
    require_once '../class/control_aluno.php';

    $control_user = new control_aluno();
    $control_user->deleteAlunoByCod($_GET["matricula"]);
    $nome = $_GET["nome"];

    $msg = "Aluno <b>$nome</b> excluido com sucesso do banco de dados!";
    $_SESSION["sucesseful"] = "<div class='alert alert-danger alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Excluir Aluno!</h4> $msg</div>";
    header('Location:../view/listaralunos.php');

}
if(isset($_GET["responsavel"])){
    require_once '../class/control_pais.php';
    $control_resp = new control_pais();
    $control_resp->deleteRespByCod($_GET["ID"]);
    $nome = $_GET["nome"];
    
    $msg = "Aluno <b>$nome</b> excluido com sucesso do banco de dados!";
    $_SESSION["sucesseful"] = "<div class='alert alert-danger alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Excluir Aluno!</h4> $msg</div>";
    header('Location:../view/adicionarpais.php');
}
if(isset($_GET["professor"])){
    require_once '../class/control_professor.php';
    $control_resp = new control_professor();
    $control_resp->deleteProfByCod($_GET["ID"]);
    $nome = $_GET["nome"];
    
    $msg = "Professor(a) <b>$nome</b> excluido com sucesso do banco de dados!";
    $_SESSION["sucesseful"] = "<div class='alert alert-danger alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Excluir Professor(a)!</h4> $msg</div>";
    header('Location:../view/adicionarprofessor.php');
}
if(isset($_GET["turma"])){
    require_once '../class/control_turmas.php';
    $control_turma = new control_turmas();
    $control_turma->deleteTurmaByCod($_GET["turma"]);
    $nome = $_GET["nome"];
    
    $msg = "Professor(a) <b>$nome</b> excluido com sucesso do banco de dados!";
    $_SESSION["sucesseful"] = "<div class='alert alert-danger alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Excluir Professor(a)!</h4> $msg</div>";
    header('Location:../view/adicionarprofessor.php');
}