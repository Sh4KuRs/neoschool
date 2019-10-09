<?php 
require_once '../class/control_professor.php';
require_once '../controller/functions.php';
$profesorControl = new control_professor();
$professorIndex = $profesorControl->buscarProfByID($_GET["editar"]);
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title">Editar Professor</h2>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="../controller/editarProfessor.php" method="post">
        <div class="box-body">
            <?php if (isset($_GET["sucesso"])) { ?>
                <div class='alert alert-success alert-dismissible'> <h4 class='font-light'><i class='icon fa fa-check'></i>Cadastro!</h4> <?php echo $_GET["sucesso"]; ?></div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-4">
                    <label for="inputNome">Nome Completo</label>
                    <input type="text" class="form-control" placeholder="Nome completo" value="<?php echo $professorIndex["Nome"];?>" name="inputNome">
                    <input type="hidden" value="<?php echo $professorIndex["ID"];?>" name="inputID">
                </div>
                <div class="col-xs-2">
                    <label for="inputCPF">CPF:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="far fa-id-card"></i>
                        </div>
                        <input type="text" name="inputCPF" class="form-control" value="<?php echo $professorIndex["CPF"];?>" data-inputmask="'mask': ['999.999.999 [-99]', '999 999 999 -99']" data-mask>
                    </div>
                </div>
                <div class="col-xs-2">
                    <label for="inputRG">RG:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="far fa-id-card"></i>
                        </div>
                        <input type="text" name="inputRG" class="form-control" value="<?php echo $professorIndex["RG"];?>" data-inputmask="'mask': ['9.999.999', '9 999 999']" data-mask>
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
                    <label for="inputDataN">Data de Nascimento</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="inputDataN" class="form-control" value="<?php echo $professorIndex["DataNascimento"];?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                </div>
                <div class="col-xs-2">
                    <label for="inputEstadoCivil">Estado Civil</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control" style="width: 100%;" name="inputEstadoCivil">
                            <option value="<?php $professorIndex["EstadoCivil"];?>"><?php echo getEstadoCivil($professorIndex["EstadoCivil"]); ?></option>
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
                        <select class="form-control" style="width: 100%;" name="inputSexo">
                            <?php if($professorIndex["Sexo"] == "Feminino"){
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
                    <label>Telefone</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="inputTelefone" class="form-control" value="<?php echo $professorIndex["Telefone"];?>" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>* Selecione a(s) Disciplinas</label>
                    <select class="form-control select2" name='inputDisciplina[]' multiple="multiple" data-placeholder="Selecione as disciplinas" style="width: 100%;">
                            <?php
                                require_once '../class/control_disciplinas.php';

                                $discConsulta = new control_disciplinas();
                                
                                $disciplinaList = $profesorControl->listProfessorDiscById($_GET["editar"]);
                                
                                $selectDisciplina = array();
                                
                                $listDisc = $discConsulta->listarDisc();

                                foreach ($disciplinaList as $key => $exibe) { 
                                    $selectDisciplina[$key] = $exibe["IDd"]; ?>
                                    <option name='inputDisciplina[]' value='<?php echo $exibe["IDd"]; ?>' selected> <?php echo '', $exibe["nomeDis"], '';?> </option>
                                <?php } ?>
                                    <?php foreach ($listDisc as $value) {
                                            if(!in_array($value["ID"], $selectDisciplina)){?>
                                            <option name='inputDisciplina[]' value='<?php echo $value["ID"]; ?>' > <?php echo '', $value["Nome"], '';?> </option>
                                        <?php } 
                                    }?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>* Selecione a(s) Turmas</label>
                    <select class="form-control select2" name='inputTurma[]' multiple="multiple" data-placeholder="Selecione as turmas" style="width: 100%;">
                            <?php
                                require_once '../class/control_turmas.php';

                                $turmaConsulta = new control_turmas();
                                
                                $turmasIndex = $profesorControl->listProfessorTurmaById($_GET["editar"]);
                                
                                $listTurmas = $turmaConsulta->ListarTurmas();
                                $select = array();
                               
                               ?>
                            <?php 
                               foreach ($turmasIndex as $key => $value) {
                                   $select[$key] = $value["turmaID"];?>
                                <option name='inputTurma[]' value='<?php echo $value["turmaID"]; ?>' selected=""> <?php echo '', $value["Nome"], ' - ', $value["Etapa"], ' - ', $value["Turno"], ''; ?> </option>
                                <?php } ?>
                                    <?php foreach ($listTurmas as $exibe) { 
                                            if (!in_array($exibe["ID"], $select)) {?>
                                                <option name='inputTurma[]' value='<?php echo $exibe["ID"]; ?>'> <?php echo '', $exibe["Nome"], ' - ', $exibe["Etapa"], ' - ', $exibe["Turno"], ''; ?> </option>    
                                            <?php  } ?>
                                    <?php  }  ?> 
                            </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <label for="inputEmail">Endereço de e-mail</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="inputEmail" class="form-control" placeholder="Email" value="<?php echo $professorIndex["Email"];?>">
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
                            <small>Use o e-mail do professor para o usúario de acesso.</small>
                        </div>
                        <div class="col-xs-4">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="inputStatus" value="I" <?php  echo $professorIndex["Status"] == "I" ? "checked" : " ";?>> Desativar Cadastro<br>
                                    <small>O professor ficara inativo no banco de dados. <a>Saber mais.</a></small>
                                </label>
                            </div>
                        </div> 
                    </div>    
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar Alterações</button> <button type="button" class="btn btn-danger"><i class="fa  fa-trash"></i> Cancelar</button>
        </div>
    </form>
</div>