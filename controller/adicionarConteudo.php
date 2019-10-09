<?php

require_once '../class/control_salavirtual.php';

$titulo = $_POST["inputTitulo"];
$conteudo = $_POST["inputConteudo"];
$id = $_POST["inputId"];

$salaDTO = new control_SalaVirtual();
$idConteudo = $salaDTO->inConteudo($id, $titulo, $conteudo);
if (isset($_FILES['arquivos']) && !empty($_FILES['arquivos']['name']))
{
    // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
     
    // cria uma variável para facilitar
    $arquivos = $_FILES['arquivos'];
    
    
    $tmp_name = $_FILES['arquivos']['tmp_name'];
    $name     = $_FILES['arquivos']['name'];//Atribui uma array com os nomes temporários dos arquivos à variável
    for($i = 0; $i < count($tmp_name); $i++) //passa por todos os arquivos
      {
            $ext = strtolower(substr($name[$i],-4));
            $new_name = date("Y.m.d-H.i.s") ."-". $i . $ext;
            $diretorio = "../arquivosSala/";
            move_uploaded_file($tmp_name[$i], $diretorio.$new_name); //efetua o upload
            $salaDTO->inArquivos($idConteudo, $new_name, $name[$i], $ext);
         
      }
      echo "<script>";
        echo "window.location = '../view/sala.php?id={$id}';";
      echo "</script>";
}
/*
try {



    $control_aviso = new control_avisos();
    $control_aviso->inAviso($nome, $tipo, $conteudo, $data, $hora);
    
    $msg = "Aviso <b>$nome</b> criado com sucesso!";
    $_SESSION["sucesseful"] = "<div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> $msg</div>";
    header('Location:../view/blog.php');
    
} catch (PDOException $e) {
    echo $errMsg = $e->getMessage();
}
*/