<?php
require_once '../database/connect.php';
require_once 'pais.php';

class control_pais{
    
    public static $instance;
 
    public function __construct() {
        //
    }
    

        public function inResponsavel(pais $pais, $userid) {
        try {
            $sql = "INSERT INTO responsavel (       
                Nome,
                Parentesco,
                CPF,
                RG,
                OrgaoExp,
                EstadoCivil,
                Sexo,
                DataNascimento,
                Telefone,
                Email,
                Usuario_ID) 
                VALUES (
                :Nome,
                :Parentesco,
                :CPF,
                :RG,
                :OrgaoExp,
                :EstadoCivil,
                :Sexo,
                :DataNascimento,
                :Telefone,
                :Email,
                :Usuario_ID)";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $pais->getNome());
            $p_sql->bindValue(":Parentesco", $pais->getParentesco());
            $p_sql->bindValue(":CPF", $pais->getCpf());
            $p_sql->bindValue(":RG", $pais->getRg());
            $p_sql->bindValue(":OrgaoExp", $pais->getOrgaoExp());
            $p_sql->bindValue(":EstadoCivil", $pais->getEstadoCivil());
            $p_sql->bindValue(":Sexo", $pais->getSexo());
            $p_sql->bindValue(":DataNascimento", $pais->getDataNascimento());
            $p_sql->bindValue(":Telefone", $pais->getTelefone());
            $p_sql->bindValue(":Email", $pais->getEmail());
            $p_sql->bindValue(":Usuario_ID", $userid);
             
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function UpdateResponsavelById(pais $pais, $id) {
        try {
            $sql = "UPDATE responsavel SET
                Nome = :Nome,
                Parentesco = :Parentesco,
                CPF = :CPF,
                RG = :RG,
                OrgaoExp = :OrgaoExp,
                EstadoCivil = :EstadoCivil,
                Sexo = :Sexo,
                DataNascimento = :DataNascimento,
                Telefone = :Telefone,
                Email = :Email,
                Status = :Status
                WHERE ID = :ID";
 
            $p_sql = Conexao::getInstance()->prepare($sql);
 
            $p_sql->bindValue(":Nome", $pais->getNome());
            $p_sql->bindValue(":Parentesco", $pais->getParentesco());
            $p_sql->bindValue(":CPF", $pais->getCpf());
            $p_sql->bindValue(":RG", $pais->getRg());
            $p_sql->bindValue(":OrgaoExp", $pais->getOrgaoExp());
            $p_sql->bindValue(":EstadoCivil", $pais->getEstadoCivil());
            $p_sql->bindValue(":Sexo", $pais->getSexo());
            $p_sql->bindValue(":DataNascimento", $pais->getDataNascimento());
            $p_sql->bindValue(":Telefone", $pais->getTelefone());
            $p_sql->bindValue(":Email", $pais->getEmail());
            $p_sql->bindValue(":Status", $pais->getStatus());
            $p_sql->bindValue(":ID", $id);
             
            $p_sql->execute();
            return Conexao::getInstance()->lastInsertId();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function ListarResponsaveis() {
        try {
            $sql = "SELECT * FROM responsavel";
            
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $turmas;
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function RetornarID($cod) {
        try {
            $sql = "SELECT * FROM responsaveis WHERE CPF = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
    public function BuscarPorCODResp($cod) {
        try {
            $sql = "SELECT r.*, u.Login, u.Senha FROM responsavel as r "
                    . "INNER JOIN usuario AS u ON u.ID = r.Usuario_ID WHERE r.ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    public function BuscarPorCODAluno($cod) {
        try {
            $sql = "SELECT * FROM aluno WHERE Responsavel_ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    public function buscarRespByUserId($cod) {
        try {
            $sql = "SELECT * FROM responsavel WHERE Usuario_ID = :cod";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":cod", $cod);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
    
     public function deleteRespByCod($cod) {
        try {
            $sql = "DELETE R, U FROM responsavel AS R INNER JOIN usuario AS U ON R.Usuario_ID = U.ID WHERE R.ID=?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function countPais() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM responsavel";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
}
