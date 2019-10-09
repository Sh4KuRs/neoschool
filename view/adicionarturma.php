<?php
echo '<meta charset="utf-8">';
require_once '../class/user.php';
require_once '../class/control_user.php';
require_once '../database/connect.php';

$_SESSION["cod"] = new control_user();

$_SESSION["cod"]->BuscarPorCOD($_SESSION['cod_perfil']);
?>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark  bg-dark">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
          <img src="../img/graduation.png" width="30" height="30" class="d-inline-block align-top" alt=""> NEO ESCOLA
      </a>
      <ul class="nav justify-content-end">
          
          <li class="nav-item">
              <a class="nav-link active" href="#">--</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">--</a>
          </li>
          <li class="nav-item">
          
          <div class="btn-group">
              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION["name"]?>
              </button>
              <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="minhaconta.php">Minha Conta</a>
                  <a class="dropdown-item" href="#">--</a>
                  <a class="dropdown-item" href="#">--</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Logout</a>
              </div>
          </li>    
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                  <hr>
                  <a class="nav-link active" href="dashboard.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
                  <hr>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="professores.php">
                  <span data-feather="user-plus"></span>
                  Professores
                </a>
              </li>    
              <li class="nav-item">
                  <a class="nav-link" href="adcionarprofessores.php">
                  <span data-feather="user"></span>
                  Adicionar Professor
                </a>
                  <hr>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="alunos.php">
                  <span data-feather="users"></span>
                  Alunos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adicionaraluno.php">
                  <span data-feather="user-plus"></span>
                  Adicionar Aluno
                </a>
                  <hr>
              </li>
           
              <li class="nav-item">
                <a class="nav-link" href="responsaveis.php">
                  <span data-feather="layers"></span>
                  Pais e Responsaveis
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="adicionarresponsaveis.php">
                  <span data-feather="layers"></span>
                  Adcionar Pais
                </a>
                  <hr>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Menu</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="book"></span>
                  Salas Virtuais
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="hash"></span>
                  Postagens
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="calendar"></span>
                  Calendario
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
         <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Painel Inicial</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cadastrar Aluno</li>
                </ol>
            </nav>
          <!--<canvas class="my-4" id="myChart" width="900" height="380"></canvas>-->
          <h4>Dados Pessoais</h4>
          <hr>
          <form action="../controller/cadastrarAluno.php" method="post">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="inputNome"></label>
                      <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputEmail">Email</label>
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="">
                  </div>
                  <div class="form-group col-md-2">
                      <label for="inputMatricula">Matricula</label>
                      <input type="number" class="form-control" id="inputMatricula" name="inputMatricula" laceholder="Matricula">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="inputMae">Nome da Mãe</label>
                    <input type="text" class="form-control" id="inputMae" name="inputMae" placeholder="">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="inputPai">Nome do Pai</label>
                    <input type="text" class="form-control" id="inputPai" name="inputPai" placeholder="">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputDataN">Data de Nascimento</label>
                    <input type="date" class="form-control" id="inputDataN" name="inputDataN" placeholder="">
                  </div>
                  <div class="form-group col-md-2">
                      <label for="inputSexo">Sexo</label>
                      <select id="inputSexo" class="form-control" name="inputSexo">
                          <option name="inputSexo" value="Masculino" >Masculino</option>
                          <option name="inputSexo" value="Feminino">Feminino</option>
                          <option name="inputSexo" value="Não Declarado">Não Declarado</option>
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputCpf">CPF</label>
                      <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputNumber">Telefone</label>
                      <input type="text" class="form-control" id="inputNumber" name="inputNumber"placeholder="">
                  </div>
              </div>
              <hr>
              <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
          </form>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>


    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>


    </script>
  </body>
</html>
