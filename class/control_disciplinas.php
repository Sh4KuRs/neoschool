<?php
require_once '../database/connect.php';

class control_disciplinas{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
    /*public function buscarPcod($cod) {
        try {
            $sql = "SELECT * FROM turmas WHERE Codigo = :Codigo";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":Codigo", $nome);
            $p_sql->execute();
            return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $ex) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    */
    public function inDisciplina($nome, $cargaH) {
        try {
            $sql = "INSERT INTO dicsiplina (       
                Nome, cargaHoraria) 
                VALUES (
                :Nome,
                :CargaH)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $nome);
            $p_sql->bindValue(":CargaH", $cargaH);
            
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
 
    public function listarDisc() {
        try {
            $sql = "SELECT * FROM dicsiplina";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarDiscById($id) {
        try {
            $sql = "SELECT * FROM dicsiplina WHERE ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $dis = $stmt->fetch(PDO::FETCH_ASSOC);
            return $dis;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function BuscarDisCOD($cod) {
        try {
            $sql = "SELECT d.Nome AS nomeDisciplina, d.ID AS Cod, cargaHoraria FROM turma t "
                  . "INNER JOIN turma_tem_dicsiplina td ON t.ID = td.Turma_ID "
                    . "INNER JOIN dicsiplina d ON d.ID = td.Dicsiplina_ID WHERE t.ID = ?";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listTurmasDisc($cod) {
        try {
            $sql = "SELECT t.Nome, t.ID, t.Turno, t.Etapa FROM turma t "
                  . "INNER JOIN turma_tem_dicsiplina td ON t.ID = td.Turma_ID "
                    . "INNER JOIN dicsiplina d ON d.ID = td.Dicsiplina_ID WHERE d.ID = ?";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
     public function atualizarDisciplina($id, $nome, $cargaHoraria) {
        try {
            $sql = "UPDATE dicsiplina SET Nome = ?, cargaHoraria = ? WHERE ID = ?";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $cargaHoraria);
            $p_sql->bindValue(3, $id);
            
            return $p_sql->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    
}
