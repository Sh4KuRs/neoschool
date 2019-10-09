<?php
if(isset($_POST["nota"]) && isset($_POST["infoNotaID"]))
{
    require_once '../class/control_nota.php';
    $notas_control = new control_nota();
    $notas = $_POST["nota"];
    $notaID = $_POST["infoNotaID"];
    
    foreach ($notas as $key => $value) {
        $notas_control->inserirNota($value, $notaID, $key);
    }
    $msg = "Frequencia Adicionada com Sucesso!";
    header ("location: ../view/notas.php?adicionado=".$msg);
}