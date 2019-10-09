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
  
  <link rel="stylesheet" href="../dist/switchery.css" />
  <script src="../dist/switchery.js"></script>

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
        Lista de Alunos
        <small>Alunos Registrados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Avaliações</a></li>
        <li class="active">Notas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Listar Avaliação</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="notas.php" method="get">
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
                </div>
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Buscar Frequencias</button> <button type="submit" class="btn btn-danger" onclick=""><i class="fa  fa-trash"></i> Cancelar</button>
              </div>
          </form>
          </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notas Adicionadas</h3>
                </div>
                <!-- /.box-header -->
                <?php if(isset($_GET["nota"])){?>
                <div class="box-body">
                    <form method="post" action="../controller/teste.php">
                    <table  class="table table-bordered table-striped">
                        <?php 
                            require_once '../class/control_aluno.php';
                            require_once '../class/control_turmas.php';
                            require_once '../class/control_nota.php';

                            $NotasDTO = new control_nota();
                            
                            $infoNota = $NotasDTO->selecionarNotaInfo($_GET["nota"]);    
                            $arrayNotas = $NotasDTO->listNotas($infoNota["disciplina_ID"], $infoNota["data"], $infoNota["turma_ID"]);
                        ?>
                        <thead>
                            <tr>
                                <th style="width: 100px;">#Matricula</th>
                                <th>Nome</th>
                                <th><?php echo $infoNota["descricao"];?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                foreach ($arrayNotas as $exibe) {
                                    ?>
                                    <tr>
                                        <td style="width: 5%;"> 12019<?php echo $exibe["Matricula"]; ?></td>
                                        <td style=" width: 50px;"> <?php echo $exibe["Nome"]; ?></td>
                                        <td style=" width: 100px;" ><input style=" width: 70px;" type="text" name="inputUsuario" value="<?php echo $exibe["nota"]; ?>" class="form-control" placeholder="0,00"></td>
                                    </tr>
                                    <?php } ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#Matricula</th>
                                <th>Nome</th>
                                <th><?php echo $infoNota["descricao"];?></th>
                            </tr>
                        </tfoot>
                    </table>        
                </form>
                </div>
                <div class="box-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Notas</button> <button type="button" onclick="Refresh();" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button>
                    </div>
                <?php } ?>
                <?php if(isset($_GET["inputTurma"]) && isset($_GET["inputDisc"])){ ?>
                <div class="box-body">
                    <form method="GET" action="notas.php">
                    <table id="alunos" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px;">#Cod</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Disciplina</th>
                                <th>Turma/Turno</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../class/control_nota.php';

                            $frequencia = new control_nota();
                            $frequenciaArray = $frequencia->listInfoNota($_GET["inputTurma"], $_GET["inputDisc"], $_SESSION['Enti_ID']);
                            
                            foreach ($frequenciaArray as $exibe){ ?>
                                <tr>
                                    <td style="width: 10px;"><?php echo $exibe["id"]; ?></td>
                                    <td> <?php echo $exibe["descricao"]; ?></td>
                                    <td> <?php echo date('d/m/Y',strtotime($exibe["data"]))?></td>
                                    <td> <?php echo $exibe["nomeDisc"]; ?></td>
                                    <td> <?php echo $exibe["nomeTurma"]." - ".$exibe["Etapa"]." - ".$exibe["Turno"]; ?></td>
                                        <td><button type='submit' name='nota' value='<?php echo $exibe["id"];?>' class='btn btn-success btn-xs'><i class="fa fa-eye"></i></button></td>
                                    </tr><?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 100px;">#Cod</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Disciplina</th>
                                <th>Turma/Turno</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                    </table>   
                </form>
                </div>
                <?php } ?>
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
