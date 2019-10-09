<?php
require_once '../database/connect.php';
require_once 'user.php';
require_once 'aluno.php';

class control_aluno{
    
    public static $instance;
 
    public function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance))
        {
            self::$instance = new control_aluno();
        }
        return self::$instance;
    }

    public function inAluno(aluno $usuario, $foto) {
        try {
            $sql = "INSERT INTO aluno(       
                Nome,
                Matricula,
                DataNascimento,
                Sexo,
                CPF,
                RG,
                OrgaoExp,
                EstadoCivil,
                Foto,
                Telefone,
                Email,
                DataRegistro,
                Turma_ID,
                Usuario_ID,
                Responsavel_ID) 
                VALUES (
                :Nome,
                :Matricula,
                :DataNascimento,
                :Sexo,
                :CPF,
                :RG,
                :OrgaoExpeditor,
                :EstadoCivil,
                :Foto,
                :Telefone,
                :Email,
                :DataRegistro,
                :Turma_ID,
                :Usuario_ID,
                :Responsavel_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $usuario->getNomeAluno());
            $p_sql->bindValue(":Matricula", $usuario->getMatricula());
            $p_sql->bindValue(":DataNascimento", $usuario->getDataNascimento());
            $p_sql->bindValue(":Sexo", $usuario->getSexo());
            $p_sql->bindValue(":CPF", $usuario->getCpf());
            $p_sql->bindValue(":RG", $usuario->getRg());
            $p_sql->bindValue(":OrgaoExpeditor", $usuario->getOrgaoExpeditor());
            $p_sql->bindValue(":EstadoCivil", $usuario->getEstadoCivil());
            $p_sql->bindValue(":Telefone", $usuario->getTelefoneAluno());
            $p_sql->bindValue(":Email", $usuario->getEmailAluno());
            $p_sql->bindValue(":DataRegistro", $usuario->getDataRegistro());
            $p_sql->bindValue(":Turma_ID", $usuario->getTuma());
            $p_sql->bindValue(":Usuario_ID", $usuario->getUser());
            $p_sql->bindValue(":Responsavel_ID", $usuario->getResponsavel());
            
            
            
            
            
            $p_sql->bindValue(":Foto", $foto);

            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
     public function ListarAluno() {
        try {
            $sql = "SELECT a.Matricula, a.Nome AS NomeAluno, a.DataNascimento, "
                 . "a.CPF,a.Sexo, a.Telefone, a.Status, a.turma_ID, u.Login, p.Nome, t.Nome, t.Etapa, t.Turno "
                 . "FROM aluno a "
                 . "INNER JOIN usuario u ON (a.Usuario_ID = u.ID) "
                 . "INNER JOIN perfil p ON (u.Perfil_ID = p.ID) "
                 . "INNER JOIN turma t ON (a.Turma_ID = t.ID) ORDER BY a.Nome ASC";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
   public function buscarPorCod($cod) {
        try {
            $sql = "SELECT a.Matricula, a.Nome AS NomeAluno ,a.DataNascimento, a.Foto, a.Status, "
                 . "a.CPF, a.Sexo, a.DataRegistro, a.Telefone, a.Turma_ID, a.EstadoCivil, a.RG, a.OrgaoExp, "
                  . "u.Login, p.Nome, t.Nome, t.Etapa, t.Turno, "
                 . "r.Nome AS Responsavel, r.Telefone AS telResponsavel, r.ID AS rID "
                 . "FROM aluno a "
                 . "INNER JOIN usuario u ON (a.Usuario_ID = u.ID) "
                 . "INNER JOIN responsavel r ON (a.Responsavel_ID = r.ID) "
                 . "INNER JOIN perfil p ON (u.Perfil_ID = p.ID) "
                 . "INNER JOIN turma t ON (a.Turma_ID = t.ID) WHERE a.Matricula = '$cod'";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetch(PDO::FETCH_ASSOC);
            return $alunos;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listarAlunosTurma($cod) {
        try {
            $sql = "SELECT a.Matricula, a.Nome AS NomeAluno ,a.DataNascimento, "
                 . "a.CPF,a.Sexo, a.DataRegistro, a.Telefone, a.Turma, u.Login, p.Perfil, t.Nome, t.Etapa, t.Turno, "
                 . "r.Nome AS Responsavel, r.Telefone AS telResponsavel "
                 . "FROM aluno a "
                 . "INNER JOIN usuario u ON (a.Usuario_ID = u.ID) "
                 . "INNER JOIN responsavel r ON (a.Responsavel_ID = r.ID) "
                 . "INNER JOIN perfil p ON (u.Perfil_ID = p.ID) "
                 . "INNER JOIN turma t ON (a.Turma_ID = t.ID) WHERE a.Turma = '$cod'";
   
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetch(PDO::FETCH_ASSOC);
            return $alunos;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
   
    public function BuscarPorCODTurma($cod) {
        try {
            $sql = "SELECT * FROM aluno WHERE Turma_ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function buscarAlunoByUserID($cod) {
        try {
            $sql = "SELECT * FROM aluno WHERE Usuario_ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function buscarAlunoByRespID($cod) {
        try {
            $sql = "SELECT * FROM aluno WHERE Responsavel_ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    
    
    public function deleteAlunoByCod($cod) {
        try {
            $sql = "DELETE A, U FROM aluno AS A INNER JOIN usuario AS U ON A.Usuario_ID = U.ID WHERE A.Matricula=?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function updateAluno(aluno $usuario, $foto) {
        try {
            $sql = "UPDATE aluno SET    
                Nome = :Nome,
                Matricula = :Matricula,
                DataNascimento = :DataNascimento,
                Sexo = :Sexo,
                CPF = :CPF,
                Telefone = :Telefone,
                Email = :Email,
                Foto = :Foto,
                Turma_ID = :Turma_ID,
                Status = :Status,
                Responsavel_ID = :Responsavel_ID WHERE Matricula = :ID";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $usuario->getNomeAluno());
            $p_sql->bindValue(":Matricula", $usuario->getMatricula());
            $p_sql->bindValue(":DataNascimento", $usuario->getDataNascimento());
            $p_sql->bindValue(":Sexo", $usuario->getSexo());
            $p_sql->bindValue(":CPF", $usuario->getCpf());
            $p_sql->bindValue(":Telefone", $usuario->getTelefoneAluno());
            $p_sql->bindValue(":Email", $usuario->getEmailAluno());
            $p_sql->bindValue(":Foto", $foto);
            $p_sql->bindValue(":Turma_ID", $usuario->getTuma());
            $p_sql->bindValue(":Status", $usuario->getStatus());
            $p_sql->bindValue(":Responsavel_ID", $usuario->getResponsavel());
            $p_sql->bindValue(":ID", $usuario->getMatricula());
            
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function UpdateFoto($foto, $id) {
        try {
            $sql = "UPDATE aluno SET Foto = :foto WHERE Matricula = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":foto", $foto);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function countAlunos() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM aluno";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    
}
