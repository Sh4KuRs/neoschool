<!DOCTYPE html>
<?php session_start(); ?>
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
      <section class="content-header">
      <h1>
        Perfil de Aluno
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perfil de Aluno</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
              <?php 
                require_once '../database/connect.php';
                require_once '../class/control_aluno.php';
                require_once '../class/control_turmas.php';    
                    
                    $alunocod = $_GET["Matricula"];
                    $AlunosDTO = new control_aluno();
                    $dadosaluno;
                    
                    $TurmaDTO = new control_turmas();
                    $listTurmas = $TurmaDTO->ListarTurmas();
                ?>
              <h3 class="profile-username text-center"><?php echo $dadosaluno["Nome"];?></h3>

              <p class="text-muted text-center">Aluno</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Matricula</b> <a class="pull-right"><?php echo $dadosaluno["Matricula"]?></a>
                </li>
                <li class="list-group-item">
                  <b>Turma / Série</b> <a class="pull-right"><?php 
                  foreach($listTurmas as $value){
                    if($value["Codigo"] == $dadosaluno["Turma"]){
                        echo $value["Nome"]," ",$value["Etapa"];
                    }
                  }?></a>
                </li>
                <li class="list-group-item">
                  <b>Turno</b> <a class="pull-right"><?php 
                  foreach($listTurmas as $value){
                    if($value["Codigo"] == $dadosaluno["Turma"]){
                        echo $value["Turno"];
                    }
                  }?></a>
                </li>
                
              </ul>

             <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Atividade</a></li>
              <li><a href="#timeline" data-toggle="tab">Linha do Tempo</a></li>
              <li><a href="#settings" data-toggle="tab">Configurações</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nome</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="<?php echo $_SESSION["pojo"]->getNome();?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $_SESSION["pojo"]->getEmail();?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Senha</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="**********">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Imagem de perfil</label>

                     <div class="col-sm-10">
                      <input type="file" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Alterar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
          
</body>
</html>
