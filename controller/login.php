<?php
session_start();
require_once '../class/user.php';
require_once '../class/control_user.php';
require_once '../database/connect.php';
require_once '../class/control_professor.php';
require_once '../class/control_aluno.php';
require_once '../class/control_pais.php';

if (isset($_POST['ENTRAR'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['login'];
    $password_entered = $_POST['senha'];

    if ($username == '')
        $errMsg = 'Digite Usuário';
    if ($password_entered == '')
        $errMsg = 'Digite Senha';

    if ($errMsg == '') {
        try {
            
            require_once '../class/control_login.php';
            
            $dto = new control_login();     
            $data = $dto->login($username, $password_entered);

            if($password_entered == $data['Senha']) {

                
                $_SESSION['User_ID'] = $data['ID'];
                $_SESSION['Login'] = $data['Login'];
                $_SESSION['Senha'] = $data['Senha'];
                $_SESSION['Perfil'] = $data['perfil'];
                
                if($data['perfil'] == 'Professor'){
                    $control_professor = new control_professor();
                    $dataProfessor = $control_professor->buscarProfByUserID($data['ID']);
                    $_SESSION['Nome'] = $dataProfessor['Nome'];
                    $_SESSION['Enti_ID'] = $dataProfessor['ID'];
                }
                if($data['perfil'] == 'Aluno'){
                    $control_aluno = new control_aluno();
                    $dataAluno = $control_aluno->buscarAlunoByUserID($data['ID']);
                    $_SESSION['Nome'] = $dataAluno['Nome'];
                    $_SESSION['Enti_ID'] = $dataAluno['Matricula'];
                }
                if($data['perfil'] == 'Responsavel'){
                    $control_responsavel = new control_pais();
                    $dataResponsavel = $control_responsavel->buscarRespByUserId($data['ID']);
                    $_SESSION['Nome'] = $dataResponsavel['Nome'];
                    $_SESSION['Enti_ID'] = $dataResponsavel['ID'];
                }
                if($data['perfil'] == 'Administrador'){
                    header('Location: ../view/dashboard.php');
                }
                header('Location: ../view/dashboard_1.php');
                
                exit;
            } else {
                $errMsg = '<b>E-mail ou senha inválido(a)</b>';
                session_start();
                $_SESSION["error"] = "<div class='alert alert-danger' role='alert'>$errMsg</div>";
                header('Location: ../index.php');
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}