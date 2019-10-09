<?php
require_once '../database/connect.php';

class control_nota {
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
    public function inserirNota($nota, $notaID, $alunoID) {
        try {
            $sql = "INSERT INTO notas (       
                nota,
                info_nota_id,
                aluno_Matricula) 
                VALUES (
                ?,?,?)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $nota);
            $p_sql->bindValue(2, $notaID);
            $p_sql->bindValue(3, $alunoID);
            
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function inserirInfoNota($descricao, $data, $turma_id, $discID, $profID) {
        try {
            $sql = "INSERT INTO info_nota (       
                descricao,
                data,
                turma_ID,
                disciplina_ID,
                professor_ID) 
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
    /*
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
   */
    public function selecionarNotaInfo($id) {
         try {
            $sql = "SELECT * FROM info_nota WHERE id = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function listNotas($disciplina, $data, $turma) {
        try {
            $sql = "SELECT a.Nome, a.Matricula, n.id as idN,n.nota, inf.id, inf.descricao, inf.disciplina_ID, inf.data FROM notas AS n "
                    . "INNER JOIN info_nota as inf ON n.info_nota_id = inf.id "
                    . "RIGHT JOIN aluno as a on a.Matricula = n.aluno_Matricula and a.Turma_ID = inf.turma_ID and inf.disciplina_ID = ? and inf.data = ? WHERE a.Turma_ID = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $disciplina);
            $p_sql->bindValue(2, $data);
            $p_sql->bindValue(3, $turma);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente  mais tarde.";
        }
    }
    public function listNotasById($disciplina, $turma) {
        try {
            $sql = "SELECT a.Nome, a.Matricula, n.aluno_Matricula, n.id as idN,n.nota, inf.id, inf.descricao, inf.disciplina_ID, inf.data FROM notas AS n "
                    . "INNER JOIN info_nota as inf ON n.info_nota_id = inf.id "
                    . "RIGHT JOIN aluno AS a ON a.Matricula = n.aluno_Matricula  WHERE a.Turma_ID = ? AND inf.disciplina_ID = ? ORDER BY inf.descricao;";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $turma);
            $p_sql->bindValue(2, $disciplina);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente  mais tarde.";
        }
    }
    public function listNotaInfoById($disciplina, $turma) {
         try {
            $sql = "SELECT * FROM info_nota WHERE disciplina_ID = ? and turma_ID = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $disciplina);
            $p_sql->bindValue(2, $turma);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function listInfoNota($turma, $disciplina, $professor) {
        try {
            $sql = "SELECT inf.*, d.Nome AS nomeDisc, p.Nome AS nomeProf, t.Nome AS nomeTurma, t.Etapa, t.Turno FROM info_nota AS inf "
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
