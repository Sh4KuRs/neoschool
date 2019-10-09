<?php

require_once '../class/user.php';
require_once '../class/control_user.php';

$login = $_POST["nameUser"];
$password = $_POST["password"];
$nome = $_POST["name"];
$email = $_POST["email"];
            
try {
            
        $p_sql = 'SELECT login_user, email FROM usuario WHERE login_user = :login';
        $stmt = Conexao::getInstance()->prepare($p_sql);
            
        $stmt->execute(array(':login' => $login));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == true) {
            session_start();
            $errMsg = "Já existe um usuário com esse nome de usuário!";
            $_SESSION["erro"] = "<div class='alert alert-danger' role='alert'>$errMsg</div>";
            header('Location: ../view/register.php');
        } else {
            
        $new_user = new user();
        
        $new_user->setEmail($email);  
        $new_user->setSenha($password);
        $new_user->setNome($nome);
        $new_user->setUser_login($login);

        $control_user = new control_user();
        $control_user->Inserir($new_user);

        $msg = "Usuário $login cadastrado com sucesso!";
        $_SESSION["sucesseful"] = "<div class='alert alert-success' role='alert'>$msg</div>";
        header('Location:../index.php');
        }
    } catch (PDOException $e) {
       $errMsg = $e->getMessage();
    }
    