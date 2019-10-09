<?php
require_once '../database/connect.php';

class control_frequencia {
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
    public function inserirFrequencia($falta1, $falta2, $infFrequencia, $idAluno) {
        try {
            $sql = "INSERT INTO frequencia (       
                falta1,
                falta2,
                info_frequencia_id,
                aluno_Matricula) 
                VALUES (
                ?,?,?,?)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $falta1);
            $p_sql->bindValue(2, $falta2);
            $p_sql->bindValue(3, $infFrequencia);
            $p_sql->bindValue(4, $idAluno);
            
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function inserirInfoFrequencia($descricao, $data, $turma_id, $discID, $profID) {
        try {
            $sql = "INSERT INTO info_frequencia (       
                descricao,
                data,
                turma_ID,
                Disciplina_ID,
                Professor_ID) 
                VALUES (
                ?,?,?,?,?)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $descricao);
            $p_sql->bindValue(2, $data);
            $p_sql->bindValue(3, $turma_id);
            $p_sql->bindValue(4, $discID);
            $p_sql->bindValue(5, $profID);
            
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function alterarFaltas($falta1, $falta2, $id) {
         try {
            $sql = "UPDATE frequencia SET falta1 = ?, falta2 = ? WHERE id = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $falta1);
            $p_sql->bindValue(2, $falta2);
            $p_sql->bindValue(3, $id);
            return $p_sql->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function contarFaltas($idAluno) {
         try {
            $sql = "SELECT falta1,falta2, count(*) as qtd FROM frequencia WHERE aluno_Matricula = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $idAluno);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
   
    public function selecionarFrequenciaInfo($id) {
         try {
            $sql = "SELECT * FROM info_frequencia WHERE id = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function listFrequencia($disciplina, $data, $turma) {
        try {
            $sql = "SELECT a.Nome,a.Matricula, f.falta1, f.falta2, f.id as idF, inf.id, inf.descricao, inf.Disciplina_ID, inf.data FROM frequencia AS f "
                    . "INNER JOIN info_frequencia as inf ON f.info_frequencia_id = inf.id "
                    . "RIGHT JOIN aluno as a on a.Matricula = f.aluno_Matricula and a.Turma_ID = inf.turma_ID and inf.Disciplina_ID = ? and inf.data = ? where a.Turma_ID = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $disciplina);
            $p_sql->bindValue(2, $data);
            $p_sql->bindValue(3, $turma);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function listInfoFrequencia($turma, $disciplina, $professor) {
        try {
            $sql = "SELECT inf.*, d.Nome AS nomeDisc, p.Nome AS nomeProf, t.Nome AS nomeTurma, t.Etapa, t.Turno FROM info_frequencia AS inf "
                    . "INNER JOIN dicsiplina AS d ON d.id = inf.Disciplina_ID "
                    . "INNER JOIN professor AS p ON p.id = inf.Professor_ID "
                    . "INNER JOIN turma AS t ON t.id = inf.turma_ID "
                    . "WHERE inf.turma_ID = ? "
                    . "AND inf.Disciplina_ID = ? "
                    . "AND inf.Professor_ID = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $turma);
            $p_sql->bindValue(2, $disciplina);
            $p_sql->bindValue(3, $professor);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
