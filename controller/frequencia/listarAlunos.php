<table id="alunos" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 100px;">#Matricula</th>
            <th>Nome</th>
            <th>Falta</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once '../class/control_frequencia.php';

        $frequencia = new control_frequencia();
        $frequenciaArray = $frequencia->listFrequencia();
        $qtd = $frequencia->contarFaltas();

        foreach ($frequenciaArray as $exibe) {
            ?>
            <tr>
                <td style="width: 10px;"> 12019<?php echo $exibe["Matricula"]; ?></td>
                <td> <?php echo $exibe["Nome"]; ?></td>
                <td> <?php echo $qtd["Qtd"]; ?></td>
                <td>
                    <select>
                        <?php if ($exibe["falta1"] == "F") { ?>
                            <option ><?php echo $exibe["falta1"]; ?></option>
                            <option >P</option>
                            <option >FJ</option>
                        <?php } elseif ($exibe["falta1"] == "FJ") { ?>
                            <option >FJ</option>
                            <option >P</option>
                            <option >F</option><?php } else {
                    ?>
                            <option >P</option>
                            <option >F</option>
                            <option >FJ</option><?php }
                ?>
                    </select>
                    <select><?php if ($exibe["falta2"] == "F") { ?>
                            <option ><?php echo $exibe["falta2"]; ?></option>
                            <option >P</option>
                            <option >FJ</option>
                        <?php } elseif ($exibe["falta2"] == "FJ") { ?>
                            <option >FJ</option>
                            <option >P</option>
                            <option >F</option><?php } else {
                    ?>
                            <option >P</option>
                            <option >F</option>
                            <option >FJ</option><?php }
                ?>
                    </select>
                </td>
            </tr><?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>#Matricula</th>
            <th>Nome</th>
            <th>Falta</th>
            <th>Ação</th>
        </tr>
    </tfoot>
</table>