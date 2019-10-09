<?php 
if(isset($_POST["inputTurma"]) && isset($_POST["inputDisc"]) && isset($_POST["inputData"]) && isset($_POST["inputDesc"])){
    
    require_once '../class/control_frequencia.php';
    $discID = $_POST["inputDisc"];
    $profID = $_POST["inputProfessor"];
    $data = $_POST["inputData"];
    $descricao = $_POST["inputDesc"];
    $turma_id = $_POST["inputTurma"];
    
    $frequencia_contol = new control_frequencia();
    $idFrequencia = $frequencia_contol->inserirInfoFrequencia($descricao, $data, $turma_id, $discID, $profID);
    
    echo "<script>";
        echo "window.location = '../view/frequencia.php?id={$idFrequencia}'";
    echo "</script>";
}