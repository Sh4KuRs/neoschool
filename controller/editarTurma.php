 <!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<?php 
    if(isset($_POST["turma_id"])){
        require_once '../class/control_turmas.php';
        $turmaid = $_POST["turma_id"];
        $turmaConsulta = new control_turmas();
        $value = $turmaConsulta->BuscarTurmaCOD($turmaid);
    ?>
        <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title">Adicionar Turma</h2>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
            <form role="form" action="../controller/atualizarTurma.php" method="post">
                <div class="box-body">
                    <?php
                    if (isset($_SESSION["sucesseful"])) {
                        echo $_SESSION["sucesseful"];
                        unset($_SESSION["sucesseful"]);
                    }
                    ?>
                    <div class="row">
                        <div class="col-xs-2">
                            <input type="hidden" name="idturma" value="<?php echo $turmaid?>">
                            <label for="InputNome">Letra/N° de identificação</label>
                            <input type="text" name="inputNome" class="form-control" value="<?php echo $value["Nome"]?>">
                        </div>

                        <div class="col-xs-3">
                            <label for="inputEtapa">Etapa/Ano</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-book"></i></span>
                                <select class="form-control select2" style="width: 100%;" name="inputEtapa">
                                    <option name="inputEtapa" value="<?php echo $value["Nome"]?>" selected><?php echo $value["Etapa"]?></option>
                                    <option name="inputEtapa" value="6° Ano Ensino Fundamental">6° Ano Ensino Fundamental</option>
                                    <option name="inputEtapa" value="7° Ano Ensino Fundamental">7° Ano Ensino Fundamental</option>
                                    <option name="inputEtapa" value="8° Ano Ensino Fundamental">8° Ano Ensino Fundamental</option>
                                    <option name="inputEtapa" value="9° Ano Ensino Fundamental">9° Ano Ensino Fundamental</option>
                                    <option name="inputEtapa" value="1° Ano Ensino Médio">1° Ano Ensino Médio</option>
                                    <option name="inputEtapa" value="2° Ano Ensino Médio">2° Ano Ensino Médio</option>
                                    <option name="inputEtapa" value="3° Ano Ensino Médio">3° Ano Ensino Médio</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-xs-2">
                            <label for="inputTurno">Turno</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-clock"></i></span>
                                <select class="form-control select2" style="width: 100%;" name="inputTurno">
                                    <option name="inputTurno" value="<?php echo $value["Turno"]?>" selected><?php echo $value["Turno"]?></option>
                                    <option name="inputTurno" value="Matutino">Matutino</option>
                                    <option name="inputTurno" value="Vespertino">Vespertino</option>
                                    <option name="inputTurno" value="Noturno">Noturno</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-xs-2">
                            <label for="inputNumeroA">Número Max. de Alunos</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <input type="text" name="inputNumeroA" class="form-control" value="<?php echo $value["QtdMax_Alunos"]?>" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Disciplinas</label>
                            <select class="form-control select2" name='inputDisciplina[]' multiple="multiple" data-placeholder="Selecione as Disciplinas"
                                    style="width: 100%;">
                                        <?php
                                        require_once '../class/control_disciplinas.php';

                                        $discConsulta = new control_disciplinas();
                                        $listDisc = $discConsulta->listarDisc();
                                        $listDiscT = $discConsulta->BuscarDisCOD($turmaid);

                                        foreach ($listDiscT as $exibe) { ?>
                                            <option name='inputDisciplina' value='<?php echo $exibe["ID"]; ?>' selected=""> <?php echo '', $exibe["nomeDisciplina"], ''; ?> </option>
                                        <?php } ?> 
                                           <?php  foreach ($listDisc as $exibe) { ?>
                                            <option name='inputDisciplinaADD' value='<?php echo $exibe["ID"]; ?>'> <?php echo '', $exibe["Nome"], ''; ?> </option>
                                        <?php } ?>   
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Atualizar Turma</button> <a class="btn btn-danger"><i class="fa  fa-trash" ></i> Cancelar</a>
                </div>
            </form>
    </div>
    <?php } ?>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    })
    $("a").click(function(){
    location.reload();
});
</script>