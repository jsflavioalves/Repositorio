<?php
require ('conn.php');
mysql_select_db('estagios');

@session_start();

$cpf=$_SESSION['sesaocpf'];

$consultar=mysql_query("SELECT * FROM alunos where cpf like '$cpf'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}

$linha=mysql_fetch_array($consultar);
$id_aluno = $linha['id_aluno'];
$cpf = $linha['cpf'];
$matricula = $linha['matricula'];
$curso = utf8_encode($linha['curso']);
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
  <title>Agência de Estágios UFC | Meus Termos</title>
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../CpanelAluno/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../CpanelAluno/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../CpanelAluno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Meus Termos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-info">
            <h4>TERMOS DE COMPROMISSO E ADITIVO</h4>
          </div>
          <div class="col-md-6">
              <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Meus Termos de Compromisso</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?php 
                  require('conn.php');

                  $consulta = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula' and tipo_termo LIKE 'T.C'");
                  $resultado = mysql_num_rows($consulta);
                    
                  if ($resultado == 0) {
                     echo '<div class="alert alert-danger alert-dismissable"><strong>ATENÇÃO!</strong> VOCÊ NÃO TEM NENHUM TERMO OU SEU TERMO AINDA NÃO FOI CONFIRMADO.</div>';
                  }

                  while ($sql = mysql_fetch_array($consulta)){
                    $id_termo_compromisso = $sql['id_termo_compromisso'];
                    $dt_inicio = $sql['dt_inicio'];
                    $dt_fim = $sql['dt_fim'];
                    $id_empresa = $sql['nome'];
                    $status = $sql['status'];
                    $arquivo = $sql['arquivo'];
                    $obs = utf8_encode($sql['obs']);

                    $consulta1 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$id_empresa'");

                    $sql1 = mysql_fetch_array($consulta1);
                    $nome_empresa = strtoupper(utf8_encode($sql1['nome']));
                    
                    if ($resultado != 0 and $status == "INATIVO" and $obs == 'TERMO NÃO CONFIRMADO') {
                        echo '<div class="alert alert-info alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' E AINDA NÃO ESTÁ CONFIRMADO.</strong>
                        </div>';
                    }
                    if ($resultado != 0 and $status == "ATIVO" and $arquivo != '') {
                        echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' COM A EMPRESA '.$nome_empresa.' E ESTÁ COM O STATUS '.$status.' ATÉ A DATA '.$dt_fim.'.</strong><br><br>
                        <a href="/siges/public_html/CpanelAdm/pages/forms/termos_pdf/'.$arquivo.'" target="_blank" style="text-decoration:none;"><button type="button" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> BAIXAR TERMO </button><a></div>';
                    }
                    if ($resultado != 0 and $status == "INATIVO" and $arquivo != '' and $obs != 'TERMO NÃO CONFIRMADO') {
                        echo '<div class="alert alert-warning alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' COM A EMPRESA '.$nome_empresa.' E ESTÁ COM O STATUS '.$status.' DESDE A DATA '.$dt_fim.'.</strong><br><br>
                        <a href="/siges/public_html/CpanelAdm/pages/forms/termos_pdf/'.$arquivo.'" target="_blank" style="text-decoration:none;"><button type="button" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> BAIXAR TERMO </button><a></div>';
                    }
                    if ($resultado != 0 and $status == "ATIVO" and $arquivo == '') {
                        echo '<div class="alert alert-success alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' COM A EMPRESA '.$nome_empresa.' E ESTÁ COM O STATUS '.$status.' ATÉ A DATA '.$dt_fim.'.</strong></div>';
                    }
                    if ($resultado != 0 and $status == "INATIVO" and $arquivo == '' and $obs != 'TERMO NÃO CONFIRMADO') {
                        echo '<div class="alert alert-warning alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' COM A EMPRESA '.$nome_empresa.' E ESTÁ COM O STATUS '.$status.' DESDE A DATA '.$dt_fim.'.</strong></div>';
                    }
                  }

               ?>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-6">
              <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Meus Termos Aditivos</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?php 
                  require('conn.php');

                  $consulta2 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula' and tipo_termo LIKE 'T.A'");
                  $resultado2 = @mysql_num_rows($consulta2);

                  $sql2 = @mysql_fetch_array($consulta2);
                  $id_termo_aditivo = $sql2['id_termo_compromisso'];
                  $dt_inicio_adt = $sql2['dt_inicio'];
                  $dt_fim_adt = $sql2['dt_fim'];
                  $status_adt = $sql2['status'];
                  $id_empresa_adt = $sql2['nome'];
                  $arquivo_adt = $sql2['arquivo'];
                  $obs = $sql['obs'];

                  $consulta3 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$id_empresa_adt'");

                  $sql3 = @mysql_fetch_array($consulta3);
                  $id_empresa_adt = $sql3['id_empresa'];
                  $nome_empresa_adt = utf8_encode($sql3['nome']);

                  if ($resultado != 0 and $status == "INATIVO" and $obs == 'TERMO NÃO CONFIRMADO') {
                        echo '<div class="alert alert-info alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <strong>TERMO ASSINADO NO DIA '.$dt_inicio.' E AINDA NÃO ESTÁ CONFIRMADO.</strong>
                        </div>';
                  }
                  if ($resultado2 != 0 and $status_adt == "ATIVO" and $arquivo != '') {
                      echo '<div class="alert alert-success alert-dismissable">
                      <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                      <strong>TERMO ASSINADO NO DIA '.$dt_inicio_adt.' COM A EMPRESA '.$nome_empresa_adt.' E ESTÁ COM O STATUS '.$status_adt.' ATÉ A DATA '.$dt_fim_adt.'.</strong><br><br>
                      <a href="/siges/public_html/CpanelAdm/pages/forms/termos_pdf/'.$arquivo_adt.'" target="_blank" style="text-decoration:none;"><button type="button" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> BAIXAR TERMO </button><a></div>';
                  }
                  if ($resultado2 != 0 and $status_adt == "INATIVO" and $arquivo != '' and $obs != 'TERMO NÃO CONFIRMADO') {
                      echo '<div class="alert alert-warning alert-dismissable">
                      <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                      <strong>TERMO ASSINADO NO DIA '.$dt_inicio_adt.' COM A EMPRESA '.$nome_empresa_adt.' E ESTÁ COM O STATUS '.$status_adt.' DESDE A DATA '.$dt_fim_adt.'.</strong><br><br>
                      <a href="/siges/public_html/CpanelAdm/pages/forms/termos_pdf/'.$arquivo_adt.'" target="_blank" style="text-decoration:none;"><button type="button" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-download"></i> BAIXAR TERMO </button><a></div>';
                  }
                  if ($resultado2 != 0 and $status_adt == "ATIVO" and $arquivo == '') {
                      echo '<div class="alert alert-success alert-dismissable">
                      <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                      <strong>TERMO ASSINADO NO DIA '.$dt_inicio_adt.' COM A EMPRESA '.$nome_empresa_adt.'  E ESTÁ COM O STATUS '.$status_adt.' ATÉ A DATA '.$dt_fim_adt.'.</strong></div>';
                  }
                  if ($resultado2 != 0 and $status_adt == "INATIVO" and $arquivo == '' and $obs != 'TERMO NÃO CONFIRMADO') {
                      echo '<div class="alert alert-warning alert-dismissable">
                      <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                      <strong>TERMO ASSINADO NO DIA '.$dt_inicio_adt.' COM A EMPRESA '.$nome_empresa_adt.' E ESTÁ COM O STATUS '.$status_adt.' DESDE A DATA '.$dt_fim_adt.'.</strong></div>';
                  }
                  if ($resultado2 == 0) {
                     echo '<div class="alert alert-danger alert-dismissable">
                      <strong>ATENÇÃO!</strong> VOCÊ NÃO TEM NENHUM TERMO OU SEU TERMO AINDA NÃO FOI CONFIRMADO.</div>';
                  }

               ?>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
      <!-- /.row (main row) -->
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
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../../CpanelAluno/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../CpanelAluno/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../CpanelAluno/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../CpanelAluno/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../CpanelAluno/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../CpanelAluno/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../CpanelAluno/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../CpanelAluno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../CpanelAluno/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../CpanelAluno/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../CpanelAluno/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../CpanelAluno/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../CpanelAluno/dist/js/demo.js"></script>
</body>
</html>
