<script src="../bower_components/ckeditor/ckeditor.js"></script>
<?php 
    if(isset($_POST["aviso_id"])){
        require_once '../class/control_avisos.php';
        $AvisoDTO = new control_avisos();
        $value = $AvisoDTO->BuscarPorCOD($_POST["aviso_id"]);
    ?>
<form method="post" action="../controller/editaraviso.php">
<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title">Adicionar Aviso</h2>
    </div>
    <div class="box-body">
        <div class="col-xs-1">
            <label for="inputCodigo">Cod. Aviso</label>
            <input type="text" name="inputCodigo" class="form-control" value = "<?php echo $value["Codigo"];?>" placeholder="<?php echo $value["Codigo"];?>" disabled="true">
        </div>
        <div class="col-xs-5">
            <label for="inputTitulo">Título Aviso</label>
            <input type="text" name="inputTitulo" class="form-control" value = "<?php echo $value["Nome"];?>" placeholder="<?php echo $value["Nome"];?>">
        </div>
        <div class="col-xs-2">
            <label for="inputHora">Hora do Aviso</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" name="inputHora" value="<?php echo $value["Hora"];?>" placeholder="<?php echo $value["Hora"];?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
        </div>
        <div class="col-xs-2">
            <label for="inputDataAviso">Data do Aviso</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="inputDataAviso" class="form-control" value="<?php echo $value["Data"];?>" placeholder="<?php echo $value["Data"];?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
        </div>
        <div class="col-xs-2">
            <label for="inputType">Tipo do Aviso</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-newspaper"></i></span>
                <select class="form-control select2" style="width: 100%;" name="inputType">
                    <option name="inputType" value="Texto">Texto</option>
                    <option name="inputType" value="Imagem">Imagem</option>
                </select>
            </div>    
        </div>
        <div class="col-xs-12">
            <textarea id="editor1" name="inputMensagem" rows="10" cols="80">
                <?php echo $value["Conteudo"];?>
            </textarea>
        </div>
        <div class="col-xs-2">
            <label for="exampleInputFile">Enviar Imagens</label>
            <input type="file" id="exampleInputFile">

            <p class="help-block">Selecione mais de uma imagem para fazer upload.</p>
        </div>
       </div>   
    <div class="box-footer">
        <button type="submit" class="btn btn-danger pull-left">Atualizar Aviso</button>
    </div>
    </div>
</form>
    <?php }  else {
    
?>
<form method="post" action="../controller/adicionarAviso.php">
<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title">Adicionar Aviso</h2>
    </div>
    <div class="box-body">
        <div class="col-xs-6">
            <label for="inputTitulo">Título Aviso</label>
            <input type="text" name="inputTitulo" class="form-control" placeholder="Título">
        </div>
        <div class="col-xs-2">
            <label for="inputHora">Hora do Aviso</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" name="inputHora" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
        </div>
        <div class="col-xs-2">
            <label for="inputDataAviso">Data do Aviso</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="inputDataAviso" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
            </div>
        </div>
        <div class="col-xs-2">
            <label for="inputType">Tipo do Aviso</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-newspaper"></i></span>
                <select class="form-control select2" style="width: 100%;" name="inputType">
                    <option name="inputType" value="Texto">Texto</option>
                    <option name="inputType" value="Imagem">Imagem</option>
                </select>
            </div>    
        </div>

        <div class="col-xs-12">
           <textarea id="editor1" name="inputMensagem" rows="10" cols="80">
               
           </textarea>
        </div>
        <div class="col-xs-2">
            <label for="exampleInputFile">Enviar Imagens</label>
            <input type="file" id="exampleInputFile">

            <p class="help-block">Selecione mais de uma imagem para fazer upload.</p>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-left">Adicionar Aviso</button>
    </div>
</div>
    </form><?php } ?>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textareaa').wysihtml5()
  })
</script>