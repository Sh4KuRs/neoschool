<?php 
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

?>

<section class="invoice">
              <!-- title row -->
              <div class="row">
                  <div class="col-xs-12">
                      <h2 class="page-header">
                          <i class="fa fa-globe"></i> Neo Escola.
                          <small class="pull-right">Data: 2/10/2014 - Hora: 12:30:20</small>
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
                          795 Folsom Ave, Suite 600<br>
                          San Francisco, CA 94107<br>
                          Phone: (804) 123-5432<br>
                          Email: info@almasaeedstudio.com
                      </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 invoice-col">
                      <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row invoice-info">
                  <div class="col-sm-8 invoice-col">
                      <b>Matricula N° #007612</b><br>
                      <br>
                      <b>Nome:</b><?php echo $nome;?><br>
                      <b>Data Nascimento:</b> <?php echo $dataNascimento;?> <b>Idade:</b> 29 anos<br>
                      <b>Data Registro:</b> <?php echo $dataNascimento;?><br>
                      <b>Sexo:</b> <?php echo $sexo;?><br>
                      <b>RG:</b> <?php echo $rg." - ".$orgaoExpeditor;?><br>
                      <b>CPF:</b> <?php echo $cpf;?><br>
                      <b>Estado Civil:</b> <?php echo $estadoCivil;?><br>
                      <b>Telefone:</b> <?php echo $telefone;?><br>
                      <br>
                      <b>Usúario de Acesso</b><br>
                      <b>Email:</b> <?php echo $email;?><br>
                      <b>Token de Acesso:</b> <?php echo $senha;?><br><br>
                  </div>
                  <!-- /.col -->
              </div>
              <div class="row invoice-info">
                  <div class="col-sm-8 invoice-col">
                      <p class="lead">Dados Responsavel</p>
                      <b>Nome:</b> Jpsé da Silva<br>
                      <b>Data Nascimento:</b> 2/22/2014 <b>Idade:</b> 29 anos<br>
                      <b>Data Registro:</b> 2/22/2014<br>
                      <b>Sexo:</b> Masculino<br>
                      <b>RG:</b> 3.545.454 - Orgão Expeditor: SSP<br>
                      <b>CPF:</b> 329.294.023-02<br>
                      <b>Estado Civil:</b> Casado(a)<br>
                      <b>Telefone:</b> (61) 92399-9323<br>
                      <br>
                      <b>Usúario de Acesso</b><br>
                      <b>Email:</b> jose@gmail.com<br>
                      <b>Token de Acesso:</b> isud8re<br><br>
                  </div>
                  <!-- /.col -->
              </div>
              
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
                                  <td>3° Ano Ensino Médio</td>
                                  <td>Matutino</td>
                                  <td>A - 3° Ano Ensino Médio</td>
                              </tr>
                          </table>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </section>