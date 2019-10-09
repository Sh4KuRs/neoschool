<?php
if(isset($_POST["inputFrequencia"]) && isset($_POST["inputFrequencia1"])){
    require_once '../class/control_frequencia.php';
    $frequencia = new control_frequencia();
    
    $faltas1 = $_POST["inputFrequencia"];
    $faltas2 = $_POST["inputFrequencia1"];
    
    
    foreach ($faltas1 as $key => $value) {
        if($value == "F" || $value == "FJ" || $faltas2[$key] == "F" || $faltas2[$key] == "FJ"){
            $frequencia->alterarFaltas($value, $faltas2[$key], $key);
            echo $key." ".$value."";
        }
        if($value == "P" || $faltas2[$key] == "P"){
        }
    }
    $msg = "Frequencia <b>Alterada</b> com sucesso!";

    header ("location: ../view/listarfrequencias.php?sucesso=".$msg);
}