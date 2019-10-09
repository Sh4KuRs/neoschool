<?php
require_once '../class/pais.php';
require_once '../class/control_pais.php';
require_once '../class/control_aluno.php';
require_once '../class/user.php';
require_once '../class/control_user.php';

$id = $_POST["inputID"];
$parentesco = $_POST["inputParentesco"];
$nomeResp = $_POST["inputNomeResp"];
$cpfResp = $_POST["inputCPFResp"];
$dataNResp = $_POST["inputDataNResp"];
$sexo = $_POST["inputSexo"];
$rg = $_POST["inputRG"];
$orgaoExp = $_POST["inputOrgaoExp"];
$estadoCivil = $_POST["inputEstadoCivil"];
$telefoneResp = $_POST["inputTelefoneResp"];
$emailResp = $_POST["inputUsuario"];
$senhaResp = $_POST["inputSenha"];

try {
            
        $userResp = new user();
        $userResp->setLogin($emailResp);
        $userResp->setSenha($senhaResp);

        //$userResp_Control = new control_user();
        //$userid = $userResp_Control->Inserir($userResp);

        $ObjectPais = new pais();
        $ObjectPais->setNome($nomeResp);
        $ObjectPais->setParentesco($parentesco);
        $ObjectPais->setCpf($cpfResp);
        $ObjectPais->setDataNascimento($dataNResp);
        $ObjectPais->setEmail($emailResp);
        $ObjectPais->setTelefone($telefoneResp);
        $ObjectPais->setSexo($sexo);
        $ObjectPais->setRg($rg);
        $ObjectPais->setOrgaoExp($orgaoExp);
        $ObjectPais->setEstadoCivil($estadoCivil);
        $ObjectPais->setStatus(isset($_POST["inputStatus"]) ? $status = $_POST["inputStatus"] : $status = "A");
        
        $responsavel = new control_pais();
        $responsavel_id = $responsavel->UpdateResponsavelById($ObjectPais, $id);
        
        $msg = "Pai/Responsavel <b>$nomeResp</b> cadastrado com sucesso!";
        echo "<script>";
        echo "window.location = '../view/adicionarpais.php?alteracao={$msg}';";
        echo "</script>";
        //}
    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
    }
    