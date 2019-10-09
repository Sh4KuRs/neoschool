<?php 
require_once '../controller/functions.php';

$matricula = $_POST["inputMatricula"];
$nome = $_POST["inputNome"]; 
$dataNascimento = $_POST["inputDataN"];
$sexo = $_POST["inputSexo"];
$rg = $_POST["inputRG"];
$orgaoExpeditor = $_POST["inputOrgaoExp"];
$cpf = $_POST["inputCPF"];
$estadoCivil = $_POST["inputEstadoCivil"];
$orgaoExpeditor = $_POST["inputOrgaoExp"];
$email = $_POST["inputEmail"];
$telefone = $_POST["inputTelefone"];
$turma = $_POST["inputTurma"];
$senha = $_POST["inputSenha"];

if(isset($_POST["inputResponsavel"])){
    $responsavel_id = $_POST["inputResponsavel"];
    require_once '../class/control_pais.php';
    $reponsavelid = $_POST["inputResponsavel"];
    $control_resp = new control_pais();
    $dadosResp = $control_resp->BuscarPorCODResp($responsavel_id);
}

require_once '../class/control_turmas.php';

$control_turma = new control_turmas();
$dadosTurma = $control_turma->BuscarTurmaCOD($turma);
date_default_timezone_set('America/Sao_Paulo');
$dataRegistro = date('d/m/y');

?>
<?php if(!empty($_POST["inputSenha"])){ ?>
<section class="invoice">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                      <h2 class="page-header">
                          <i class="fa fa-globe"></i> Neo Escola.
                          <small class="pull-right">Data: <?php echo date('d/m/Y \- \H\o\r\a\: H:i:s');?></small>
                      </h2>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                  <div class="col-sm-6 invoice-col">
                      Matricula Escolar
                      <address>
                          <strong>Neo Escola.</strong><br>
                          St. R - Ceilândia, Brasília - DF<br>
                          Telefone: (61) 3984-5700<br>
                          Email: neoescola@com.br
                      </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                      <b>Registro #007612</b><br>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row invoice-info">
                  <div class="col-sm-8 invoice-col">
                      <b>Matricula N° #007612</b><br>
                      <br>
                      <b>Nome:</b><?php echo $nome;?><br>
                      <b>Data Nascimento:</b> <?php echo $dataNascimento;?> <b>Idade:</b> <?php echo calcularIdade($dataNascimento);?> Anos<br>
                      <b>Data Registro:</b> <?php echo $dataRegistro;?><br>
                      <b>Sexo:</b> <?php echo $sexo;?><br>
                      <b>RG:</b> <?php echo $rg." Orgão Expeditor ".getOrgaoExpeditor($orgaoExpeditor);?><br>
                      <b>CPF:</b> <?php echo $cpf;?><br>
                      <b>Estado Civil:</b> <?php echo $estadoCivil;?><br>
                      <b>Telefone:</b> <?php echo $telefone;?><br>
                      <br>
                      <b>Usúario de Acesso</b><br>
                      <b>Email:</b> <?php echo $email;?><br>
                      <b>Token de Acesso:</b> <?php echo $senha;?><br><br>
                  </div>
                  <!-- /.col -->
              </div><?php if(calcularIdade($dataNascimento) <= "17"){ ?>
              <?php if(isset($_POST["inputResponsavel"])){?>
                <div class="row invoice-info">
                    <div class="col-sm-8 invoice-col">
                        <p class="lead">Dados Responsavel</p>
                        <b>Nome:</b> <?php echo $dadosResp["Nome"];?><br>
                        <b>Parentesco:</b> <?php echo $dadosResp["Parentesco"];?><br>
                        <b>Data Nascimento:</b> <?php echo $dadosResp["DataNascimento"];?> <b>Idade:</b> <?php echo calcularIdade($dadosResp["DataNascimento"]);?> Anos<br>
                        <b>Sexo:</b> <?php echo $dadosResp["Sexo"];?><br>
                        <b>RG:</b> <?php echo $dadosResp["RG"];?> - Orgão Expeditor: <?php echo getOrgaoExpeditor($dadosResp["OrgaoExp"]);?><br>
                        <b>CPF:</b> <?php echo $dadosResp["CPF"];?><br>
                        <b>Estado Civil:</b> <?php echo getEstadoCivil($dadosResp["EstadoCivil"]);?><br>
                        <b>Telefone:</b> <?php echo $dadosResp["Telefone"];?><br>
                        <br>
                        <b>Usúario de Acesso</b><br>
                        <b>Email:</b> <?php echo $dadosResp["Login"];?><br>
                        <b>Token de Acesso:</b> <?php echo $dadosResp["Senha"];?><br><br>
                    </div>
                </div>
              <?php }else{
                    $parentesco = $_POST["inputParentesco"];
                    $nomeResp = $_POST["inputNomeResp"];
                    $cpfResp = $_POST["inputCPFResp"];
                    $rgResp = $_POST["inputRGResp"];
                    $estadoCivilResp = $_POST["inputEstadoCivilResp"];
                    $orgaoExpResp = $_POST["inputOrgaoExpResp"];
                    $dataNResp = $_POST["inputDataNResp"];
                    $sexoResp = $_POST["inputSexoResp"];
                    $telefoneResp = $_POST["inputTelefoneResp"];
                    $emailResp = $_POST["inputUsuarioResp"];
                    $senhaResp = $_POST["inputSenhaResp"];
                ?>
                <div class="row invoice-info">
                  <div class="col-sm-9 invoice-col">
                      <p class="lead">Dados Responsavel</p>
                      <b>Nome:</b> <?php echo $nomeResp;?><br>
                      <b>Data Nascimento:</b> <?php echo $dataNResp;?> <b>Idade:</b> <?php echo calcularIdade($dataNResp);?> Anos<br>
                      <b>Data Registro:</b> <?php echo $dataRegistro;?><br>
                      <b>Sexo:</b> <?php echo $senhaResp;?><br>
                      <b>RG:</b> <?php echo $rgResp." - Orgao Expeditor: ".getOrgaoExpeditor($orgaoExpResp);?><br>
                      <b>CPF:</b> <?php echo $cpfResp;?><br>
                      <b>Estado Civil:</b> <?php echo getEstadoCivil($estadoCivilResp);?><br>
                      <b>Telefone:</b> <?php echo $telefoneResp;?><br>
                      <br>
                      <b>Usúario de Acesso</b><br>
                      <b>Email:</b> <?php echo $emailResp;?><br>
                      <b>Token de Acesso:</b> <?php echo $senhaResp;?><br><br>
                  </div>
                  <!-- /.col -->
              </div>  
              <?php  } }?>
              
              <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-xs-12">
                      <p class="lead">Turma</p>
                      <div class="table-responsive">
                          <table class="table" >
                              <thead>
                                  <th>Etapa</th>
                                  <th>Turno</th>
                                  <th>Turma</th>
                              </thead>  
                              <tr>
                                  <td><?php echo $dadosTurma["Etapa"];?></td>
                                  <td><?php echo $dadosTurma["Turno"];?></td>
                                  <td><?php echo $dadosTurma["Nome"]." - ".$dadosTurma["Etapa"];?></td>
                              </tr>
                          </table>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </section>

<?php }else{ ?> 
    <p>Preencha todos Campos antes de Enviar!</p>
<?php } ?>

