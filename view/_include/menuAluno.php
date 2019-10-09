<?php
/*
echo '<meta charset="utf-8">';
require_once '../class/user.php';
require_once '../class/control_user.php';
require_once '../database/connect.php';

if(empty($_SESSION['name'])){
    header('Location: ../index.php');
}*/
require_once '../class/control_user.php';
require_once '../class/control_aluno.php';
$alunoControl = new control_aluno();
$infPerfil = $alunoControl->buscarPorCod($_SESSION["Enti_ID"]);
?>
<link href="../../js/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
<script src="../../js/fontawesome/js/all.min.js" type="text/javascript"></script>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>NEO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NEO</b>ESCOLA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="far fa-envelope"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 4 mensagens</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../dist/img/no-user.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Professor Marcos Farias
                        <small><i class="far fa-clock"></i> 5 min</small>
                      </h4>
                      <p>Prova marcada para dia 15/04</p>
                    </a>
                  </li>
                  <!-- fim menssagem -->
                  
                </ul>
              </li>
              <li class="footer"><a href="#">Marca todas como Lidas</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="far fa-bell"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 10 notificações</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Novos avisos adicionado a linha do tempo.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Novos eventos adicionados ao calendario.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> Professor Marcos Farias Adicinou um novo conteudo.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todas</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../img/Alunos/<?php echo $infPerfil["Foto"]; ?>" class="user-image" alt="Imagem do Usúario">
              <span class="hidden-xs"><?php //echo $_SESSION["name"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/Alunos/<?php echo $infPerfil["Foto"]; ?>" class="img-circle" alt="Imagem do Usúario">

                <p>
                  <?php echo $_SESSION["Nome"]?>
                  <small>Perfil <?php echo $_SESSION["Perfil"]?></small>
                </p>
              </li>
              <!-- Menu Body -->
             <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="meuperfil.php" class="btn btn-default btn-flat">Meu Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../controller/logout.php?logout=true" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Pesquisar form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.Pesquisar form -->
      <!-- sidebar menu: : estilo pode ser encontrado em sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li><a href="dashboard_1.php"><i class="fas fa-swatchbook"></i> <span>Salas Virtuais</span></a></li>
       <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Minha Turma</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Notas/Frequencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="far fa-circle"></i> Frequencias</a></li>
            <li><a href="#"><i class="far fa-circle"></i> Notas</a></li>
          </ul>
        </li>
        <hr>
        <li>
          <a href="#">
            <i class="fa fa-newspaper"></i> <span>Comunicados</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>E-mail</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 