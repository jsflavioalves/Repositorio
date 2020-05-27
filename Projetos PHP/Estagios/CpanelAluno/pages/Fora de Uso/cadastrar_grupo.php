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
$curso = $linha['curso'];
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
  <title>Agência de Estágios UFC | Empresas Conveniadas</title>
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

  <script type="text/javascript" src="../../CpanelAluno/dist/js/funcs_conveniadas.js"></script>
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
  </div>
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
          <p style="font-size: 15px; margin-bottom: 2px;"><?php echo utf8_encode($nome.' '.$nome2.'<br>'.$nome3); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--Aqui mostra as empresas conveniadas de acordo com a consulta-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-info">
            <h4>CADASTRO DO GRUPO DE VAGAS</h4>
          </div>
          <?php

           require ('conn.php');
              mysql_select_db('estagios');

              $busca = mysql_query("SELECT * FROM permissoes_grupo WHERE matricula_aluno LIKE '$s_matricula'");
              $existe = mysql_num_rows($busca);
              $array = mysql_fetch_array($busca);
              $id_grupo = $array['id_grupo'];

              if($existe == 0){
                echo '<div class="alert alert-danger alert-dismissable"><strong>ATENÇÃO!</strong> VOCÊ NÃO SOLICITOU PARTICIPAR DE NENHUM GRUPO DE VAGAS!</div>';
              } if($existe != 0){
                echo '<div class="alert alert-success alert-dismissable"><strong>ATENÇÃO!</strong> VOCÊ JÁ É CADASTRADO EM UM GRUPO DE VAGAS!</div>';

              }

          ?>
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="box box-default">
              <div class="box-header with-border">
                <i class="fa fa-group"></i>
                <h3 class="box-title">CADASTRE-SE EM UM GRUPO DE VAGAS</h3>
              </div>
             <div class="box-body">

            <div class="col-md-12">
               <?php

               echo' <form action="grupo_insere.php" method="POST">
                  <td>
                              <div class="form-group">
                                 <select class="form-control select2" id="grupo" name="grupo" style="width: 100%;">';
                            
                                   
                                    $sql10 = mysql_query("SELECT * FROM grupo_vagas ORDER BY descricao_grupo ASC");
                                    
                                    while($resultado10 = @mysql_fetch_object($sql10)){
                                       echo utf8_encode('<option value="'.$resultado10->id_grupo.'">'.$resultado10->descricao_grupo.'</option>');
                                    }
                              
                           echo '</select> 
                            </div>
                             <input type="hidden" class="form-control" name="matricula" value="'.$matricula.'">
                            <div class="row">
                            <div class="col-md-12">
                            <div class="col-xs-12">
                            <button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="cadgrupo" value="cadastrar"> Cadastrar </button>
                            </div>
                            </div>
                            </div>
                  </td>
                </form>';
                ?>
              </div>

          </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

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
