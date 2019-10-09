<?php
require_once '../database/connect.php';

class control_login {

    public static $instance;
 
    public function __construct() {
        //
    }

    public function login($usuario, $senha) {
        try {
            $sql = "SELECT p.Nome AS perfil, p.ID, u.* FROM usuario u "
                 . "INNER JOIN perfil p on p.ID = u.Perfil_ID "
                 . "WHERE u.Login = ? AND u.Senha = ?";
         $stmt = Conexao::getInstance()->prepare($sql);
         $stmt->bindValue(1, $usuario);
         $stmt->bindValue(2, $senha);
         $stmt->execute();
         $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
         return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
