<!DOCTYPE html>
<?php 
session_start();
if(empty($_SESSION['Login'])){
    header('Location: ../index.php');
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Pais e Responsaveis</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Sweet Alert -->
  <script src="../dist/sweetalert/sweetalert2.min.js" type="text/javascript"></script>
  <link href="../dist/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css"/>
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
        Pais e Responsaveis
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pais e Responsaveis</li>
      </ol>
    </section>
    
    <!-- Menu -->
    <section class="content">
        
       <div class="col-md-13">
          <!-- general form elements -->
          <?php if(isset($_GET["editar"])){
                require_once 'responsavel/editar.php'; 
            }else{ ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Adicionar Responsavel</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../controller/adicionarResponsavel.php" method="post">
            <div class="box-body">
                 <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                    <?php if(isset($_GET["alteracao"])){?>
                    <script>
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Cadastro Alterado com sucesso',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>
                <?php } ?>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="inputParentesco">Grau de Parentesco</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-heart"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputParentesco">
                                <option name="inputParentesco" value="Pai">Pai</option>
                                <option name="inputParentesco" value="Mae">Mãe</option>
                                <option name="inputParentescoo" value="Avos">Avós</option>
                                <option name="inputParentesco" value="Irmao">Irmãos</option>
                                <option name="inputParentesco" value="Tio">Tio(a)</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-4">
                        <label for="inputNomeResp">Nome Completo</label>
                        <input type="text" class="form-control" placeholder="Nome completo" name="inputNomeResp">
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputCPFResp">CPF:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="far fa-id-card"></i>
                            </div>
                            <input type="text" name="inputCPFResp" class="form-control"  placeholder="000.000.000-00" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask>
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputRG">RG:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="far fa-id-card"></i>
                            </div>
                            <input type="text" name="inputRG" class="form-control" placeholder="0.000.000" data-inputmask="'mask': ['9.999.999', '9 999 999']" data-mask>
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputOrgaoExp">Orgão Expeditor</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-landmark"></i></span>
                            <select class="form-control" style="width: 100%;" name="inputOrgaoExp">
                                <option value="1">SSP - Secretaria de Segurança Pública</option>
                                <option value="2">PM - Polícia Militar</option>
                                <option value="3">PC - Policia Civil</option>
                                <option value="4">CNT - Carteira Nacional de Habilitação</option>
                                <option value="5">DIC - Diretoria de Identificação Civil</option>
                                <option value="6">CTPS - Carteira de Trabaho e Previdência Social</option>
                                <option value="7">FGTS - Fundo de Garantia do Tempo de Serviço</option>
                                <option value="8">IFP - Instituto Félix Pacheco</option>
                                <option value="9">IPF - Instituto Pereira Faustino</option>
                                <option value="10">IML - Instituto Médico-Legal</option>
                                <option value="11">MTE - Ministério do Trabalho e Emprego</option>
                                <option value="12">MMA - Ministério da Marinha</option>
                                <option value="13">MAE - Ministério da Aeronáutica</option>
                                <option value="14">MEX - Ministério do Exército</option>
                                <option value="15">POF - Polícia Federal</option>
                                <option value="16">POM - Polícia Militar</option>
                                <option value="17">SES - Carteira de Estrangeiro</option>
                                <option value="18">SJS - Secretaria da Justiça e Segurança</option>
                                <option value="19">SJTS - Secretaria da Justiça do Trabalho e Segurança</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputEstadoCivil">Estado Civil</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control" style="width: 100%;" name="inputEstadoCivil">
                                <option >Não declarado</option>
                                <option value="1">Solteiro(a)</option>
                                <option value="2">Casado(a)</option>
                                <option value="3">Separado(a)</option>
                                <option value="4">Divociado(a)</option>
                                <option value="5">Viúvo(a)</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputSexo">Sexo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control select" style="width: 100%;" name="inputSexo">
                                <option name="inputSexo" value="Feminino">Feminino</option>
                                <option name="inputSexo" value="Masculino">Masculino</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputDataNResp">Data de Nascimento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="inputDataNResp" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label>Telefone</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="inputTelefoneResp" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                        </div>
                    </div>
                    
                </div>
                    <div class="box-header with-border">
              <h3 class="box-title">Configurações da conta do usuário</h3>
           </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="inputUsuario">Usuário de Acesso</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="inputUsuario" class="form-control" placeholder="Usuário de Acesso">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <label for="inputSenha">Senha de Acesso</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="inputSenha" id="inputSenha" class="form-control" placeholder="Senha de Acesso">
                            <!-- /btn-group -->
                            <div class="input-group-btn">
                              <a type="button" class="btn btn-danger" onclick="javascript:gerarSenha()">Gerar senha</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <small>Use o e-mail do responsavel para o usuario de acesso.</small>
                    </div>
                    <div class="col-xs-4">
                        <div class="checkbox icheck">
                            <label>
                              <input type="checkbox"> Exigir mudança de senha<br>
                              <small>Para segurança extra, isso exige que o responsavel confirme seu e-mail ou número de telefone ao redefinir sua senha. <a>Saber mais.</a></small>
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"  > <i class="fa fa-edit"></i> Cadastrar Responsavel</button>   <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick=""></i> Cancelar</button>
                </div>
          </div>
            </div>
            </form>
          </div>
          <?php } ?>
          <!-- Table Turmas -->
       </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Pais/Responsaveis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="turmas" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Parentesco</th>
                  <th>CPF</th>
                  <th>Data de Nascimento</th>
                  <th>Telefone</th>
                  <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                   require_once '../class/control_pais.php';
                    
                    $RespConsulta = new control_pais();
                    
                    $listResp = $RespConsulta->ListarResponsaveis();
                    
                    foreach ($listResp as $exibe) {?>
                    <tr>
                        <td><?php echo $exibe["ID"]; ?></td>
                        <td><?php echo $exibe["Nome"]; echo $exibe["Status"] == "I" ? " <i style='color:red' class='fas fa-user-slash'></i>" : "";?> </td>
                        <td><?php echo $exibe["Parentesco"]; ?></td>
                        <td><?php echo $exibe["CPF"]; ?></td>
                        <td><?php echo $exibe["DataNascimento"]; ?></td>
                        <td><?php echo $exibe["Telefone"]; ?></td>
                        <td><button type='button' name='Matricula' value='Matricula' id='<?php echo $exibe["ID"] ?>' class='btn btn-success btn-xs view_data'><i class="fa fa-eye"></i></button> <a  href="adicionarpais.php?editar=<?php echo $exibe["ID"] ?>" class='btn btn-primary btn-xs'><i class="fa fa-edit"></i></a> <a data-confirm='Tem certeza de que deseja excluir o item selecionado?' href='../controller/deletar.php?responsavel=true&ID=<?php echo $exibe["ID"];?>&nome=<?php echo $exibe["Nome"];?>' class='btn btn-danger btn-xs' ><i class="fa  fa-trash"></i></a></td>
                    </tr>
                    <?php }     
                  ?>    
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Parentesco</th>
                  <th>CPF</th>
                  <th>Data de Nascimento</th>
                  <th>Telefone</th>
                  <th>Ação</th>
                </tr>
                </tfoot>
              </table>
                <div class="modal fade" id="modal-responsanvel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Responsavel <small>(Vizualisar Informações)</small></h4>
                                </div>
                                <div class="modal-body" id="employee_detail">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
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
<!-- All Scripts -->
<script src="../js/gerarSenha.js"></script>
<!-- Page script -->
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
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
                url:"../controller/modalResponsavel.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#modal-responsanvel').modal("show");  
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

