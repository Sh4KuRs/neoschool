<?php

require_once '../class/control_avisos.php';

$nome = $_POST["inputTitulo"];
$tipo = $_POST["inputType"];
$data = $_POST["inputDataAviso"];
$conteudo = $_POST["inputMensagem"];
$hora = $_POST["inputHora"];



try {



    $control_aviso = new control_avisos();
    $control_aviso->inAviso($nome, $tipo, $conteudo, $data, $hora);
    
    $msg = "Aviso <b>$nome</b> criado com sucesso!";
    $_SESSION["sucesseful"] = "<div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> $msg</div>";
    header('Location:../view/blog.php');
    
} catch (PDOException $e) {
    echo $errMsg = $e->getMessage();
}
    