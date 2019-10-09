<?php 
    session_start();
    if(empty($_SESSION['Login'])){
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- Sweet Alert -->
  <script src="../dist/sweetalert/sweetalert2.min.js" type="text/javascript"></script>
  <link href="../dist/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css"/>
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
        Perfil de usuário
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Perfil de usuário</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">  
        <?php 
        $infPerfil = NULL;
        $infUsuario = NULL;
        
        switch ($_SESSION["Perfil"]) {
            case "Administrador":
                require_once '../class/control_user.php';
            break;
            case "Professor":
                require_once '../class/control_user.php';
                require_once '../class/control_professor.php';
                $professorControl = new control_professor();
                $infPerfil = $professorControl->buscarProfByID($_SESSION['Enti_ID']); 
                //
                $userControl = new control_user();
                $infUsuario = $userControl->findUserById($_SESSION["User_ID"]);
            break;
            case "Responsavel":
                require_once '../class/control_user.php';
                require_once '../class/control_pais.php';
                $responsavelControl = new control_pais();
                $infPerfil = $responsavelControl->BuscarPorCODResp($_SESSION["Enti_ID"]);
                //
                $userControl = new control_user();
                $infUsuario = $userControl->findUserById($_SESSION["User_ID"]);
            break;
            case "Aluno":
                require_once '../class/control_user.php';
                require_once '../class/control_aluno.php';
                $alunoControl = new control_aluno();
                $infPerfil = $alunoControl->buscarPorCod($_SESSION["Enti_ID"]);
                //
                $userControl = new control_user();
                $infUsuario = $userControl->findUserById($_SESSION["User_ID"]);
                
            break;
        }
        ?>
      <div class="row">
        <div class="col-md-3">
            <?php if(isset($_GET["alteracao"])){?>
                    <script>
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Informações Alteradas com sucesso',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>
                <?php } ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <?php switch ($_SESSION["Perfil"]) {
                    case "Administrador":
                        $caminho = "../img/Administrador/";
                    break;
                    case "Professor":
                         $caminho = "../img/Professor/";
                    break;
                    case "Responsavel":
                         $caminho = "../img/Responsavel/";
                    break;
                    case "Aluno":
                         $caminho = "../img/Alunos/";
                    break;
                }?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $caminho.$infPerfil["Foto"];?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $infPerfil["NomeAluno"];?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION["Perfil"];?></p>

              <ul class="list-group list-group-unbordered">
                <?php if($_SESSION["Perfil"] == "Aluno"){?>
                <li class="list-group-item">
                    <b>Matricula</b> <a class="pull-right">12019<?php echo $infPerfil["Matricula"];?></a>
                </li>
                <li class="list-group-item">
                  <b>Série</b> <a class="pull-right"><?php echo $infPerfil["Etapa"];?></a>
                </li>
                <li class="list-group-item">
                  <b>Turma</b> <a class="pull-right"><?php echo $infPerfil["Nome"];?></a>
                </li>
                <li class="list-group-item">
                  <b>Turno</b> <a class="pull-right"><?php echo $infPerfil["Turno"];?></a>
                </li>
                <?php }else{?>
              </ul>
              
              <strong><i class="fa fa-book margin-r-5"></i> Educação</strong>
              <p class="text-muted">
                UnB - Pedagogia, Portugues
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Localização</strong>
              <p class="text-muted">Ceilandia, Brasilia-DF</p>
              <hr>
              <strong><i class="fas fa-pencil-ruler margin-r-5"></i> Disciplinas</strong>
                <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Configurações</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="settings">
                  <?php switch ($_SESSION["Perfil"]) {
                    case "Administrador":
                        $form = "../controler";
                    break;
                    case "Professor":
                         $form = "../img/Professor/";
                    break;
                    case "Responsavel":
                         $form = "../img/Responsavel/";
                    break;
                    case "Aluno":
                         $form = "../img/Alunos/";
                    break;
                }?>
                  <form class="form-horizontal" action="../controller/alterarPerfil.php?id=<?php echo $_SESSION["Enti_ID"];?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nome</label>

                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="inputID" value="<?php echo $_SESSION["User_ID"];?>">
                        <input type="text" disabled="" class="form-control" name="inputNome" value="<?php echo $infPerfil["NomeAluno"];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="inputEmail" value="<?php echo $infPerfil["Login"];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Senha</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="inputSenha" placeholder="**********" value="<?php echo $infUsuario["Senha"];?>">
                    </div>
                  </div>
                    <?php if($_SESSION["Perfil"] == "Professor"):?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Educação</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputEducacao" placeholder="" value="<?php //echo $infUsuario["Senha"];?>">
                    </div>
                  </div>
                    <?php endif; ?>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Imagem de perfil</label>
                     <div class="col-sm-10">
                      <input type="file" class="form-control" name="inputFoto" placeholder="Skills">
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
 <?php require_once '_include/footer.php';?> 
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
<script>
  
</script>
</body>
</html>
