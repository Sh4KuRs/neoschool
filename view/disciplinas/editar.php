<?php 
    require_once '../class/control_disciplinas.php';
    $disciplinaControl = new control_disciplinas();
        
    $disciplinaIndex = $disciplinaControl->listarDiscById($_GET["editar"]);
?>

<form action="../controller/alterarDisciplina.php" method="post">
    <div class="col-xs-2">
        <label for="inputCagarH">Carga Horaria</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-sort-numeric-up"></i></span>
            <input type="text" name="inputCargaH" class="form-control" value="<?php echo $disciplinaIndex["cargaHoraria"];?>">
            <input type="hidden" name="ID" class="form-control" value="<?php echo $disciplinaIndex["ID"];?>">
        </div>
    </div>
    <div class="col-xs-4">
        <label for="inputNome">Nome da Disciplina</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-book"></i></span>
            <input type="text" name="inputNome" class="form-control" value="<?php echo $disciplinaIndex["Nome"];?>">
            <!-- /btn-group -->
            <div class="input-group-btn">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Alteração</button>
            </div>
        </div>
    </div>
</form>