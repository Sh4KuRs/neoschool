<?php 
    
?>
<table id="alunos" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 100px;">#Cod</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Disciplina</th>
            <th>Turma/Turno</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../../class/control_frequencia.php';

        $frequencia = new control_frequencia();
        $frequenciaArray = $frequencia->listInfoFrequencia("16", "14", "9");
        
        foreach ($frequenciaArray as $exibe) {
            ?>
            <tr>
                <td style="width: 10px;"><?php echo $exibe["id"]; ?></td>
                <td> <?php echo $exibe["descricao"]; ?></td>
                <td> <?php echo date('d/m/Y', strtotime($exibe["data"])) ?></td>
                <td> <?php echo $exibe["nomeDisc"]; ?></td>
                <td> <?php echo $exibe["nomeTurma"] . " - " . $exibe["Etapa"] . " - " . $exibe["Turno"]; ?></td>
                <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["id"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button></td>
            </tr><?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="width: 100px;">#Cod</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Disciplina</th>
            <th>Turma/Turno</th>
            <th>Ação</th>
        </tr>
    </tfoot>
</table>