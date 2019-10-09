<?php
require_once '../database/connect.php';

class control_avisos{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
    public function inAviso($nome, $tipo, $conteudo, $data, $hora, $turma) {
        try {
            $sql = "INSERT INTO avisos (       
                Nome,
                Tipo,
                Conteudo,
                Data,
                Hora,
                Turma_ID) 
                VALUES (
                :Nome,
                :Tipo,
                :Conteudo,
                :Data,
                :Hora,
                :Turma_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $nome);
            $p_sql->bindValue(":Tipo", $tipo);
            $p_sql->bindValue(":Conteudo", $conteudo);
            $p_sql->bindValue(":Data", $data);
            $p_sql->bindValue(":Hora", $hora);
            $p_sql->bindValue(":Turma_ID", $turma);
  
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function ListarAvisos() {
        try {
            $sql = "SELECT * FROM avisos";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function deleteAviso($id) {
        try {
            $sql = "DELETE FROM avisos "
                    . "WHERE Codigo = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function BuscarPorCOD($cod) {
        try {
            $sql = "SELECT * FROM avisos WHERE Codigo = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function UpdateAvisos($id, $nome, $data, $tipo, $conteudo, $hora) {
        try {
            $sql = "UPDATE avisos "
                    ."SET Nome= ?, Data=?, Tipo= ?, Conteudo=?, Hora= ? "
                    . "WHERE Codigo = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $data);
            $stmt->bindValue(3, $tipo);
            $stmt->bindValue(4, $conteudo);
            $stmt->bindValue(5, $hora);
            $stmt->bindValue(6, $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
