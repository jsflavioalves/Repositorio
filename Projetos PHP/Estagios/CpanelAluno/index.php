<?php
require ('pages/conn.php');
mysql_select_db('estagios');

@session_start();

$matricula=$_SESSION['sesaomatricula'];

$consultar=mysql_query("SELECT * FROM alunos where matricula = '$matricula'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}

$linha=mysql_fetch_array($consultar);
$id_aluno = $linha['id_aluno'];
$nome_aluno = $linha['nome'];
$cpf = $linha['cpf'];
$rg = $linha['rg'];
$matricula = $linha['matricula'];
$nome_mae = $linha['nome_mae'];
$curso = utf8_encode($linha['curso']);
$email = $linha['email'];
$telefone = $linha['telefone'];
$endereco = $linha['endereco'];
$cidade = $linha['cidade'];
$uf = $linha['uf'];
 
list($nome, $nome2, $nome3) = explode(' ', $nome_aluno);
list($parte1, $parte2, $parte3) = explode(' ', $curso);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Inicio</title>
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="brasao.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><strong>CLICK<i class="fa fa-caret-left"></i></strong> Estágios</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php include 'pages/barra_topo_index.php'; ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="font-size: 15px; margin-bottom: 2px;"><?php echo utf8_encode($nome.' '.$nome2.' '.$nome3); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <!-- ÍCONE ONLINE -->
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'pages/barra_menu_index.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--página inicial da parte do aluno no sistema, mostrando algumas informações que inviabilizam convênios e a barra menu para as ações que o aluno pode fazer dentro do sistema-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <?php 
        if ($rg == null){
            echo "<script type='text/javascript'> $(document).ready(function() { $('#myModal').modal('show'); }); </script>";
        }

      ?>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DADOS INCOMPLETOS!</h4>
            </div>
            <div class="modal-body">
              <p>SEUS DADOS NÃO ESTÃO COMPLETOS! POR FAVOR ATUALIZE PARA CONTINUAR SEU ACESSO.</p>
            </div>
            <div class="modal-footer">
              <a href="pages/profile.php"><button type="button" class="btn btn-info" style="width:100%">CONFIRMAR DADOS</button></a>
            </div>
          </div>

        </div>
      </div>
      <!-- Small boxes (Stat box) -->

      <!-- /.row (main row) -->
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-info">
            <h4>INFORMAÇÕES</h4>
          </div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border" style="border-bottom: 1px solid #c1c1c1;">
                <h3 class="box-title">ORIENTAÇÕES GERAIS PARA ATENDIMENTO</h3>
              </div>
              <!-- /.box-header -->
              <!--<div class="box-body">
                <div class="box-group" id="accordion">
                  <div class="panel box box-default" style="border: 1px solid #c1c1c1;">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      <div class="box-header with-border" style="border-bottom: 1px solid #c1c1c1;">
                      <h4 class="box-title">PERGUNTA?</h4>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-sort-desc"></i>
                        </button>
                      </div>
                      </div>
                    </a>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="box-body">
                        RESPOSTA.
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-default" style="border: 1px solid #c1c1c1;">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      <div class="box-header with-border" style="border-bottom: 1px solid #c1c1c1;">
                      <h4 class="box-title">PERGUNTA?</h4>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-sort-desc"></i>
                        </button>
                      </div>
                      </div>
                    </a>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="box-body">
                        RESPOSTA.
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-default" style="border: 1px solid #c1c1c1;">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      <div class="box-header with-border" style="border-bottom: 1px solid #c1c1c1;">
                      <h4 class="box-title">PERGUNTA?</h4>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-sort-desc"></i>
                        </button>
                      </div>
                      </div>
                    </a>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="box-body">
                        RESPOSTA.
                      </div>
                    </div>
                  </div> 
                </div>
              </div> -->
              <!-- /.box-body -->
              <!-- /.box-header -->
              <div class="box-body" style="color:red; font-weight: bold;">
                <ol>
                   <li>NO CASO DE ESTÁGIO OBRIGATÓRIO, CHECAR A VIGÊNCIA DE 1 SEMESTRE</li>
                   <li>O TCE TEM QUE VIR SEM RASURAS E SEM USAR CORRETIVO</li>
                   <li>NÃO ESQUECER DE COLHER ASSINATURA DO PROF. ORIENTADOR, DA EMPRESA E DO ALUNO</li>
                   <li>FAZER DOWNLOAD DO MODELO DE TCE OBRIGATÓRIO ATUALIZADO NO SITE</li>
                   <li>REALIZAR AGENDAMENTO PARA OBTER PRIORIDADE DE ATENDIMENTO</li>
                   <li>O TCE PODE TER NO MÁXIMO CARGA HORÁRIA DE 30 HORAS SEMANAIS E O MESMO TERÁ 1 MÊS PARA SER FORMALIZADO</li>
                </ol>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-6">
              <div class="box box-default">
              <div class="box-header with-border" style="border-bottom: 1px solid #c1c1c1;">
                <h3 class="box-title">MOTIVOS QUE INVIABILIZAM A ASSINATURA DO TCE</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ol>
                  <li>EMPRESA SEM CONVÊNIO</li>
                  <li>TERMOS DE COMPROMISSO RETROATIVOS</li>
                  <li>TERMO DE COMPROMISSO SEM PLANO DE ATIVIDADE SOU SEM O NÚMERO DA APÓLICE DE SEGURO</li>
                  <li>CHOQUE DE HORÁRIO COM DISCIPLINAS DA GRADUAÇÃO</li>
                  <li>TERMO DE COMPROMISSO SEM ASSINATURA DO PROFESSOR ORIENTADOR</li>
                  <li>ALUNOS SEM MATRÍCULA OU COM MATRÍCULA INSTITUCIONAL</li>
                </ol>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
