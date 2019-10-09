<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Página Redefinir Senha &mdash;</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/my-login.css">
    </head>
    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center align-items-center h-100">
                    <div class="card-wrapper">
                        <div class="brand">
                            <img src="../img/logo1.png">
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Alterar Senha</h4>
                                <form method="POST">

                                    <div class="form-group">
                                        <label for="text">Identificação de Usuário</label>
                                        <input id="text" type="text" class="form-control" name="resetpassword" value="" required autofocus>
                                        <div class="form-text text-muted">
                                            Ao clicar em "Redefinir senha", enviaremos um link de redefinição de senha.
                                        </div>
                                    </div>

                                    <div class="form-group no-margin">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            MUDAR SENHA
                                        </button>
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
    </body>
</html>