<script src="../js/gerarSenha.js" type="text/javascript"></script>
<div class="row">
    <div class="col-xs-2">
        <label for="inputParentesco">Grau de Parentesco</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-heart"></i></span>
            <select class="form-control select2" style="width: 100%;" name="inputParentesco">
                <option name="inputParentesco" value="Pai">Pai</option>
                <option name="inputParentesco" value="Mae">Mãe</option>
                <option name="inputParentescoo" value="Avos">Avós</option>
                <option name="inputParentesco" value="Irmao">Irmãos</option>
                <option name="inputParentesco" value="Tio">Tio(a)</option>
            </select>
        </div>    
    </div>

    <div class="col-xs-4">
        <label for="inputNomeResp">Nome Completo</label>
        <input type="text" class="form-control" placeholder="Nome completo" name="inputNomeResp">
    </div>

    <div class="col-xs-2">
        <label for="inputCPFResp">CPF:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-id-card-o"></i>
            </div>
            <input type="text" name="inputCPFResp" class="form-control"  placeholder="000.000.000-00" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask>
        </div>
    </div>

    <div class="col-xs-2">
        <label for="inputRGResp">RG:</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-id-card-o"></i>
            </div>
            <input type="text" name="inputRGResp" class="form-control" placeholder="0.000.000" data-inputmask="'mask': ['9.999.999', '9 999 999']" data-mask>
        </div>
    </div>

    <div class="col-xs-2">
        <label for="inputOrgaoExpResp">Orgão Expeditor</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-landmark"></i></span>
            <select class="form-control" style="width: 100%;" name="inputOrgaoExpResp">
                <option value="1">SSP - Secretaria de Segurança Pública</option>
                <option value="2">PM - Polícia Militar</option>
                <option value="3">PC - Policia Civil</option>
                <option value="4">CNT - Carteira Nacional de Habilitação</option>
                <option value="5">DIC - Diretoria de Identificação Civil</option>
                <option value="6">CTPS - Carteira de Trabaho e Previdência Social</option>
                <option value="7">FGTS - Fundo de Garantia do Tempo de Serviço</option>
                <option value="8">IFP - Instituto Félix Pacheco</option>
                <option value="9">IPF - Instituto Pereira Faustino</option>
                <option value="10">IML - Instituto Médico-Legal</option>
                <option value="11">MTE - Ministério do Trabalho e Emprego</option>
                <option value="12">MMA - Ministério da Marinha</option>
                <option value="13">MAE - Ministério da Aeronáutica</option>
                <option value="14">MEX - Ministério do Exército</option>
                <option value="15">POF - Polícia Federal</option>
                <option value="16">POM - Polícia Militar</option>
                <option value="17">SES - Carteira de Estrangeiro</option>
                <option value="18">SJS - Secretaria da Justiça e Segurança</option>
                <option value="19">SJTS - Secretaria da Justiça do Trabalho e Segurança</option>
            </select>
        </div>    
    </div>

    <div class="col-xs-2">
        <label for="inputEstadoCivilResp">Estado Civil</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
            <select class="form-control" style="width: 100%;" name="inputEstadoCivilResp">
                <option >Não declarado</option>
                <option value="1">Solteiro(a)</option>
                <option value="2">Casado(a)</option>
                <option value="3">Separado(a)</option>
                <option value="4">Divociado(a)</option>
                <option value="5">Viúvo(a)</option>
            </select>
        </div>    
    </div>

    <div class="col-xs-2">
        <label for="inputSexoResp">Sexo</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
            <select class="form-control select" style="width: 100%;" name="inputSexoResp">
                <option name="inputSexo" value="Feminino">Feminino</option>
                <option name="inputSexo" value="Masculino">Masculino</option>
            </select>
        </div>    
    </div>

    <div class="col-xs-2">
        <label for="inputDataNResp">Data de Nascimento</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="inputDataNResp" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>
    </div>

    <div class="col-xs-2">
        <label>Telefone</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            <input type="text" name="inputTelefoneResp" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
        </div>
    </div>

</div>
<div class="box-header with-border">
    <h3 class="box-title">Configurações da conta do usuário - Reponsavel</h3>
</div>
<div class="box-body">
    <div class="row">
        <div class="col-xs-3">
            <label for="inputUsuarioResp">Usuário de Acesso</label>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" name="inputUsuarioResp" class="form-control" placeholder="Usuário de Acesso">
            </div>
        </div>
        <div class="col-xs-3">
            <label for="inputSenhaResponsavel">Senha de Acesso</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="inputSenhaResp" id="inputSenhaResponsavel" class="form-control" placeholder="Senha de Acesso">
                <!-- /btn-group -->
                <div class="input-group-btn">
                    <a type="button" class="btn btn-danger" onclick="javascript:gerarSenhaResponsavel()">Gerar senha</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <small>Use o e-mail do responsavel para o usuario de acesso.</small>
        </div>
        <div class="col-xs-4">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> Exigir mudança de senha<br>
                    <small>Para segurança extra, isso exige que o responsavel confirme seu e-mail ou número de telefone ao redefinir sua senha. <a>Saber mais.</a></small>
                </label>
            </div>
        </div> 
    </div>
    
    <!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  
    
    $('.select2').select2({
        
    });
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    });
</script>
  