<!DOCTYPE html>
<?php session_start(); 
if(empty($_SESSION['Login'])){
    header('Location: ../index.php');
}
?>
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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <link rel="stylesheet" href="../dist/switchery.css" />
  <script src="../dist/switchery.js"></script>

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
        Adicionar Frequencia
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Alunos</a></li>
        <li class="active">Frequencia</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-13">
          <!-- general form elements -->
          <div id="edit-turma">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Adicionar Frequencia</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../controller/adicionarFrequencia.php" method="post">
            <div class="box-body">
                 <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                <div class="row">
                    <div class="col-xs-3">
                        <input type="hidden" name="inputProfessor" value="<?php echo $_SESSION["Enti_ID"];?>">
                        <label for="inputEtapa">Turma/Turno</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-book"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputTurma">
                                <?php 
                                    require_once '../class/control_professor.php';
                                    $professorDTO = new control_professor();
                                    $arrayProfessor = $professorDTO->listProfessorTurmaById($_SESSION['Enti_ID']);
                                    foreach($arrayProfessor as $value){?>
                                        <option name="inputTurma" value="<?php echo $value["turmaID"];?>"><?php echo $value["Nome"]." - ".$value["Etapa"]." - ".$value["Turno"];?></option>
                                   <?php } ?>
                            </select>
                        </div>    
                    </div>
                    <div class="col-xs-3">
                        <label for="inputDisc">Disciplina</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-book"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputDisc">
                                <?php 
                                    require_once '../class/control_professor.php';
                                    $professorDTO = new control_professor();
                                    $arrayProfessor = $professorDTO->listProfessorDiscById($_SESSION['Enti_ID']);
                                    foreach($arrayProfessor as $value){?>
                                        <option name="inputDisc" value="<?php echo $value["IDd"];?>"><?php echo $value["nomeDis"];?></option>
                                   <?php } ?>
                            </select>
                        </div>    
                    </div>
                    <div class="col-xs-3">
                       <label for="inputData">Data da frequencia</label>
                       <div class="input-group date">
                                 <div class="input-group-addon">
                                     <i class="fa fa-calendar"></i>
                                 </div>
                           <input type="date" name="inputData" class="form-control pull-right" id="datepicker">
                       </div>   
                    </div>
                    <div class="col-xs-3">
                       <label for="inputDesc">Descrição da aula</label>
                       <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-pen"></i>
                            </div>
                           <input type="text" name="inputDesc" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Adicionar Frequencia</button> <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick="<?php header('Location:../view/turmas.php'); ?>"></i> Cancelar</button>
              </div>
          </form>
          </div>
          </div>
          <!-- Table Turmas -->
       </div>
        <div id="employee_detail">  
        <div class="row">
          <div class="col-xs-12">
              <!-- /.box-header -->
              <?php if(isset($_GET["id"])){ 
                    require_once '../class/control_frequencia.php';
                    require_once '../class/control_aluno.php';
                    $frequencia = new control_frequencia();
                    $frequenciaID = $frequencia->selecionarFrequenciaInfo($_GET["id"]);
              
              ?>
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Frequencia - <?php echo date('d/m/Y',strtotime($frequenciaID["data"]));?></h3>
                  </div>
                  
                  <!-- /.box-header -->
                  <form method="post" action="../controller/registrarFalta.php">
                  <div class="box-body">
                      <table  class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th style="width: 100px;">#Matricula</th>
                                  <th>Nome</th>
                                  <th>Faltas</th>
                                  <th>Ação</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php

                              $frequenciaArray = $frequencia->listFrequencia($frequenciaID["Disciplina_ID"], $frequenciaID["data"], $frequenciaID["turma_ID"]);
                              
                              foreach ($frequenciaArray as $exibe){
                                  $falta = $frequencia->contarFaltas($exibe["Matricula"]);
                                      ?>
                                      <input type="hidden" name="inputFrequencia" value="<?php echo $_GET["id"];?>">
                                      <tr>
                                          <td style="width: 10px;"> 12019<?php echo $exibe["Matricula"]; ?></td>
                                          <td> <?php echo $exibe["Nome"]; ?></td>
                                          <td> <?php echo $falta["qtd"]; ?></td>
                                          <td>
                                              <select name="faltas1[<?php echo $exibe["Matricula"];?>]">
                                                    <option value="P">P</option>
                                                    <option value="F">F</option>
                                                    <option value="FJ">FJ</option>
                                              </select>
                                              <select name="faltas2[<?php echo $exibe["Matricula"];?>]">
                                                    <option value="P">P</option>
                                                    <option value="F">F</option>
                                                    <option value="FJ">FJ</option>
                                              </select>
                                          </td>
                              </tr><?php } ?>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th>#Matricula</th>
                                  <th>Nome</th>
                                  <th>Faltas</th>
                                  <th>Ação</th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Frequencia</button> <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick="<?php header('Location:../view/turmas.php'); ?>"></i> Cancelar</button>
                  </div>
                  </form>
              <!-- /.box-body -->
            </div>
            <?php } ?>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    </div>        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once '_include/footer.php';?>
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
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script>  
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    
    //Date picker
    
    $('#datepicker').datepicker({
      autoclose: true
    })

 $(document).ready(function(){  
     $('#alunos tbody').on('click', '.view_data', function () {
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/teste.php",  
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
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html, { size: 'small' });
});
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
 
  $(document).ready(function(){ 
     $('.view_data').click(function () {
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/teste.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);     
                }  
           });  
      });  
 });
</script>
</body>
</html>
