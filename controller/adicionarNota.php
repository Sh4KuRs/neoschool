<?php 
if(isset($_POST["inputTurma"]) && isset($_POST["inputDisc"]) && isset($_POST["inputData"]) && isset($_POST["inputDesc"]) && isset($_POST["inputValor"])){
    
    require_once '../class/control_nota.php';
    $discID = $_POST["inputDisc"];
    $profID = $_POST["inputProfessor"];
    $valor = $_POST["inputValor"];
    $data = $_POST["inputData"];
    $descricao = $_POST["inputDesc"];
    $turma_id = $_POST["inputTurma"];
    
    $notas = new control_nota();
    $notaID = $notas->inserirInfoNota($descricao, $data, $turma_id, $discID, $profID);
    
    echo "<script>";
        echo "window.location = '../view/nota.php?id={$notaID}'";
    echo "</script>";
}