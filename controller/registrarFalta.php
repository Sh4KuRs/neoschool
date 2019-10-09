<?php
if(isset($_POST["faltas1"]) && isset($_POST["faltas2"]) && isset($_POST["inputFrequencia"])){
    
    require_once '../class/control_frequencia.php';
    $frequencia = new control_frequencia();
    
    $faltas1 =  $_POST["faltas1"];
    $faltas2 = $_POST["faltas2"];
    
    foreach ($_POST["faltas1"] as $key => $value) {
        if($value == "F" || $faltas2[$key] == "F" || $value == "FJ" || $faltas2[$key] == "FJ"){
            $frequencia->inserirFrequencia($value, $faltas2[$key], $_POST["inputFrequencia"], $key);
        }
    }
    $msg = "Frequencia Adicionada com Sucesso!";
 header ("location: ../view/listarfrequencias.php?adicionado=".$msg);
}

