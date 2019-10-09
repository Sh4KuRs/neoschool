<form id="alunos"  action="../controller/cadastrarAluno2.php" method="post" enctype="multipart/form-data">
    <section class="content">
        
       <div class="col-md-13">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Dados Pessoais </h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
    
            <div class="box-body">
                 <?php if(isset($_GET["sucesso"])){?>
                    <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"];?></div>
                <?php } ?>
                <div class="row">
                    <div class="col-xs-2">
                        <div id="image-holder">
                            <img class="img-responsive img-thumbnail img-bordered" src="../dist/img/user.png" alt="Imagem de Usuário"><br>
                        </div>
                        <input type="file" id="upload_file" name="upload_file" />
                        <label style=" padding-left: 17px; padding-right: 17px; position: absolute;top: 135px;left: 15px;" id="upload_btn" class="btn-sm btn-vk" for="upload_file">Enviar foto do aluno</label>
                    </div>
                    <div class="col-xs-2">
                      <label for="InputMatricula">N° Matricula</label>
                      <input type="text" name="inputMatricula" class="form-control" placeholder="Matricula">
                    </div>
                    
                    <div class="col-xs-6 validate">
                        <label class="control-label" for="inputNome">Nome Completo</label>
                        <input type="text" name="inputNome" id= "inputNome" class="form-control" placeholder="Nome completo"  pattern=".{3,}" required title="Digite pelo menos 3 caracteres.">
                   </div>

                    <div class="col-xs-2">
                       <label for="inputDataN">Data de Nascimento</label>
                       <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                           <input type="text" name="inputDataN" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="">
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputSexo">Sexo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="inputSexo" required="">
                                <option name="inputSexo" value="Feminino">Feminino</option>
                                <option name="inputSexo" value="Masculino">Masculino</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputRG">RG:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="far fa-id-card"></i>
                            </div>
                            <input type="text" name="inputRG" class="form-control" data-inputmask="'mask': ['9.999.999', '9 999 999']" data-mask>
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputOrgaoExp">Orgão Expeditor</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-landmark"></i></span>
                            <select class="form-control" style="width: 100%;" name="inputOrgaoExp">
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
                        <label for="inputCpf" >CPF</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="far fa-id-card"></i>
                          </div>
                            <input type="text" name="inputCPF" class="form-control" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask required="">
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputEstadoCivil">Estado Civil</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-control" style="width: 100%;" name="inputEstadoCivil">
                                <option >Não declarado</option>
                                <option value="1">Solteiro(a)</option>
                                <option value="2">Casado(a)</option>
                                <option value="3">Separado(a)</option>
                                <option value="4">Divociado(a)</option>
                                <option value="5">Viúvo(a)</option>
                            </select>
                        </div>    
                    </div>
                    
                    <div class="col-xs-3">
                        <label for="inputEmail">Endereço de e-mail</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="inputEmail" required="">
                        </div>
                    </div>
                    
                    <div class="col-xs-2">
                        <label for="inputTelefone" >Telefone</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                            <input type="text" name="inputTelefone" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask required="">
                        </div>
                    </div>
                        
                    <div class="col-xs-3">
                        <label for="inputTurma">Turma</label>
                            <select class="form-control select2" style="width: 100%;" name="inputTurma">
                                <?php 
                                require_once '../class/control_turmas.php';

                                 $turmaConsulta = new control_turmas();

                                 $listTurmas = $turmaConsulta->ListarTurmas();

                                 foreach ($listTurmas as $exibe) {
                                     echo "<option name='inputTurma' value='{$exibe["ID"]}' >",$exibe["Etapa"]," ",$exibe["Nome"]," - ",$exibe["Turno"],"</option>";
                                 }     
                                ?>    
                            </select>
                    </div>    
                </div>
            </div>
                  
          <!-- /.box -->
          <!-- Form Responsaveis -->
            <div class="box-header with-border">
              <h3 class="box-title">Dados Responsaveis</h3>
            </div>
            <div class="box-body">
                <div id="employee_detail">    
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="inputResponsavel">* Selecionar Responsavel</label>
                            <div class="input-group">
                                <select class="form-control select2" style="width: 100%;" name="inputResponsavel">
                                        <option name='inputResponsavel' value='Não Informado' >Informe o Responsavel</option>
                                        <?php 
                                        require_once '../class/control_pais.php';

                                         $RespConsulta = new control_pais();

                                         $respArray = $RespConsulta->ListarResponsaveis();

                                         foreach ($respArray as $exibe) { ?>
                                            <option name='inputResponsavel' value='<?php echo $exibe["ID"]; ?>' > <?php echo '',$exibe["Nome"],' - ',$exibe["CPF"],'';?> </option>
                                         <?php }     
                                        ?>    
                                </select>
                                <div class="input-group-btn">
                                  <a type="button" class="btn btn-danger ft_edit"><i class="fas fa-plus"></i> Responsavel</a>
                                </div>
                            </div>    
                        </div>
                       
                    </div>
                </div> 
          </div>
          <div class="box-header with-border">
              <h3 class="box-title">Configurações da conta do usuário - Aluno</h3>
           </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="inputUsuario">Usuário de Acesso</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="inputUsuario" id="inputUsuario" class="form-control" placeholder="Usuário de Acesso" required="">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <label for="inputSenha">Senha de Acesso</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="inputSenha" id="inputSenha" class="form-control" placeholder="Senha de Acesso">
                            <!-- /btn-group -->
                            <div class="input-group-btn">
                              <a type="button" class="btn btn-danger" onclick="javascript:gerarSenha()">Gerar senha</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <small id="resposta">Use o e-mail do aluno para o usuario de acesso.</small>
                    </div>
                    <div class="col-xs-4">
                        <div class="checkbox icheck">
                            <label>
                              <input type="checkbox"> Exigir mudança de senha<br>
                              <small>Para segurança extra, isso exige que o aluno confirme seu e-mail ou número de telefone ao redefinir sua senha. <a>Saber mais.</a></small>
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary view_data"  > <i class="fa fa-edit"></i> Cadastrar Aluno</button>   <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick=""></i> Cancelar</button>
                </div>
          </div>
       </div>
    </section>

<div class="modal fade" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-dialog" role="document">
      
      <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
        <p class="heading lead">Confirmação de Dados</p>
      </div>

      <!--Body-->
      <div class="modal-body">
          <div id="insere_aqui">
              
          </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-success waves-effect waves-light">Salvar e Enviar
          <i class="fa fa-paper-plane ml-1"></i>
          </button>
        <a href="invoice-print.html" target="_blank" class="btn btn-default">
            <i class="fa fa-print"></i> Imprimir
        </a>
        </a>
        <a type="button" class="btn btn-outline-primary waves-effect" style="color:red;"data-dismiss="modal">Fechar</a>
      </div>
    </div>

  </div>
</div>
</form>

<script type="text/javascript">
 
$(document).ready(function() {
    $('#alunos').submit(function(e) {
        e.preventDefault();
        var serializeDados = $('#alunos').serialize();
         
        $.ajax({
            url: 'exemplo-serialize.php',
            dataType: 'html',
            type: 'POST',
            data: serializeDados,
            success: function(data) {
                $('#insere_aqui').html(data);
                $('#modalPoll-1').modal("show"); 
            }
        });     

})
</script>