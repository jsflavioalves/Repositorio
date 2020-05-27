<?php
require ('conn.php');
mysql_select_db('estagios');

@session_start();

$cpf=$_SESSION['sesaocpf'];

$consultar=mysql_query("SELECT * FROM alunos where cpf like '$cpf'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://ufcestagios.esy.es');}

$linha=mysql_fetch_array($consultar);
$id_aluno = $linha['id_aluno'];
$cpf = $linha['cpf'];
$curso = $linha['curso'];
$email = $linha['email'];
$fone = $linha['fone'];
$endereco = $linha['endereco'];
$input = $linha['nome']; list($nome, $surname) = explode(' ', $input, 2);
$input2 = $surname; list($nome2, $surname2) = explode(' ', $input2, 2);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágio | Atendimento Online</title>
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

  <script src="../../CpanelAluno/dist/js/onclick.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../CpanelAluno/brasao.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../../CpanelAluno/logo.png" style="margin-bottom: 20px; "></span>
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
          <p><?php echo $nome.' '.$nome2; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        ATENDIMENTO ONLINE
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
                <center><img src="../../CpanelAluno/dist/img/EM_BREVE.png" class="img-responsive"></center>
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2016 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
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
