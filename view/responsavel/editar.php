<?php  
    require_once '../class/control_pais.php';
    require_once '../controller/functions.php';
    
    $paisControl = new control_pais();
    $dadosPais = $paisControl->BuscarPorCODResp($_GET["editar"]);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title">Editar Responsavel</h2>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="../controller/editarResponsavel.php" method="post">
        <div class="box-body">
            <?php if (isset($_GET["sucesso"])) { ?>
                <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"]; ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-2">
                    <label for="inputParentesco">Grau de Parentesco</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-heart"></i></span>
                        <select class="form-control select2" style="width: 100%;" name="inputParentesco">
                            <option name="inputParentesco" value="<?php echo $dadosPais["Parentesco"]; ?>" selected=""><?php echo $dadosPais["Parentesco"]; ?></option>
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
                    <input type="text" class="form-control" value="<?php echo $dadosPais["Nome"]; ?>" placeholder="Nome completo" name="inputNomeResp">
                    <input type="hidden" value="<?php echo $dadosPais["ID"]; ?>" name="inputID">
                </div>

                <div class="col-xs-2">
                    <label for="inputCPFResp">CPF:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="far fa-id-card"></i>
                        </div>
                        <input type="text" name="inputCPFResp" value="<?php echo $dadosPais["CPF"]; ?>" class="form-control"  placeholder="000.000.000-00" data-inputmask="'mask': ['999-999-999 [-99]', '999 999 999 -99']" data-mask>
                    </div>
                </div>

                <div class="col-xs-2">
                    <label for="inputRG">RG:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="far fa-id-card"></i>
                        </div>
                        <input type="text" name="inputRG" value="<?php echo $dadosPais["RG"]; ?>" class="form-control" placeholder="0.000.000" data-inputmask="'mask': ['9.999.999', '9 999 999']" data-mask>
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
                    <label for="inputEstadoCivil">Estado Civil</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control" style="width: 100%;" name="inputEstadoCivil">
                            <option value="<?php $dadosPais["EstadoCivil"];?>"><?php echo getEstadoCivil($dadosPais["EstadoCivil"]); ?></option>
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
                    <label for="inputSexo">Sexo</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control select" style="width: 100%;" name="inputSexo">
                            <?php if($dadosPais["Sexo"] == "Feminino"){
                                echo "<option value='Feminino' selected>Feminino</option>";
                                echo "<option value='Masculino'>Masculino</option>";
                                }
                           else{   
                                echo "<option value='Masculino' selected>Masculino</option>";
                                echo "<option value='Feminino'>Feminino</option>";
                            }?>
                        </select>
                    </div>    
                </div>

                <div class="col-xs-2">
                    <label for="inputDataNResp">Data de Nascimento</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text"name="inputDataNResp" class="form-control" value="<?php echo $dadosPais["DataNascimento"];?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                </div>

                <div class="col-xs-2">
                    <label>Telefone</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="inputTelefoneResp" value="<?php echo $dadosPais["Telefone"];?>" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                    </div>
                </div>

            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Configurações da conta do usuário</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="inputUsuario">Usuário de Acesso</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="inputUsuario" value="<?php echo $dadosPais["Email"];?>" class="form-control" placeholder="Usuário de Acesso">
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
                        <small>Use o e-mail do responsavel para o usuario de acesso.</small>
                    </div>
                    <div class="col-xs-4">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="inputStatus" value="I" <?php  echo $dadosPais["Status"] == "I" ? "checked" : " ";?>> Desativar Cadastro<br>
                                    <small>O Responsavel ficara inativo no banco de dados. <a>Saber mais.</a></small>
                                </label>
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success"  > <i class="fa fa-edit"></i> Salvar Alteração</button>   <button type="submit" class="btn btn-danger"><i class="fa  fa-trash" onclick=""></i> Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>