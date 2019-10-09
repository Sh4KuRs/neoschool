<?php
require_once '../database/connect.php';

class control_turmas{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
    public function buscarPcod($cod) {
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
    public function atualizarTurma($id, $nome, $etapa, $turno, $numeroA) {
        try {
            $sql = "UPDATE turma SET Nome = ?, Etapa = ?, Turno = ?, QtdMax_Alunos = ? WHERE ID = ?";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $etapa);
            $p_sql->bindValue(3, $turno);
            $p_sql->bindValue(4, $numeroA);
            $p_sql->bindValue(5, $id);
            
            $p_sql->execute();
            $turma_id = Conexao::getInstance()->lastInsertId();
            
            /*foreach ($disciplinas as $value) {
                $adicionarDisc = new control_turmas();
                $adicionarDisc->adicionarDisciplinaTurma($turma_id, $value);
            }*/
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function inTurma($nome, $etapa, $turno, $numeroA, $disciplinas) {
        try {
            $sql = "INSERT INTO turma (       
                Nome,
                Etapa,
                Turno,
                QtdMax_Alunos) 
                VALUES (
                :Nome,
                :Etapa,
                :Turno,
                :QtdMax_Alunos)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $nome);
            $p_sql->bindValue(":Etapa", $etapa);
            $p_sql->bindValue(":Turno", $turno);
            $p_sql->bindValue(":QtdMax_Alunos", $numeroA);
            
            $p_sql->execute();
            $turma_id = Conexao::getInstance()->lastInsertId();
            
            foreach ($disciplinas as $value) {
                $adicionarDisc = new control_turmas();
                $adicionarDisc->adicionarDisciplinaTurma($turma_id, $value);
            }
            
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function adicionarDisciplinaTurma($turmaID, $disciplinaID) {
         try {
            $sql = "INSERT INTO turma_tem_dicsiplina (       
                Turma_ID,
                Dicsiplina_ID ) 
                VALUES (
                :Turma_ID,
                :Dicsiplina_ID )";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Turma_ID", $turmaID);
            $p_sql->bindValue(":Dicsiplina_ID", $disciplinaID);
    
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function ListarTurmas() {
        try {
            $sql = "SELECT * FROM turma";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    
    public function BuscarTurmaCOD($cod) {
        try {
            $sql = "SELECT * FROM turma WHERE ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
     public function listTurmaByIdAluno($cod) {
        try {
            $sql = "SELECT t.*, a.Nome, a.Matricula FROM turma AS t "
                    . "INNER JOIN aluno a ON a.Turma_ID = t.ID WHERE ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function deleteTurmaByCod($cod) {
        try {
            $sql = "DELETE T, TD, PT FROM turma AS T "
                    . "INNER JOIN turma_tem_dicsiplina AS TD ON TD.Turma_ID = '$cod' "
                    . "INNER JOIN professor_tem_turma AS PT ON T.ID = '$cod' WHERE T.ID = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function countTurmas() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM turma";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
