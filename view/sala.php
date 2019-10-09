<!DOCTYPE html>
<?php session_start(); 
if(empty($_SESSION['Login'])){
    header('Location: ../index.php');
}?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Sala Virtual</title>
 
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
 <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
        <?php 
            require_once '../class/control_salavirtual.php';
                    
            $salaConsulta = new control_SalaVirtual();
                    
            $listSala = $salaConsulta->listarSalasVirtuaisById($_GET["id"]);
            $listAlunos = $salaConsulta->listarAlunosSalasById($_GET["id"]);
            $listConteudo = $salaConsulta->listarConteudoSalasVirtuais($_GET["id"]);
        ?>
        
      <h1>
       <?php echo $listSala["nomeDis"]; ?> - <?php echo $listSala["Etapa"]; ?> <?php echo $listSala["Turno"]; ?> - Prof. <?php echo $listSala["nomeProf"]; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ambiente Virtual</a></li>
        <li class="active">Sala #:<?php echo $_GET["id"]; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/no-user.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $listSala["nomeProf"]; ?></h3>

              <p class="text-muted text-center">Professor</p>

              <a href="#" class="btn btn-primary btn-block"><b>Enviar Mensagem</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sobre</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educação</strong>

              <p class="text-muted">
                UnB - Pedagogia, Portugues
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Localização</strong>

              <p class="text-muted">Ceilandia, Brasilia-DF</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Disciplinas</strong>
              <?php if($_SESSION["Perfil"] == "Professor"){ ?>  
              <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Conteudo</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-circle-o"></i> Inserir Conteudo</a></li>
                                <li><a href=""><i class="fa fa-circle-o"></i> Listar Conteudos</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
              <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ultimos Participantes</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 Participantes</span>
                   
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php
                    foreach($listAlunos as $value) {
                    ?>
                    <li>
                        <img src="../img/Alunos/<?php echo $value["Foto"]?>" alt="User Image" style="width: 50px; height: 50px;">
                      <a class="users-list-name" href="#"><?php echo $value["Nome"]?></a>
                      <span class="users-list-date">offline</span>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
          </div>
        </div>
          
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Conteudos</a></li>
              <li><a href="#timeline" data-toggle="tab">Participantes</a></li>
              <?php if($_SESSION["Perfil"] == "Professor"){?>
                <li><a href="#settings" data-toggle="tab">Adicionar Conteudo</a></li>
             <?php } ?>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <?php foreach ($listConteudo as $conteudo) { ?>
                <div class="post" style="padding-top: 5px;">
                  <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="../dist/img/no-user.png" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo 'Prof. ',$conteudo["nomeProf"],' - ',$conteudo["titulo"],'';?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-edit"></i></a>
                        </span>
                    <span class="description"><?php echo 'Adicionado em ',$conteudo["data"],' as ',$conteudo["hora"],'';?></span>
                  </div>
                    <?php echo $conteudo["conteudo"];?>
                    <?php $listArquivos = $salaConsulta->listarAquivosSalasVirtuais($conteudo["id"]); 
                    
                    foreach ($listArquivos as $arquivo) {
                    if($arquivo["type"] == ".pdf"){?>
                    <img style="padding-top: 10px;" src="../img/pdf.png" >
                    <a href="../arquivosSala/<?php echo $arquivo["url"];?>" donwload><?php echo $arquivo["nomeArquivo"];?></a><br>
                    <?php } 
                    if($arquivo["type"] == "docx"){?>
                    <img style="padding-top: 10px;" src="../img/word.png">
                    <a href="../arquivosSala/<?php echo $arquivo["url"];?>" donwload><?php echo $arquivo["nomeArquivo"];?></a><br>
                    <?php }
                    if($arquivo["type"] == "pptx"){?>
                    <img style="padding-top: 10px;" src="../img/powerpoint.png">
                    <a href="../arquivosSala/<?php echo $arquivo["url"];?>" donwload><?php echo $arquivo["nomeArquivo"];?></a><br>
                    
                        <?php }?>
                    <?php }?>
                </div>
                <?php } ?>
                
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                  <ul class="users-list clearfix">
                    <?php foreach($listAlunos as $value) { ?>
                    <li>
                        <img src="../img/Alunos/<?php echo $value["Foto"]?>" alt="User Image" style="width: 100px; height: 100px;">
                      <a class="users-list-name" href="#"><?php echo $value["Nome"]?></a>
                      <span class="users-list-date">Offline</span>
                    </li>
                    <?php }
                    ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="post" action="../controller/adicionarConteudo.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputTitulo" class="col-sm-2 control-label">Titulo do conteudo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputTitulo" placeholder="Titulo do Conteudo">
                      <input type="hidden" class="form-control" name="inputId" value="<?php echo $_GET["id"];?>" placeholder="Titulo do Conteudo">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputConteudo" class="col-sm-2 control-label">Conteudo</label>

                    <div class="col-sm-10">
                      <textarea id="editor1" name="inputConteudo" rows="10" cols="80">
                        </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="uploads" class="col-sm-2 control-label">Arquivos</label>

                    <div class="col-sm-10">
                        <input type="file" name="arquivos[]" multiple>

                        <p class="help-block">Selecione um ou mais arquivos para fazer upload.</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Enviar</button>
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
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
