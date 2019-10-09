<?php

require_once '../class/aluno.php';
require_once '../class/user.php';
require_once '../class/control_aluno.php';
require_once '../class/control_user.php';
require_once '../class/control_pais.php';
require_once '../class/pais.php';
require_once 'functions.php';

$nome = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$matricula = $_POST["inputMatricula"];
$dataNascimento = $_POST["inputDataN"];
$sexo = $_POST["inputSexo"];
$telefone = $_POST["inputTelefone"];
$cpf = $_POST["inputCPF"];
$rg = $_POST["inputRG"];
$orgaoExpeditor = $_POST["inputOrgaoExp"];
$estadoCivil = $_POST["inputEstadoCivil"];
$turma = $_POST["inputTurma"];
$senha = $_POST["inputSenha"];
$usuario = $_POST["inputUsuario"];

if(isset($_POST["inputResponsavel"])){
    $respID = $_POST["inputResponsavel"];
}
            
try {
        if(isset($_FILES['upload_file'])){
            $extensao = strtolower(substr($_FILES['upload_file']['name'], -4));
            $novo_nome = md5(time()) . $extensao; 
            $diretorio = "../img/Alunos/";
            move_uploaded_file($_FILES['upload_file']['tmp_name'], $diretorio.$novo_nome);
        }  else {
            $novo_nome = "user.png";
        }
    
    
        if(!isset($_POST["inputResponsavel"])){
            $parentesco = $_POST["inputParentesco"];
            $nomeResp = $_POST["inputNomeResp"];
            $cpfResp = $_POST["inputCPFResp"];
            $rgResp = $_POST["inputRGResp"];
            $estadoCivilResp = $_POST["inputEstadoCivilResp"];
            $orgaoExpResp = $_POST["inputOrgaoExpResp"];
            $dataNResp = $_POST["inputDataNResp"];
            $sexoResp = $_POST["inputSexoResp"];
            $telefoneResp = $_POST["inputTelefoneResp"];
            $emailResp = $_POST["inputUsuarioResp"];
            $senhaResp = $_POST["inputSenhaResp"];
          

            $userResp = new user();
            $userResp->setLogin($emailResp);
            $userResp->setSenha($senhaResp);
            $userResp->setPerfil_id("4");

            $userResp_Control = new control_user();
            $userid = $userResp_Control ->Inserir($userResp);
           
            $ObjectPais = new pais();
            $ObjectPais->setNome($nomeResp);
            $ObjectPais->setParentesco($parentesco);
            $ObjectPais->setCpf($cpfResp);
            $ObjectPais->setDataNascimento($dataNResp);
            $ObjectPais->setEmail($emailResp);
            $ObjectPais->setTelefone($telefoneResp);
            $ObjectPais->setSexo($sexoResp);
            $ObjectPais->setRg($rgResp);
            $ObjectPais->setOrgaoExp($orgaoExpResp);
            $ObjectPais->setEstadoCivil($estadoCivilResp);

            $responsavel = new control_pais();
            $responsavel_id = $responsavel->inResponsavel($ObjectPais, $userid);
            
         
            $new_aluno = new aluno();
        
            $new_aluno->setNomeAluno($nome);
            $new_aluno->setMatricula($matricula);
            $new_aluno->setDataNascimento($dataNascimento) ;
            $new_aluno->setEmailAluno($email) ;
            $new_aluno->setSexo($sexo);
            $new_aluno->setTelefoneAluno($telefone);
            $new_aluno->setCpf($cpf);
            $new_aluno->setRg($rg);
            $new_aluno->setOrgaoExpeditor($orgaoExpeditor);
            $new_aluno->setEstadoCivil($estadoCivil);
            $new_aluno->setTuma($turma);
            $new_aluno->setUser($userid);
            $new_aluno->setResponsavel($responsavel_id);

            $control_user = new control_aluno();
            $control_user->inAluno($new_aluno, $novo_nome);
        }
        else{
            
            $new_user = new user();
            $new_user->setLogin($usuario);
            $new_user->setSenha($senha);
            $new_user->setPerfil_id("5");

            $user_control = new control_user();
            $id_user = $user_control->Inserir($new_user);

            $new_aluno = new aluno();

            $new_aluno->setNomeAluno($nome);
            $new_aluno->setMatricula($matricula);
            $new_aluno->setDataNascimento($dataNascimento) ;
            $new_aluno->setEmailAluno($email) ;
            $new_aluno->setSexo($sexo);
            $new_aluno->setTelefoneAluno($telefone);
            $new_aluno->setCpf($cpf);
            $new_aluno->setRg($rg);
            $new_aluno->setOrgaoExpeditor($orgaoExpeditor);
            $new_aluno->setEstadoCivil($estadoCivil);
            $new_aluno->setTuma($turma);
            $new_aluno->setUser($id_user);
            
            if(calcularIdade($dataNascimento) <= "17"){
                
                $new_aluno->setResponsavel($respID);   
            }  else {
                $new_aluno->setResponsavel("37");   
            }

            $control_user = new control_aluno();
            $control_user->inAluno($new_aluno, $novo_nome);
        }
        
        $msg = "Aluno <b>$nome</b> cadastrado com sucesso!";
        
        echo "<script>";
        echo "window.location = '../view/aluno.php?cadastrar&sucesso={$msg}';";
        echo "</script>";
        
    } catch (PDOException $e) {
       echo $errMsg = $e->getMessage();
    }
    