<?php
 if(isset($_POST["employee_id"]))  
 { 
    require_once '../class/control_aluno.php';
    require_once '../class/control_disciplinas.php';
    require_once '../class/control_professor.php';
    require_once '../controller/functions.php';
    $but = $_POST['employee_id'];
    $DiscplinaDTO = new control_disciplinas();
    
    $ProfessorDTO = new control_professor();
    $dadosProf = $ProfessorDTO->buscarProfByID($but);
 }
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Informações</a></li>
        <li><a href="#tab_2" data-toggle="tab">Disciplinas</a></li>
        <li><a href="#tab_3" data-toggle="tab">Turmas</a></li>
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
            <table class="table table-responsive">
                <tr>
                    <td> <img class="img-bordered-sm" src="../dist/img/user.png" alt="Imagem de Usuário"></td>
                    <td colspan="2">
                        <h4><b><?php echo $dadosProf["Nome"]; echo $dadosProf["Status"] == "I" ? " - Cadastro Desativado" : ""?></b></h4>
                        <h5>Matricula: <?php echo $dadosProf["ID"]; ?></h5>
                        <h5>Data de Nascimento: <?php echo $dadosProf["DataNascimento"]; ?></h5>
                        <h5>Sexo: <?php echo $dadosProf["Sexo"]; ?></h5>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>CPF: <?php echo $dadosProf["CPF"]; ?></h5>
                        <h5>RG: <?php echo $dadosProf["RG"]; ?></h5>
                        <h5>Estado Civil: <?php echo getEstadoCivil($dadosProf["EstadoCivil"]); ?></h5
                    </td>
                    <td>
                        <h5>Telefone: <?php echo $dadosProf["Telefone"]; ?></h5>
                        <h5>E-Mail: <?php echo $dadosProf["Email"]; ?></h5>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
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
                    $profDis = $ProfessorDTO->listProfessorDiscById($but);
                    foreach ($profDis as $value) {
                        ?>
                        <tr>
                            <td style="width: 5px;"> <?php echo $value["IDd"]; ?></td>
                            <td> <?php echo $value["nomeDis"]; ?></td>
                            <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $value["ID"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button>  <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='#' class='btn btn-danger btn-xs' name='Matricula' value=''><i class="fa  fa-trash"></i></a></td>
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
        <div class="tab-pane" id="tab_3">
            <table id="alunos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#Cod</th>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $profDis = $ProfessorDTO->listProfessorTurmaById($but);
                    foreach ($profDis as $value) {
                        ?>
                        <tr>
                            <td style="width: 5px;"> <?php echo $value["turmaID"]; ?></td>
                            <td> <?php echo '',$value["Nome"],' - ',$value["Etapa"],'';?></td>
                            <td> <?php echo $value["Turno"]; ?></td>
                            <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $value["ID"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button>  <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='#' class='btn btn-danger btn-xs' name='Matricula' value=''><i class="fa  fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#Cod</th>
                        <th>Turma</th>
                        <th>Turno</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
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
                     $('#modal-default').modal("show");  
                }  
           });  
      });  
 });
</script>