<?php
 if(isset($_POST["employee_id"]))  
 { 
    require_once '../class/control_aluno.php';
    require_once '../class/control_turmas.php';
    require_once '../class/control_pais.php';
    require_once 'functions.php';
    $but = $_POST['employee_id'];
    
    $reponsavelDTO = new control_pais();
    $dadosaluno = $reponsavelDTO->BuscarPorCODResp($but);
    $reponsavel = $reponsavelDTO->BuscarPorCODAluno($but);
   
 }
?>

<table class="table table-responsive">
    <tr>
        <td> <img class="img-bordered-sm" src="../dist/img/user.png" alt="Imagem de Usuário"></td>
        <td colspan="2">
            <h4><b><?php echo $dadosaluno["Nome"];?></b></h4>
            <h5>Matricula: <?php echo $dadosaluno["ID"]; ?></h5>
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
            <h5>Parentesco: <?php echo $dadosaluno["Parentesco"]; ?></h5>
            <h5>Telefone: <?php echo $dadosaluno["Telefone"]; ?></h5>
            <h5>E-Mail: <?php echo $dadosaluno["Email"]; ?></h5>
        </td>
    </tr>
     <tr>
         <?php foreach($reponsavel as $value){?>
         <tr>
        <td colspan="2">Reponsavel por: <a><?php echo $value["Nome"];?></a></td>
        <td>Matricula:<a> <?php echo $value["Matricula"];?></a></td>
        <tr>
         <?php }?>
     </tr>
</table>