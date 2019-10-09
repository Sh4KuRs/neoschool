<?php
if(isset($_GET["matricula"])){
require_once '../class/control_aluno.php';

$control_user = new control_aluno();
$control_user->deleteAlunoByCod($_GET["matricula"]);
$nome = $_GET["nome"];

$msg = "Aluno <b>$nome</b> excluido com sucesso do banco de dados!";

 echo "<script>";
        echo "window.location = '../view/listaralunos.php?sucesso={$msg}';";
    echo "</script>";

}
