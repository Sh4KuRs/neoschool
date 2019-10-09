<?php
require_once '../class/control_user.php';
require_once '../class/control_aluno.php';
$idUser = $_POST["inputID"];
$email = $_POST["inputEmail"];
$senha = $_POST["inputSenha"];
if(isset($_POST["inputEducacao"])){
    $educacao = $_POST["inputEducacao"];
}


try {

if(isset($_FILES['inputFoto'])){
    $extensao = strtolower(substr($_FILES['inputFoto']['name'], -4));
    $novo_nome = md5(time()) . $extensao; 
    
    $diretorio = "../img/Alunos/";
    move_uploaded_file($_FILES['inputFoto']['tmp_name'], $diretorio.$novo_nome);
    }  else {
       $novo_nome = "user.png";
    }
    
    $alunoControl = new control_aluno();
    $alunoControl->UpdateFoto($novo_nome, $_GET["id"]);
    
    $userControl = new control_user();
    $userControl->Editar($email, $senha, $idUser);
    
    echo "<script>";
    echo "window.location = '../view/meuperfil.php?alteracao';";
    echo "</script>";
    
} catch (PDOException $e) {
    echo $errMsg = $e->getMessage();
}
    