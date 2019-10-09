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
        Adicionar Avaliação
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Alunos</a></li>
        <li class="active">Avaliações</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-13">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Adicionar Avaliação</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../controller/adicionarNota.php" method="post">
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
                       <label for="inputData">Data da avaliação</label>
                       <div class="input-group date">
                                 <div class="input-group-addon">
                                     <i class="fa fa-calendar"></i>
                                 </div>
                           <input type="date" name="inputData" class="form-control pull-right" id="datepicker">
                       </div>   
                    </div>
                    <div class="col-xs-3">
                       <label for="inputDesc">Valor da Avaliação</label>
                       <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fas fa-sort-numeric-up"></i>
                            </div>
                           <input type="text" name="inputValor" class="form-control" data-inputmask="'mask': ['9.99', '9 99']" data-mask>
                        </div>
                    </div>
                    <div class="col-xs-4">
                       <label for="inputDesc">Descrição da avaliação</label>
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Adicionar Avaliação</button> <button type="submit" class="btn btn-danger" onclick=""><i class="fa  fa-trash"></i> Cancelar</button>
              </div>
          </form>
          </div>
          <!-- Table Turmas -->
       </div>
        <div class="row">
          <div class="col-xs-12">
              <!-- /.box-header -->
              <?php if(isset($_GET["id"])){ 
                    require_once '../class/control_nota.php';
                    require_once '../class/control_aluno.php';
                    $notas = new control_nota();
                    $notaID = $notas->selecionarNotaInfo($_GET["id"]);
              
              ?>
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Avaliação - <?php echo $notaID["descricao"]." ".date('d-m-Y',strtotime($notaID["data"]));?></h3>
                  </div>
                  
                  <!-- /.box-header -->
                  <form method="post" action="../controller/registrarNota.php">
                  <div class="box-body">
                        <table id="alunos" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px;">#Matricula</th>
                                <th>Nome</th>
                                <th><?php echo $notaID["descricao"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $listNotas = $notas->listNotas($notaID["disciplina_ID"], $notaID["data"], $notaID["turma_ID"]);
                                foreach ($listNotas as $exibe) {
                                    ?>
                                    <tr>
                                        <td style="width: 10%;"> 12019<?php echo $exibe["Matricula"]; ?><input type="hidden" name="infoNotaID" value="<?php echo $notaID["id"];?>"></td>
                                        <td style="width: 50%;"> <?php echo $exibe["Nome"]; ?></td>
                                        <td style="width: 100px;" ><input style=" width: 50px;" type="text" name="nota[<?php echo $exibe["Matricula"];?>]" class="form-control" data-inputmask="'mask': ['9.99', '9 99']" data-mask placeholder="0.00"></td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#Matricula</th>
                                <th>Nome</th>
                                <th><?php echo $notaID["descricao"]; ?></th>
                            </tr>
                        </tfoot>
                    </table>  
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Notas</button> <button type="submit" class="btn btn-danger"><i class="fa  fa-trash"></i> Cancelar</button>
                  </div>
                  </form>
              <!-- /.box-body -->
            </div>
            <?php } ?>
            <!-- /.box -->
          </div>
          <!-- /.col -->
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

</script>

<script>
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
 
 
</script>
</body>
</html>
