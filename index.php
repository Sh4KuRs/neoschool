<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Página de Acesso &mdash;</title>
        <link rel="stylesheet" href="dist//css/bootstrap.min.css">
        <script src="dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/my-login.css">
    </head>
    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="brand">
                            <img src="img/logo1.png">
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Acessar Conta</h4>
                                <?php 
                                if(isset($_SESSION["error"])){
                                    echo $_SESSION["error"];
                                    unset ($_SESSION["error"]);
                                }
                                ?>
                                <form method="POST" action="controller/login.php">
                                    
                                    <div class="form-group">
                                        <label for="text">Identificação de Usuário</label>

                                        <input id="email" type="text" class="form-control" name="login" value="" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha
                                            <a href="view/forgot.php" class="float-right">
                                                Esqueceu a Senha?
                                            </a>
                                        </label>
                                        <input id="password" type="password" class="form-control" name="senha" required data-eye>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="remember"> Lembrar-me
                                        </label>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-primary btn-block" name="ENTRAR">
                                            ENTRAR
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Ainda não tem uma conta? <a href="view/register.php">Criar Conta</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="footer">
                            Copyright &copy; Neo Escola 2019
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--<script src="js/my-login.js"></script>-->
    </body>
</html>