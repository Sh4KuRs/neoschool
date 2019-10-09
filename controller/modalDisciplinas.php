<?php
 if(isset($_POST["employee_id"]))  
 { 
    require_once '../class/control_disciplinas.php';
    $but = $_POST['employee_id'];
    $DiscplinaDTO = new control_disciplinas();
 }
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Informações</a></li>
        <li><a href="#tab_2" data-toggle="tab">Professores</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Opções<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../view/disciplinas.php?editar=<?php echo $but?>">Editar</a></li>
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
                        <th>#Cod</th>
                        <th>Turma/Etapa</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dis = $DiscplinaDTO ->listTurmasDisc($but);
                    foreach ($dis as $exibe) {
                        ?>
                        <tr>
                            
                            <td width="15"> <?php echo $exibe["ID"]; ?></td>
                            <td> <?php echo '',$exibe["Nome"],' - ',$exibe["Etapa"],' - ',$exibe["Turno"],''; ?></td>
                            <td width="70"><button type='button' id='<?php echo $exibe["ID"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button> <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='../controller/deletar.php?responsavel=true&ID=<?php echo $exibe["ID"];?>&nome=<?php echo $exibe["Nome"];?>' class='btn btn-danger btn-xs' ><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>#Cod</th>
                        <th>Turma/Etapa</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
            </table>
            <table>
            </table>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
           
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