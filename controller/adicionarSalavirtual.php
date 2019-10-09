<?php

require_once '../class/control_professor.php';
require_once '../class/control_aluno.php';
require_once '../class/control_salavirtual.php';


$turma = $_POST["inputTurma"];
$disciplina = $_POST["inputDisciplina"];
$professor = $_POST["inputProfessor"];

            
try {
    $nome = "".$disciplina." - ".$turma." - Prof. ".$professor."";
    
    $salaDTO = new control_SalaVirtual();
    $salaDTO->inSalaVirtual($nome, $professor, $turma, $disciplina);

    $msg = "Sala Virtual <b>$nome</b> cadastrado(a) com sucesso!";
    
    echo "<script>";
        echo "window.location = '../view/adicionarsalavirtual.php?sucesso={$msg}';";
    echo "</script>";
        //}
    } catch (PDOException $e) {
       echo $e->getMessage();
    }
    