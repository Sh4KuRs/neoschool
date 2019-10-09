<?php

require_once '../class/control_disciplinas.php';

$nome = $_POST["inputNome"];
$cargaHoraria = $_POST["inputCargaH"];

try {
            
            
    $disciplina = new control_disciplinas();
        
    $disciplina->inDisciplina($nome, $cargaHoraria);
     
    $msg = "Disciplina <b>$nome</b> cadastrada com sucesso!";
    echo "<script>";
        echo "window.location = '../view/disciplinas.php?sucesso={$msg}';";
        echo "</script>";

    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
}