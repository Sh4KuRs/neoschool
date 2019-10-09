<?php

require_once '../class/control_turmas.php';

$nome = $_POST["inputNome"];
$etapa = $_POST["inputEtapa"];
$turno = $_POST["inputTurno"];
$numeroA = $_POST["inputNumeroA"];
$disciplina = $_POST["inputDisciplina"]; 

try {
            
            
    $new_turma = new control_turmas();
        
    $new_turma ->inTurma($nome, $etapa, $turno, $numeroA, $disciplina);
     
    $msg = "Turma <b>$nome $etapa</b> cadastrada com sucesso!";
    
    echo "<script>";
        echo "window.location = '../view/turmas.php?sucesso={$msg}';";
        echo "</script>";
    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
}