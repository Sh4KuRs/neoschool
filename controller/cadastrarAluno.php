<?php

require_once '../class/aluno.php';
require_once '../class/control_aluno.php';

$nome = $_POST["inputNome"];
$email = $_POST["inputEmail"];
$matricula = $_POST["inputMatricula"];
$nomeMae = $_POST["inputMae"];
$nomePai = $_POST["inputPai"];
$dataNascimento = $_POST["inputDataN"];
$sexo = $_POST["inputSexo"];
$telefone = $_POST["inputNumber"];

            
try {
            
        /*$p_sql = 'SELECT login_user, email FROM usuario WHERE login_user = :login';
        $stmt = Conexao::getInstance()->prepare($p_sql);
            
        $stmt->execute(array(':login' => $login));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == true) {
            session_start();
            $errMsg = "Já existe um usuário com esse nome de usuário!";
            $_SESSION["erro"] = "<div class='alert alert-danger' role='alert'>$errMsg</div>";
            header('Location: ../view/register.php');
        } else {*/
            
        $new_aluno = new aluno();
        
        $new_aluno->setNomeAluno($nome);
        $new_aluno->setMatricula($matricula);
        $new_aluno->setDataNascimento($dataNascimento) ;
        $new_aluno->setEmailAluno($email) ;
        $new_aluno->setNomeMae($nomeMae);
        $new_aluno->setNomePai($nomePai);
        $new_aluno->setSexo($sexo);
        $new_aluno->setTelefoneAluno($telefone);

        $control_user = new control_aluno();
        $control_user->inAluno($new_aluno);

        $msg = "Aluno $nome cadastrado com sucesso!";
        $_SESSION["sucesseful"] = "<div class='alert alert-success' role='alert'>$msg</div>";
        header('Location:../view/adicionaraluno.php');
        //}
    } catch (PDOException $e) {
       $errMsg = $e->getMessage();
    }
    