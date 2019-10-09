<?php
require_once '../database/connect.php';

class control_SalaVirtual{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    
        public function inSalaVirtual($nome, $professor, $turma, $disciplina) {
        try {
            $sql = "INSERT INTO ambiente_virtual (       
                Nome,
                Professor_ID,
                turma_tem_dicsiplina_Turma_ID,
                turma_tem_dicsiplina_Dicsiplina_ID) 
                VALUES (
                :Nome,
                :Professor_ID,
                :turma_tem_dicsiplina_Turma_ID,
                :turma_tem_dicsiplina_Dicsiplina_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $nome);
            $p_sql->bindValue(":Professor_ID", $professor);
            $p_sql->bindValue(":turma_tem_dicsiplina_Turma_ID", $turma);
            $p_sql->bindValue(":turma_tem_dicsiplina_Dicsiplina_ID", $disciplina);
             
            $p_sql->execute();
            $profID = Conexao::getInstance()->lastInsertId();
           
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    
    public function listarSalasVirtuais() {
        try {
            $sql = "SELECT AV.ID, p.Nome AS nomeProf, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarSalasVirtuaisById($id) {
        try {
            $sql = "SELECT AV.ID, p.Nome AS nomeProf, p.ID AS idProf, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID WHERE AV.ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetch(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarAlunosSalasVirtuaisById($id) {
        try {
            $sql = "SELECT AV.ID, p.Nome AS nomeProf, p.ID AS idProf, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID WHERE t.ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAlunosSalasById($id) {
        try {
            $sql = "SELECT AV.ID, a.Nome, a.Foto, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN aluno a ON a.Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID WHERE AV.ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarProfSalasVirtuaisById($id) {
        try {
            $sql = "SELECT AV.ID, p.Nome AS nomeProf, p.ID AS idProf, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID WHERE p.ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarTumaSalasVirtuaisById($id) {
        try {
            $sql = "SELECT AV.ID, p.Nome AS nomeProf, p.ID AS idProf, t.Nome AS nomeTurma,t.Etapa, t.Turno, d.Nome AS nomeDis, AV.Professor_ID, AV.turma_tem_dicsiplina_Turma_ID, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM ambiente_virtual AS AV "
                    . "INNER JOIN professor p ON AV.Professor_ID = p.ID "
                    . "INNER JOIN turma t ON AV.turma_tem_dicsiplina_Turma_ID = t.ID "
                    . "INNER JOIN dicsiplina d ON AV.turma_tem_dicsiplina_Dicsiplina_ID = d.ID WHERE p.ID = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarConteudoSalasVirtuais($id) {
        try {
            $sql = "SELECT c.titulo, c.id, c.ambiente_virtual_ID, c.conteudo, p.Nome AS nomeProf, AV.ID, AV.turma_tem_dicsiplina_Turma_ID, "
                    . "c.hora, c.data, AV.turma_tem_dicsiplina_Dicsiplina_ID FROM conteudo AS c "
                    . "INNER JOIN ambiente_virtual AV ON AV.ID = c.ambiente_virtual_ID "
                    . "INNER JOIN professor p ON p.ID = AV.Professor_ID WHERE AV.ID = ? ORDER BY c.id DESC";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAquivosSalasVirtuais($id) {
        try {
            $sql = "SELECT a.url, a.titulo AS nomeArquivo, a.type, a.conteudo_id, c.id FROM arquivo AS a "
                    . "INNER JOIN conteudo c ON c.id = a.conteudo_id WHERE a.conteudo_id = ?";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $aquivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $aquivos;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function inConteudo($id,$titulo, $conteudo) {
        try {
            $sql = "INSERT INTO conteudo (       
                titulo,
                conteudo,
                ambiente_virtual_ID) 
                VALUES (?,?,?)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $titulo);
            $p_sql->bindValue(2, $conteudo);
            $p_sql->bindValue(3, $id);
  
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function inArquivos($id,$url, $titulo, $type) {
        try {
            $sql = "INSERT INTO arquivo (       
                url,
                titulo,
                type,
                conteudo_id) 
                VALUES (?,?,?,?)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(1, $url);
            $p_sql->bindValue(2, $titulo);
            $p_sql->bindValue(3, $type);
            $p_sql->bindValue(4, $id);
  
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    /*
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
    }*/
    
}
