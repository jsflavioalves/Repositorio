<?php
require ('conn.php');
mysql_select_db('estagios');

@session_start();

$s_matricula=$_SESSION['sesaomatricula'];

$consultar=mysql_query("SELECT * FROM alunos where matricula like '$s_matricula'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}

$linha=mysql_fetch_array($consultar);
$id_aluno = $linha['id_aluno'];
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

$nome_aluno = $linha['nome'];
list($nome, $nome2, $nome3) = explode(' ', $nome_aluno);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágio | Emitir Declaração</title>
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../CpanelAluno/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="../../CpanelAluno/dist/js/onclick.js"></script>
  <script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
  </script>
  <script type="text/javascript">
    // MUDAR O ACTION DO FORMULÁRIO (DOIS SUBMIT's DENTRO DE UM MESMO FORM)
    function Enviar(opc){
      if(opc == 1){
      document.form.action = "acao_gerar_declaracao.php";
      document.form.submit();
      }
      if(opc == 2){
      document.form.action = "acao_gerar_declaracao_todos.php";
      document.form.submit();
      }
    }
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
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
      <?php include 'barra_topo.php'; ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../CpanelAluno/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo utf8_encode($nome.' '.$nome2.' '.$nome3); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--aqui tem a capacidade do aluno solicitar uma declaração de um termo de compromisso específicado e também de todos os termos de compromisso-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">TERMOS DE COMPROMISSO DE ESTÁGIOS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID DO TERMO</th>
                  <th>EMPRESA</th>
                  <th>DATA INICIO</th>
                  <th>DATA FINAL</th>
                  <th>TIPO DO TERMO</th>
                  <th>PROFESSOR ORIENTADOR</th>
                  <th>STATUS</th>
                </tr>
                <?php 
                  require('../../CpanelAluno/pages/conn.php');

                  $consulta = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula'");

                  while ($sql = mysql_fetch_array($consulta)) {
                    $id_termo_compromisso = $sql['id_termo_compromisso'];
                    $nome = $sql['nome'];
                    $dt_inicio = $sql['dt_inicio'];
                    $dt_fim = $sql['dt_fim'];
                    $tipo_termo = $sql['tipo_termo'];
                    $prof_orientador = $sql['prof_orientador'];
                    $status = $sql['status'];

                    $consulta2 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$nome'");
                    $sql2 = mysql_fetch_array($consulta2);
                    $empresa = $sql2['nome'];

                    echo utf8_encode('<tr>
                            <td>'.$id_termo_compromisso.'</td>
                            <td>'.$empresa.'</td>
                            <td>'.$dt_inicio.'</td>
                            <td>'.$dt_fim.'</td>
                            <td>'.$tipo_termo.'</td>
                            <td>'.$prof_orientador.'</td>
                            <td>'.$status.'</td>
                          </tr>');
                  }

                 ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">DIGITE O ID DO TERMO PARA GERAR DECLARAÇÃO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding-bottom:10px;">
              <form action="" method="POST" name="form" id="form" onSubmit="" target="_blank">
              <div class="form-group">
                <div class="col-sm-6" style="float:left;">
                  <input type="number" class="form-control" name="id_termo" placeholder="ID DO TERMO DE COMPROMISSO">
                </div>
                <div class="col-sm-6" style="float:right;">
                  <?php 
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $dia = strftime('%d', strtotime('today'));
                    $mes = strftime('%B', strtotime('today'));
                    $ano = strftime('%Y', strtotime('today'));
                    $hora = date('H:i:s');
                  ?>
                  <input type="hidden" name="dia" <?php echo 'value='.$dia.'' ?>>
                  <input type="hidden" name="mes" <?php echo 'value='.$mes.'' ?>>
                  <input type="hidden" name="ano" <?php echo 'value='.$ano.'' ?>>
                  <input type="hidden" name="hora" <?php echo 'value='.$hora.'' ?>>
                  <input name="id_aluno" type="hidden" class="form-control" value="<?php echo $id_aluno; ?>">
                  <button id="solicitar" onClick="Enviar(1);" type="submit" class="btn btn-primary">GERAR DECLARAÇÃO</button>
                  <button id="solicitar" onClick="Enviar(2);" type="submit" class="btn btn-success">GERAR TODAS AS DECLARAÇÕES</button>
                  </div>
                  </form>
                </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../CpanelAluno/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../CpanelAluno/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../CpanelAluno/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../CpanelAluno/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../CpanelAluno/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../CpanelAluno/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../CpanelAluno/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../CpanelAluno/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../CpanelAluno/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../CpanelAluno/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../CpanelAluno/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../CpanelAluno/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../CpanelAluno/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../CpanelAluno/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../CpanelAluno/dist/js/demo.js"></script>
<!-- Page script -->
<script src="../../CpanelAluno/dist/js/funcs_empresas.js"></script>

<script src="../../CpanelAluno/dist/js/funcs_conv_and.js"></script>

<script src="../../CpanelAluno/dist/js/funcs_conv_and_ok.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
