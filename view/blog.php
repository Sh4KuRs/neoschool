<?php 
    require_once '../class/user.php';
    require_once '../class/control_user.php';
    require_once '../database/connect.php';
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neo Escola | Avisos</title>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    <?php include_once "_include/menu.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
      <h1>
          Linha do Tempo <small><button type="button" class="btn btn-block btn-success view_edit">+Novo Aviso</button></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Avisos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="employee_detail">

       </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
            <?php if(isset($_SESSION["sucesseful"])){
                echo $_SESSION["sucesseful"];
                unset ($_SESSION["sucesseful"]);
            }?>
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <ul class="timeline">
               <?php 
                 
                require_once '../class/control_avisos.php';
                $AvisoDTO = new control_avisos();
                $listaAvisos = $AvisoDTO->ListarAvisos();
                 
                if(isset($_GET["aviso"]))
                {
                    $id = $_GET["aviso"];
                    $AvisoDTO->deleteAviso($id);
                }
            ?>
            <!-- timeline time label -->
            <?php            
            foreach ($listaAvisos as $value){?>
            <li class="time-label">
                  <span class="bg-red">
                    <?php echo $value["Data"];?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                  <span class="time"> <i class="fa fa-clock-o"></i> <?php echo $value["Hora"];?></span>

                <h3 class="timeline-header"><a href="#"><?php echo $value["Nome"];?></a> </h3>

                <div class="timeline-body">
                    <?php echo $value["Conteudo"];?>
                </div>
                <h3 class="timeline-header"> <button type="button" id="<?php echo $value["Codigo"];?>" class="btn btn-info view_edit">Editar</button> <a href="blog.php?aviso=<?php echo $value["Codigo"];?>" class="btn btn-danger">Excluir</a></h3>
              </div>
            </li>
            <?php }
            ?>
            <!-- END timeline item -->
          </ul>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
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
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script>
 $(document).ready(function(){  
      $('.view_edit').click(function(){  
           var aviso_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/form.php",  
                method:"post",  
                data:{aviso_id:aviso_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                }  
           });  
      });  
 });
</script>

</body>
</html>
