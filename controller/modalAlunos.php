<?php
 if(isset($_POST["employee_id"]))  
 { 
    require_once '../class/control_aluno.php';
    require_once '../class/control_turmas.php';
    require_once '../class/control_pais.php';
    require_once '../controller/functions.php';
    $but = $_POST['employee_id'];

    $AlunosDTO = new control_aluno();
    $dadosaluno = $AlunosDTO->buscarPorCod($but);
 }
?>

<table class="table table-responsive">
    <tr>
        <td> <img class="img-bordered-sm" style="width: 170px; height: 160px;" src="../img/Alunos/<?php echo $dadosaluno["Foto"];?>" alt="Imagem de Usuário"></td>
        <td colspan="2">
            <h4><b><?php echo $dadosaluno["NomeAluno"]."</b> - "; echo $dadosaluno["Status"] == "I" ? "Cadastro Desativado" : ""; ?></h4>
            <h5>Matricula: 12019<?php echo $dadosaluno["Matricula"]; ?></h5>
            <h5>Turma/Ano: <?php
                echo "<b>",$dadosaluno["Nome"], " </b>- ", $dadosaluno["Etapa"]," - ",$dadosaluno["Turno"],"";
                ?></h5>
            <h5>Data de Nascimento: <?php echo $dadosaluno["DataNascimento"]; ?></h5>
            <h5>Sexo: <?php echo $dadosaluno["Sexo"]; ?></h5>
        </td>
    </tr>
    <tr>
        <td>
            <h5>CPF: <?php echo $dadosaluno["CPF"]; ?></h5>
            <h5>RG: <?php echo $dadosaluno["RG"]; ?></h5>
            <h5>Estado Civil: <?php echo getEstadoCivil($dadosaluno["EstadoCivil"]); ?></h5>
        </td>
        <td>
            <h5>Data de Matricula: <?php echo $dadosaluno["DataRegistro"]; ?></h5>
            <h5>Telefone: <?php echo $dadosaluno["Telefone"]; ?></h5>
            <h5>E-Mail: <?php echo $dadosaluno["Login"]; ?></h5>
        </td>
    </tr>
     <tr>
         <td colspan="2">Responsavel: <a><?php echo $dadosaluno["Responsavel"];?></a></td>
        <td>Contato:<a> <?php echo $dadosaluno["telResponsavel"];?></a></td>
    </tr>

</table>