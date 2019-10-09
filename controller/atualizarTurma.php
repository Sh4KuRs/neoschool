<?php

require_once '../class/control_turmas.php';

$nome = $_POST["inputNome"];
$etapa = $_POST["inputEtapa"];
$turno = $_POST["inputTurno"];
$numeroA = $_POST["inputNumeroA"];
$idturma = $_POST["idturma"];

try {
            
    $new_turma = new control_turmas();
        
    $new_turma ->atualizarTurma($idturma,$nome, $etapa, $turno, $numeroA);
     
    $msg = "Turma <b>$nome $etapa</b> cadastrada com sucesso!";
    $_SESSION["sucesseful"] = "<div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> $msg</div>";
    header('Location:../view/turmas.php');

    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
}