<?php
require_once '../database/connect.php';
require_once 'professor.php';

class control_professor{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
        public function inProfessor(professor $professor, $userid, $turma, $disciplina) {
        try {
            $sql = "INSERT INTO professor (       
                Nome,
                CPF,
                Sexo,
                DataNascimento,
                Telefone,
                RG,
                OrgaoExp,
                EstadoCivil,
                Email,
                Usuario_ID) 
                VALUES (
                :Nome,
                :CPF,
                :Sexo,
                :DataNascimento,
                :Telefone,
                :RG,
                :OrgaoExp,
                :EstadoCivil, 
                :Email,
                :Usuario_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $professor->getNome());
            $p_sql->bindValue(":CPF", $professor->getCpf());
            $p_sql->bindValue(":Sexo", $professor->getSexo());
            $p_sql->bindValue(":DataNascimento", $professor->getDataNascimento());
            $p_sql->bindValue(":Telefone", $professor->getTelefone());
            $p_sql->bindValue(":RG", $professor->getRg());
            $p_sql->bindValue(":OrgaoExp", $professor->getOrgaoExp());
            $p_sql->bindValue(":EstadoCivil", $professor->getEstadoCivil());
            $p_sql->bindValue(":Email", $professor->getEmail());
            $p_sql->bindValue(":Usuario_ID", $userid);
             
            $p_sql->execute();
            $profID = Conexao::getInstance()->lastInsertId();
            
            foreach ($disciplina as $value) {
                $disProf = new control_professor();
                $disProf->adicionarDisciplinaProfessor($profID, $value);
            }
            foreach ($turma as $value) {
                $turmaProf = new control_professor();
                $turmaProf->adicionarTurmaProfessor($profID, $value);
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarProfessores() {
        try {
            $sql = "SELECT * FROM professor";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
   public function buscarProfByID($id) {
        try {
            $sql = "SELECT * FROM professor WHERE ID = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function buscarProfByUserID($id) {
        try {
            $sql = "SELECT * FROM professor WHERE Usuario_ID = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function adicionarDisciplinaProfessor($professorID, $disciplinaID) {
         try {
            $sql = "INSERT INTO dicsiplina_has_professor (       
                Professor_ID,
                Dicsiplina_ID ) 
                VALUES (
                :Professor_ID,
                :Dicsiplina_ID )";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Professor_ID", $professorID);
            $p_sql->bindValue(":Dicsiplina_ID", $disciplinaID);
    
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function adicionarTurmaProfessor($professorID, $turmaID) {
         try {
            $sql = "INSERT INTO professor_tem_turma (       
                Professor_ID,
                Turma_ID ) 
                VALUES (
                :Professor_ID,
                :Turma_ID )";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Professor_ID", $professorID);
            $p_sql->bindValue(":Turma_ID", $turmaID);
    
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo "erro ao Adicionar Turma ". $exc->getMessage();
        }
    }
    
    public function removerTurmaProfessor($professorID) {
         try {
            $sql = "DELETE FROM professor_tem_turma WHERE Professor_ID = :Professor_ID";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":Professor_ID", $professorID);
            return $p_sql->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function removerDisciplinaProfessor($professorID) {
         try {
            $sql = "DELETE FROM dicsiplina_has_professor WHERE Professor_ID = :Professor_ID";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":Professor_ID", $professorID);
            return $p_sql->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function deleteProfByCod($cod) {
        try {
            $sql = "DELETE P, U, DP, PT FROM professor AS P JOIN usuario AS U ON P.Usuario_ID = U.ID "
                    . "JOIN dicsiplina_has_professor AS DP ON P.ID = DP.Professor_ID "
                    . "JOIN professor_tem_turma AS PT ON P.ID = PT.Professor_ID WHERE P.ID=? ";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listProfessorDisc($cod) {
        try {
            $sql = "SELECT p.ID, d.ID AS IDd, p.Nome, d.Nome AS nomeDis  FROM professor p "
                  . "INNER JOIN professor_tem_turma pt ON pt.Professor_ID = p.ID "
                  . "INNER JOIN dicsiplina_has_professor dp ON p.ID = dp.Professor_ID "
                  . "INNER JOIN dicsiplina d ON d.ID = dp.Dicsiplina_ID "
                  . "INNER JOIN turma_tem_dicsiplina td ON d.ID = td.Dicsiplina_ID "
                  . "INNER JOIN turma t ON t.ID = pt.Turma_ID WHERE t.ID = ?";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listProfessorDiscById($cod) {
        try {
            $sql = "SELECT p.ID, d.ID AS IDd, d.Nome AS nomeDis  FROM professor p "
                  . "INNER JOIN dicsiplina_has_professor dp ON p.ID = dp.Professor_ID "
                  . "INNER JOIN dicsiplina d ON d.ID = dp.Dicsiplina_ID WHERE p.ID = ?";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listProfessorTurmaById($cod) {
        try {
            $sql = "SELECT p.ID, t.ID AS turmaID, t.Nome, t.Etapa, t.Turno FROM professor p "
                  . "INNER JOIN professor_tem_turma pt ON p.ID = pt.Professor_ID "
                  . "INNER JOIN turma t ON t.ID = pt.Turma_ID WHERE p.ID = ?";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function atualizarProfessorById(professor $professor) {
        try {
            $sql = "UPDATE professor SET    
                Nome = :Nome,
                DataNascimento = :DataNascimento,
                Sexo = :Sexo,
                CPF = :CPF,
                RG = :RG,
                EstadoCivil = :EstadoCivil,
                Telefone = :Telefone,
                Email = :Email,
                Status = :Status WHERE ID = :ID";
            
            $p_sql = Conexao::getInstance()->prepare($sql);
            
            $p_sql->bindValue(":Nome", $professor->getNome());
            $p_sql->bindValue(":DataNascimento", $professor->getDataNascimento());
            $p_sql->bindValue(":Sexo", $professor->getSexo());
            $p_sql->bindValue(":CPF", $professor->getCpf());
            $p_sql->bindValue(":RG", $professor->getRg());
            $p_sql->bindValue(":EstadoCivil", $professor->getEstadoCivil());
            $p_sql->bindValue(":Telefone", $professor->getTelefone());
            $p_sql->bindValue(":Email", $professor->getEmail());
            $p_sql->bindValue("Status", $professor->getStatus());
            $p_sql->bindValue("ID", $professor->getId());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "erro ao atualizar professor".$e->getMessage();
        }
    }
    
    public function countProf() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM professor";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
}
