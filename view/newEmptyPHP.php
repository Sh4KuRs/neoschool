<!doctype html>
<html>
<head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">    
</head>
<body>
       <div class="col-md-6 col-offset-2">
             <div class="panel panel-primary">
                    <div class="panel-heading">Envie sua mensagem</div>
                    <div class="panel-body">
                           <form action="enviar_mensagem.php" method="post" id="form_contato" class="form">
                                  <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" id="nome" required minlength="5" class="form-control"/>
                                  </div>
                                  <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" required class="form-control"/>
                                  </div>
                                  <div class="form-group">
                                        <label for="mensagem">Nome</label>
                                        <textarea type="text" name="mensagem" id="mensagem" required class="form-control"></textarea>
                                  </div>
                                  <div>
                                        <input type="submit" class="btn btn-success" value="Enviar"/>
                                  </div>
                           </form>
                    </div>
             </div>
       </div>
       <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
       <script src="../bower_components/jquery-validation-1.19.0/dist/jquery.validate.min.js" type="text/javascript"></script>
       <script src="../js/validate.js" type="text/javascript"></script>
       <script>
             $(function(){
                    $("#form_contato").validate();
             });
       </script>
</body>
</html>
