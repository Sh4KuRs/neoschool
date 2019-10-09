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
  <title>Neo Escola | Salas Virtuais</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link href="../js/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
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
        Salas de Aula 
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Salas Virtuais</li>
      </ol>
    </section>
    
    <!-- Menu -->
    <section class="content">
        
    <div class="row">
          <!-- small box -->
          <?php 
                   require_once '../class/control_salavirtual.php';
                   require_once '../class/control_aluno.php';
                    
                    $profConsulta = new control_SalaVirtual();
                    $alunoDT0 = new control_aluno();
                    switch ($_SESSION["Perfil"]) {
                        case "Professor":
                            $listProf = $profConsulta->listarProfSalasVirtuaisById($_SESSION["Enti_ID"]);
                            break;
                        case "Aluno":
                            $turmaId = $alunoDT0->buscarAlunoByUserID($_SESSION["User_ID"]);
                            $listProf = $profConsulta->listarAlunosSalasVirtuaisById($turmaId["Turma_ID"]);
                            break;
                        case "Responsavel":
                            $turmaId = $alunoDT0->buscarAlunoByRespID($_SESSION["User_ID"]);
                            $listProf = $profConsulta->listarAlunosSalasVirtuaisById($turmaId["Turma_ID"]);
                            break;
                        case "Administrador":
                            $listProf = $profConsulta->listarSalasVirtuais();
                            break;
                    }
                    
                    foreach ($listProf as $exibe) {
                         $input = array("bg-blue", "bg-red", "bg-green", "bg-yellow","bg-blue", "bg-red", "bg-green", "bg-yellow");
                        $rand_keys = array_rand($input, 2);
                        $i = 0;
                        ?>
                    <div class="col-lg-3 col-xs-6">
                        
                    <div class="small-box <?php echo $input[$rand_keys[$i++]];?>">
                    <div class="inner">
                        
                        <h3><?php 
                        $exibe["nomeDis"]=explode(" -", $exibe["nomeDis"]);
                        echo $exibe["nomeDis"][0];
                        ?></h3>
                      <p>Turma: <?php echo $exibe["nomeTurma"]; ?> - <?php echo $exibe["Etapa"]; ?> <?php echo $exibe["Turno"]; ?> - Prof. <?php echo $exibe["nomeProf"]; ?></p>
                    </div>
                        <a href="sala.php?id=<?php echo $exibe["ID"]?>" class="small-box-footer">Ir para <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <?php }     
                  ?>
        <!-- ./col -->
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
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>  
</script>
</body>
</html>

