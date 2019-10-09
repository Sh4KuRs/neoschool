<?php
require_once '../database/connect.php';
require_once 'user.php';
require_once 'aluno.php';

class control_user{
    
    public static $instance;
 
    public function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance))
        {
            self::$instance = new control_user();
        }
        return self::$instance;
    }
 
    public function Inserir(user $usuario) {
        try {
            $sql = "INSERT INTO usuario (       
                Login,
                Senha,
                Perfil_ID) 
                VALUES (
                :Login,
                :Senha,
                :Perfil_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Login", $usuario->getLogin());
            $p_sql->bindValue(":Senha", $usuario->getSenha());
            $p_sql->bindValue(":Perfil_ID", $usuario->getPerfil_id());
 
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            
        }
    }
    
    public function Editar($login, $senha, $id) {
        try {
            $sql = "UPDATE usuario SET Login = :login, Senha = :senha WHERE ID = :id";
            $stmt = Conexao::getInstance()->prepare( $sql );
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->bindValue(":id", $id);

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
 
    public function Deletar($cod) {
        try {
            $sql = "DELETE FROM usuario WHERE cod_usuario = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
 
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
 
    public function findUserById($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE ID = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            return $p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function buscarUser($nome) {
        try {
            $sql = "SELECT * FROM usuario WHERE Login = :Login";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":Login", $nome);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $ex) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
}
