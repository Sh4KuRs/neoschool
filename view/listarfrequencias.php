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
  <title>Neo Escola | Frquencia Alunos</title>
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
        Frequencias
        <small>Frequencias Registradas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Frequencia</a></li>
        <li class="active">Registro de Frequencias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-13">
          <!-- general form elements -->
          <?php if(isset($_GET["sucesso"])){?>
                <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='fas fa-exclamation'></i> Alteração Frequencia </h4> <?php echo $_GET["sucesso"];?></div>
          <?php } ?>
                <?php if(isset($_GET["Adicionado"])){?>
                <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='fas fa-exclamation'></i> Alteração Frequencia </h4> <?php echo $_GET["sucesso"];?></div>
          <?php } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title">Buscar Frequencias</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="listarfrequencias.php" method="GET">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <label for="inputEtapa">Turma/Turno</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-bookmark"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputTurma">
                                <?php 
                                    require_once '../class/control_professor.php';
                                    $professorDTO = new control_professor();
                                    $arrayProfessor = $professorDTO->listProfessorTurmaById($_SESSION["Enti_ID"]);
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
                                    $arrayProfessor = $professorDTO->listProfessorDiscById($_SESSION["Enti_ID"]);
                                    foreach($arrayProfessor as $value){?>
                                        <option name="inputDisc" value="<?php echo $value["IDd"];?>"><?php echo $value["nomeDis"];?></option>
                                   <?php } ?>
                            </select>
                        </div>    
                    </div>
                </div>
            </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-success"><i class="fas fa-search-plus"></i> Buscar Frequencias</button> <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button>
              </div>
          </form>
          </div>
          <!-- Table Turmas -->
       </div>
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Frequencias Adicionadas</h3>
                </div>
                <?php if(isset($_GET["frequencia"])){ ?>
                    <form method="post" action="../controller/alterarFalta.php">  
                <div class="box-body">
                    <table id="alunos" class="table table-bordered table-striped">
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
                            require_once '../class/control_frequencia.php';
                            require_once '../class/control_disciplinas.php';

                            $frequencia = new control_frequencia();
                            $frequenciaID = $frequencia->selecionarFrequenciaInfo($_GET["frequencia"]);
                            
                            $disciplina = $frequenciaID["Disciplina_ID"];
                            $data = $frequenciaID["data"];
                            $turma = $frequenciaID["turma_ID"];
                                    
                            $frequenciaArray = $frequencia->listFrequencia($disciplina, $data, $turma);
                            
                            foreach ($frequenciaArray as $exibe){
                                $falta = $frequencia->contarFaltas($exibe["Matricula"]);    
                                ?>
                                    <tr>
                                        <td style="width: 10px;"> 12019<?php echo $exibe["Matricula"]; ?></td>
                                        <td> <?php echo $exibe["Nome"]; ?></td>
                                        <td style="text-align: center;"> <?php echo $falta["qtd"]; ?></td>
                                        <td>
                                            <select name="inputFrequencia[<?php echo $exibe["idF"];?>]">
                                                <?php if($exibe["falta1"] == "F"){ ?>
                                                    <option value="<?php echo $exibe["falta1"];?>"><?php echo $exibe["falta1"];?></option>
                                                    <option value="P">P</option>
                                                    <option value="FJ">FJ</option>
                                                <?php } elseif($exibe["falta1"] == "FJ") {?>
                                                    <option value="FJ">FJ</option>
                                                    <option value="P">P</option>
                                                    <option value="F">F</option><?php
                                                }  else {?>
                                                    <option value="P">P</option>
                                                    <option value="F">F</option>
                                                    <option value="FJ">FJ</option><?php                                
                                                }?>
                                            </select>
                                            <select name="inputFrequencia1[<?php echo $exibe["idF"];?>]"><?php if($exibe["falta2"] == "F"){ ?>
                                                    <option value="F"><?php echo $exibe["falta2"];?></option>
                                                    <option value="P">P</option>
                                                    <option value="FJ">FJ</option>
                                                <?php } elseif($exibe["falta2"] == "FJ") {?>
                                                    <option value="FJ">FJ</option>
                                                    <option value="P">P</option>
                                                    <option value="F">F</option><?php
                                                }  else {?>
                                                    <option value="P">P</option>
                                                    <option value="F">F</option>
                                                    <option value="FJ">FJ</option><?php                                
                                                }?>
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
                    <?php } ?>
                    <?php if(isset($_GET["inputTurma"]) && isset($_GET["inputDisc"])){ ?>
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
                            require_once '../class/control_frequencia.php';

                            $frequencia = new control_frequencia();
                            $frequenciaArray = $frequencia->listInfoFrequencia($_GET["inputTurma"], $_GET["inputDisc"], $_SESSION['Enti_ID']);
                            
                            foreach ($frequenciaArray as $exibe){ ?>
                                <tr>
                                    <td style="width: 10px;"><?php echo $exibe["id"]; ?></td>
                                    <td> <?php echo $exibe["descricao"]; ?></td>
                                    <td> <?php echo date('d/m/Y',strtotime($exibe["data"]))?></td>
                                    <td> <?php echo $exibe["nomeDisc"]; ?></td>
                                    <td> <?php echo $exibe["nomeTurma"]." - ".$exibe["Etapa"]." - ".$exibe["Turno"]; ?></td>
                                    <form method="get" action="listarfrequencias.php">
                                        <td><button type='submit' name='frequencia' value='<?php echo $exibe["id"];?>' class='btn btn-success btn-xs'><i class="fa fa-eye"></i></button></td>
                                    </form>
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
                    <?php } 
                    else {
                        if(!isset($_GET["frequencia"])){ ?>
                            <h4>Nenhuma turma ou disciplina selecionada!</h4>
                    <?php } } ?>
                </div>
                <?php if(isset($_GET["frequencia"])){ ?>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Frequencia</button> <button type="button" onclick="Refresh();" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button>
                    </div>
                </form>   
                <?php  }  ?>
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
<!-- page script -->
<script>  
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
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
 
</script>

<script>
 
function Refresh(){
  window.location.reload();
}
 
 
$(document).ready(function(){  
      $('.text').click(function(){  
           var dados = $(this).closest('form').serialize();
        $.ajax({
            url:"../controller/frequencia/listarFrequencias.php",
            data: {
                dados: dados
            },
            dataType: "json",
            type: "POST",
            success: function (data) {
                
         }
        });
      });  
 });
</script>
</body>
</html>
