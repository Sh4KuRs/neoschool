<?php
?>
<link href="../../js/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
<script src="../js/fontawesome/js/all.min.js" type="text/javascript"></script>
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
              <i class="fas fa-envelope"></i>
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
                        <small><i class="fas fa-clock"></i> 5 min</small>
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
              <i class="fas fa-bell"></i>
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
                      <i class="fas fa-exclamation text-yellow"></i> Novos eventos adicionados ao calendario.
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
              <img src="../dist/img/no-user.png" class="user-image" alt="Imagem do Usúario">
              <span class="hidden-xs"><?php echo $_SESSION["Nome"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/no-user.png" class="img-circle" alt="Imagem do Usúario">

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

      <!-- /.Pesquisar form -->
      <!-- sidebar menu: : estilo pode ser encontrado em sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="far fa-circle"></i> Home</a></li>
            <li><a href=""><i class="far fa-circle"></i> Portal do Aluno</a></li>
          </ul>
        </li>    
        <li>
          <a href="dashboard_1.php">
            <i class="fas fa-swatchbook"></i> <span>Minhas Salas Virtuais</span>
          </a>
        </li>    
        <li class="header">Turmas</li>
        <li>
          <a href="turmas.php">
            <i class="fa fa-th"></i> <span>Minhas Turmas</span>
          </a>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fas fa-chart-bar"></i>
            <span>Gráficos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="far fa-circle"></i> Relatorio de desempenho</a></li>
            <li><a href="#"><i class="far fa-circle"></i> Média notas</a></li>
          </ul>
        </li>
        <li class="header">Área Gestão</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-chalkboard-teacher"></i> <span>Aula/Frequencia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="frequencia.php"><i class="far fa-circle"></i> Adicionar Frequencia</a></li>
            <li class="active"><a href="listarfrequencias.php"><i class="far fa-circle"></i> Frequencias</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-sort-numeric-up"></i> <span>Avliações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="nota.php"><i class="far fa-circle"></i>Adicionar Nota</a></li>
            <li class="active"><a href="notas.php"><i class="far fa-circle"></i>Notas</a></li>
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
 