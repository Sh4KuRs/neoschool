<?php
 if(isset($_POST["employee_id"]))  
 { 
    require_once '../class/control_aluno.php';
    require_once '../class/control_disciplinas.php';
    require_once '../class/control_professor.php';
    require_once '../class/control_turmas.php';
    $but = $_POST['employee_id'];
    $AlunoDTO = new control_aluno();
    $DiscplinaDTO = new control_disciplinas();
    $ProfessorDTO = new control_professor();
    $turmaDTO = new control_turmas();
    $dadosalunos = $AlunoDTO->BuscarPorCODTurma($but);
 }
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Informações</a></li>
        <li><a href="#tab_2" data-toggle="tab">Professores</a></li>
        <li><a href="#tab_3" data-toggle="tab">Alunos</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Opções<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Editar</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Desativar</a></li>
            </ul>
        </li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <table id="alunos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Etapa</th>
                        <th>Turno</th>
                        <th>Data Inicio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $turma = $turmaDTO ->BuscarTurmaCOD($but); ?>
                        <tr>
                            <td width="15"> <?php echo $turma["Nome"]; ?></td>
                            <td> <?php echo $turma["Etapa"]; ?></td>
                            <td> <?php echo $turma["Turno"]; ?></td>
                            <td> <?php echo $turma["Data_Inicio"]; ?></td>
                        </tr>
                </tbody>
            </table>
            <table id="alunos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#Cod</th>
                        <th>Disciplina</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dis = $DiscplinaDTO ->BuscarDisCOD($but);
                    foreach ($dis as $exibe) {
                        ?>
                        <tr>
                            <td width="15"> <?php echo $exibe["Cod"]; ?></td>
                            <td> <?php echo $exibe["nomeDisciplina"]; ?></td>
                            <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["Matricula"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button>  <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='#' class='btn btn-danger btn-xs' name='Matricula' value=''><i class="fa  fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#Cod</th>
                        <th>Disciplina</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
           <table id="alunos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#Cod</th>
                        <th>Nome</th>
                        <th>Disciplina</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $prof = $ProfessorDTO->listProfessorDisc($but);
                    foreach ($prof as $exibe) {
                        ?>
                        <tr>
                            <td width="15"> <?php echo $exibe["ID"]; ?></td>
                            <td> <?php echo $exibe["Nome"]; ?></td>
                            <td> <?php echo $exibe["nomeDis"]; ?></td>
                            <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["Matricula"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button>  <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='#' class='btn btn-danger btn-xs' name='Matricula' value=''><i class="fa  fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#Cod</th>
                        <th>Nome</th>
                        <th>Disciplina</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <table id="alunos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#Cod</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($dadosalunos as $exibe) {
                        ?>
                        <tr>
                            <td> <?php echo $exibe["Matricula"]; ?></td>
                            <td> <?php echo $exibe["Nome"]; ?></td>
                            <td> <?php echo $exibe["Sexo"]; ?></td>
                            <td> <?php echo $exibe["DataNascimento"]; ?></td>
                            <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["Matricula"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#Cod</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">Remover Professor
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja remover o professor selecionado desta turma ?
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger text-white" id="dataComfirmOK">Remover</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function(){  
     $('#alunos tbody').on('click', '.view_data', function () {
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/modalAlunosT.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#confirm-delete').modal("show");  
                }  
           });  
      });  
 });
  
 $(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
                    $('#modal-default').modal("show");
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});
</script>

