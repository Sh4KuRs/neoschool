<!DOCTYPE html>
<?php 
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Ambiente Virtual</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="../js/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
   <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Ambiente Virtual
        <small>Cadastro</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Turmas</li>
        <li class="active">Adicionar Ambiente Virtual</li>
      </ol>
    </section>
    
    <!-- Menu -->
    <section class="content">
        
       <div class="col-md-13">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Adicionar Ambiente Virtual</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../controller/adicionarSalavirtual.php" method="post">
            <div class="box-body">
                 <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                <div class="row">
                    
                    <div class="col-md-3">
                      <label>*Selecione Disciplinas</label>
                      <select class="form-control select2" name='inputDisciplina' data-placeholder="Selecione as disciplinas"
                              style="width: 100%;">
                            <?php 
                            require_once '../class/control_disciplinas.php';
                    
                            $discConsulta = new control_disciplinas();

                            $listDisc = $discConsulta->listarDisc();

                            foreach ($listDisc as $exibe) {?>
                            <option name='inputDisciplina' value='<?php echo $exibe["ID"]; ?>' > <?php echo '',$exibe["Nome"],'';?> </option>
                            <?php }     
                            ?>    
                        </select>
                     </div>
                    <div class="col-md-3">
                      <label>*Selecione Turmas</label>
                      <select class="form-control select2" name='inputTurma' data-placeholder="Selecione as turmas"
                              style="width: 100%;">
                            <?php 
                            require_once '../class/control_turmas.php';
                    
                            $turmaConsulta = new control_turmas();

                            $listTurmas = $turmaConsulta->ListarTurmas();

                            foreach ($listTurmas as $exibe) {?>
                                <option name='inputTurma' value='<?php echo $exibe["ID"]; ?>' > <?php echo '',$exibe["Nome"],' - ',$exibe["Etapa"],' - ',$exibe["Turno"],'';?> </option>
                            <?php }     
                            ?>    
                        </select>
                     </div>
                    <div class="col-md-3">
                      <label>*Selecione Professor Responsavel</label>
                      <select class="form-control select2" name='inputProfessor' data-placeholder="Selecione as disciplinas"
                              style="width: 100%;">
                            <?php 
                            require_once '../class/control_professor.php';
                    
                            $ProfConsulta = new control_professor();

                            $profArray = $ProfConsulta->listarProfessores();

                            foreach ($profArray as $exibe) {?>
                            <option name='inputProfessor' value='<?php echo $exibe["ID"]; ?>' > <?php echo '#Cod. ',$exibe["ID"],' - ',$exibe["Nome"],'';?> </option>
                            <?php }     
                            ?>    
                        </select>
                     </div>
                </div>
                
            </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Adicionar Sala Virtual</button> <button type="button" class="btn btn-danger"><i class="fa  fa-trash" onclick="<?php header('Location:../view/adicionarprofessor.php'); ?>"></i> Cancelar</button>
              </div>
          </form>
          </div>
          <!-- Table Turmas -->
       </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Salas Virtuais</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="turmas" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Turma</th>
                  <th>Professor Responsavel</th>
                  <th>Disciplina</th>
                  <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                   require_once '../class/control_salavirtual.php';
                    
                    $profConsulta = new control_SalaVirtual();
                    
                    $listProf = $profConsulta->listarSalasVirtuais();
                    
                    foreach ($listProf as $exibe) {?>
                    <tr>
                        <td><?php echo $exibe["ID"]; ?></td>
                        <td><?php echo $exibe["nomeTurma"]; ?> - <?php echo $exibe["Etapa"];?> - <?php echo $exibe["Turno"]; ?></td>
                        <td><?php echo $exibe["nomeProf"]; ?></td>
                        <td><?php echo $exibe["nomeDis"]; ?></td>
                        <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["ID"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button> <a  href="../controller/deletarAluno.php?=<?php echo $exibe["Matricula"] ?>" data-confirm='Tem certeza de que deseja excluir o item selecionado?' class='btn btn-primary btn-xs test' name='Matricula' value='<?php echo $exibe["Matricula"] ?>'><i class="fa fa-edit"></i></a> <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='../controller/deletar.php?professor=true&ID=<?php echo $exibe["ID"];?>&nome=<?php echo $exibe["Nome"];?>' class='btn btn-danger btn-xs' ><i class="fa  fa-trash"></i></a></td>
                    </tr>
                    <?php }     
                  ?>    
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Turma</th>
                  <th>Professor Responsavel </th>
                  <th>Disciplina</th>
                  <th>Ação</th>
                </tr>
                </tfoot>
              </table>
                <div class="modal fade" id="modal-professor">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Professor <small>(Vizualisar Informações)</small></h4>

                                </div>
                                <div class="modal-body" id="employee_detail">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary">Editar Professor</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                </div>
            <!-- /.box-body -->
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php include_once "_include/footer.php"; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- All Scripts -->
<script src="../js/gerarSenha.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
 
 $(document).ready(function(){  
     $('#turmas tbody').on('click', '.view_data', function () {
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/modalProfessor.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#modal-professor').modal("show");  
                }  
           });  
      });  
 });
 
 $(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-primary text-white">Excluir Professor(a)<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o professor(a) selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Excluir</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});
</script>
<script>

 $('#turmas').dataTable({                              
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

