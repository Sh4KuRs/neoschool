<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registre-se &mdash;</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/my-login.css">
    </head>
    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="brand">
                            <img src="../img/logo1.png">
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Registre-se</h4>
                                <?php 
                                session_start();
                                
                                if(isset($_SESSION["erro"])){
                                    echo $_SESSION["erro"];
                                    unset($_SESSION["erro"]);
                                }
                                ?>
                                <form method="POST" action="../controller/cadastro.php">
                                    
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">Nome de Usuário</label>
                                        <input id="name" type="text" class="form-control" name="nameUser" required autofocus>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="aggree" value="1"> Eu concordo com os Termos e Condições
                                        </label>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            REGISTRAR
                                        </button>
                                    </div>
                                    <div class="margin-top20 text-center">
                                        Já tem uma conta? <a href="../index.php">ENTRAR</a>
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

        <script src="js/jquery.min.js"></script>
        <!--<script src="js/my-login.js"></script>-->
    </body>
</html>