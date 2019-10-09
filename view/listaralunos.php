<!DOCTYPE html>
<?php session_start(); 
if(empty($_SESSION['Login'])){
    header('Location: ../index.php');
}?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Listar Alunos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link href="../js/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="dist/switchery.css" />
  <script src="dist/switchery.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    <?php 
     if($_SESSION["Perfil"] == "Professor") 
     {
        include_once "_include/menuProfessor.php";
     }
     if($_SESSION["Perfil"] == "Aluno"){
         include_once "_include/menuAluno.php";
     }
     if($_SESSION["Perfil"] == "Responsavel"){
         include_once "_include/menuAluno.php";
     }
     if($_SESSION["Perfil"] == "Administrador"){
         include_once "_include/menu.php";
     }?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Alunos
        <small>Alunos Registrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Alunos</a></li>
        <li class="active">Listar Alunos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
           
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Alunos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Alteração!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                    <table id="alunos" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#Mat.</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Data de Nascimento</th>
                                <th>Turma/Etapa</th>
                                <th>Turno</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../class/control_aluno.php';
                            require_once '../class/control_turmas.php';

                            $AlunosDTO = new control_aluno();
                            $TurmaDTO = new control_turmas();

                            $listAlunos = $AlunosDTO->ListarAluno();
                            $listTurmas = $TurmaDTO->ListarTurmas();

                                foreach ($listAlunos as $exibe) {
                                    ?>
                                    <tr>
                                        <td> 12019<?php echo $exibe["Matricula"]; ?></td>
                                        <td> <?php echo $exibe["NomeAluno"]; echo $exibe["Status"] == "I" ? " <i style='color:red' class='fas fa-user-slash'></i>" : "";?></td>
                                        <td> <?php echo $exibe["Sexo"]; ?></td>
                                        <td> <?php echo $exibe["DataNascimento"]; ?></td>
                                        <td> <?php echo $exibe["Nome"].'  '.$exibe["Etapa"]?></td>
                                        <td> <?php echo $exibe["Turno"]; ?></td>
                                        <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["Matricula"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button> <a  href="aluno.php?editar=<?php echo $exibe["Matricula"] ?>" class='btn btn-primary btn-xs' name='Matricula' value='<?php echo $exibe["Matricula"]?>'><i class="fa fa-edit"></i></a> <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='../controller/deletar.php?matricula=<?php echo $exibe["Matricula"];?>&nome=<?php echo $exibe["NomeAluno"];?>' class='btn btn-danger btn-xs' name='Matricula' value='<?php echo $exibe["Matricula"] ?>'><i class="fa  fa-trash"></i></a></td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#Mat</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Data de Nascimento</th>
                                <th>Turma/Etapa</th>
                                <th>Turno</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Perfil Aluno <small>(Informações Pessoais)</small></h4>

                                </div>
                                <div class="modal-body" id="employee_detail">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão - BETA</b> 0.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>  
 $(document).ready(function(){  
     $('#alunos tbody').on('click', '.view_data', function () {
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/modalAlunos.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#modal-default').modal("show");  
                }  
           });  
      });  
 });
 
 $(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-primary text-white">Excluir Aluno<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o aluno selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Excluir</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});
</script>

<script>
  $('#alunos').dataTable({                              
    "oLanguage":{
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}
 });  
</script>
</body>
</html>
