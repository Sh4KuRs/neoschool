<?php
/*
echo '<meta charset="utf-8">';
require_once '../class/user.php';
require_once '../class/control_user.php';
require_once '../database/connect.php';

if(empty($_SESSION['name'])){
    header('Location: ../index.php');
}*/
?>
<header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
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
              <i class="fa fa-envelope-o"></i>
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
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Professor Marcos Farias
                        <small><i class="fa fa-clock-o"></i> 5 min</small>
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
              <i class="fa fa-bell-o"></i>
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
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="Imagem do Usúario">
              <span class="hidden-xs"><?php //echo $_SESSION["name"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="Imagem do Usúario">

                <p>
                  <?php //echo $_SESSION["name"]?> - Administrador
                  <small>Perfil Administrador</small>
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
                  <a href="#" class="btn btn-default btn-flat">Logout</a>
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
        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Home</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Portal do Aluno</a></li>
            <li><a href="sala.php"><i class="fa fa-circle-o"></i> Salas Virtuais</a></li>
          </ul>
        </li>
        <li class="header">Turmas</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Turmas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="turmas.php"><i class="fa fa-circle-o"></i> Turmas</a></li>
            <li><a href="disciplinas.php"><i class="fa fa-circle-o"></i> Disciplinas</a></li>
          </ul>
        </li>
        <li>
          <a href="blog.php">
            <i class="fas fa-newspaper"></i> <span>Avisos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gráficos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Relatorio de desempenho</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Média notas</a></li>
          </ul>
        </li>
        <li class="header">Área Professores</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Professores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Listar Professores</a></li>
            <li><a href="adicionarprofessor.php"><i class="fa fa-circle-o"></i> Cadastrar Professores</a></li>
          </ul>
        </li>
        <li class="header">Área Alunos</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-user-graduate"></i> <span>Alunos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="listaralunos.php"><i class="fa fa-circle-o"></i> Listar Alunos</a></li>
            <li class="active"><a href="adicionaralunos.php"><i class="fa fa-circle-o"></i> Adicionar Alunos</a></li>
          </ul>
        </li>
        <li class="header">Área Pais e Responsaveis</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-users"></i> <span>Pais e Responsaveis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adicionarpais.php"><i class="fa fa-circle-o"></i> Listar Responsaveis</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Adicionar Responsaveis</a></li>
          </ul>
        </li><hr>
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
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentação</span></a></li>
        <li class="header">Rotulos</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Importante</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Aviso</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informação</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>