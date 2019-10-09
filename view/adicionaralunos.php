<!DOCTYPE html>
<?php 
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Cadastrar Aluno</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
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
    <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
      #upload_file{width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;}
  </style>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Perfil Aluno <small>(Informações Pessoais)</small></h4>

                </div>
                <div class="modal-body">
                    <p id="ide">
                        
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Editar Aluno</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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
        Adicionar Aluno
        <small>Cadastro</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Alunos</a></li>
        <li class="active">Cadastrar Aluno</li>
      </ol>
    </section>
    
    <!-- Menu -->
    <form id="alunos" action="../controller/cadastrarAluno2.php" method="post">
    <section class="content">
        
       <div class="col-md-13">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Dados Pessoais</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
    
            <div class="box-body">
                 <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                <div class="row">
                    <div class="col-xs-2">
                        <div id="image-holder">
                            <img class="img-responsive img-thumbnail img-bordered" src="../dist/img/user.png" alt="Imagem de Usuário"><br>
                        </div>
                        <input type="file" id="upload_file" name="upload_file" />
                        <label style=" padding-left: 17px; padding-right: 17px; position: absolute;top: 135px;left: 15px;" id="upload_btn" class="btn-sm btn-vk" for="upload_file">Enviar foto do aluno</label>
                    </div>
                    
                    <div class="col-xs-2">
                      <label for="InputMatricula">N° Matricula</label>
                      <input type="text" name="inputMatricula" class="form-control" placeholder="Matricula">
                    </div>
                    
                    <div class="col-xs-6">
                        <label for="inputNome">Nome Completo</label>
                        <input type="text" name="inputNome" class="form-control" placeholder="Nome completo">
                    </div>
                    <div class="col-xs-2">
                       <label for="inputDataN">Data de Nascimento</label>
                       <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                           <input type="text" name="inputDataN" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <label for="inputSexo">Sexo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputSexo">
                                <option name="inputSexo" value="Feminino">Feminino</option>
                                <option name="inputSexo" value="Masculino">Masculino</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-3">
                        <label for="inputEmail">Endereço de e-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="inputEmail" >
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputDataR">Data de registro</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="inputDataR" >
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputTelefone" >Telefone</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" name="inputTelefone" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                        </div>
                    </div>
                        
                    <div class="col-xs-2">
                        <label for="inputCpf" >CPF</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-id-card-o"></i>
                          </div>
                          <input type="text" name="inputCPF" class="form-control" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <label for="inputTurma">Turma</label>
                            <select class="form-control select2" style="width: 100%;" name="inputTurma">
                                <?php 
                                require_once '../class/control_turmas.php';

                                 $turmaConsulta = new control_turmas();

                                 $listTurmas = $turmaConsulta->ListarTurmas();

                                 foreach ($listTurmas as $exibe) {
                                     echo "<option name='inputTurma' value='{$exibe["ID"]}' >",$exibe["Etapa"]," ",$exibe["Nome"]," - ",$exibe["Turno"],"</option>";
                                 }     
                                ?>    
                            </select>
                    </div>    
                </div>
            </div>
                  
          <!-- /.box -->
          <!-- Form Responsaveis -->
            <div class="box-header with-border">
              <h3 class="box-title">Dados Responsaveis</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div id="employee_detail">
                        <div class="col-xs-4">
                            <label for="inputResponsavel">* Selecionar Responsavel</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%;" name="inputResponsavel">
                                        <option name='inputResponsavel' value='Não Informado' >Informe o Responsavel</option>
                                        <?php 
                                        require_once '../class/control_pais.php';

                                         $RespConsulta = new control_pais();

                                         $respArray = $RespConsulta->ListarResponsaveis();

                                         foreach ($respArray as $exibe) { ?>
                                            <option name='inputResponsavel' value='<?php echo $exibe["ID"]; ?>' > <?php echo '',$exibe["Nome"],' - ',$exibe["CPF"],'';?> </option>
                                         <?php }     
                                        ?>    
                                </select>
                                <div class="input-group-btn">
                                  <a type="button" class="btn btn-danger ft_edit"><i class="fas fa-plus"></i> Responsavel</a>
                                </div>
                            </div>    
                        </div>
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
                        <small>Use o e-mail do aluno para o usuario de acesso.</small>
                    </div>
                    <div class="col-xs-4">
                        <div class="checkbox icheck">
                            <label>
                              <input type="checkbox"> Exigir mudança de senha<br>
                              <small>Para segurança extra, isso exige que o aluno confirme seu e-mail ou número de telefone ao redefinir sua senha. <a>Saber mais.</a></small>
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"  > <i class="fa fa-edit"></i> Cadastrar Aluno</button>   <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick=""></i> Cancelar</button>
                </div>
          </div>
       </div>
    </section>
</form>
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
<!-- All Scripts -->
<script src="../js/gerarSenha.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
  
  $("#upload_file").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#image-holder");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "img-thumbnail img-bordered",
                "style": "height: 150px; width: 140px;",
                
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }
});
$(document).ready(function(){  
      $('.ft_edit').click(function(){  
           $.ajax({  
                url:"divs/addResponsavel.php",  
                method:"post",  
                success:function(data){  
                     $('#employee_detail').html(data);  
                }  
           });  
      });  
 });
  (function($) {
  $('#modal-default').on('show.bs.modal', function() {
    var nome = $("#inputNome").val();
    $( '#ide' ).text( nome );
  });
  }(jQuery));

</script>   
</body>
</html>

