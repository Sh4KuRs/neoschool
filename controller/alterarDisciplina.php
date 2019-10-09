<?php
require_once '../class/control_disciplinas.php';

if(isset($_POST["inputNome"]) && isset($_POST["inputCargaH"]) && isset($_POST["ID"])){
    
    $disciplinaControl = new control_disciplinas();
    $disciplinaControl->atualizarDisciplina($_POST["ID"], $_POST["inputNome"], $_POST["inputCargaH"]);
    
    $msg = "Disciplina <b>{$_POST["inputNome"]}</b> alterada com sucesso!";
    echo "<script>";
        echo "window.location = '../view/disciplinas.php?sucesso={$msg}';";
    echo "</script>";
}

