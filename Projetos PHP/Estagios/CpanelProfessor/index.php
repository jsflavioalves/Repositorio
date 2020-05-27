<?php
require ('pages/conn.php');
mysql_select_db('estagios');

session_start();
$siape=$_SESSION['siape'];

$consultar=mysql_query("SELECT * FROM professor_orientador WHERE siape = '$siape'");
$result=mysql_num_rows($consultar);

if ($result == 0) {
  header('location:http://estagios.prex/siges/public_html/');
}

$linha=mysql_fetch_array($consultar);
$id_professor = $linha['id_professor'];
$nome_prof = utf8_encode($linha['nome']);
$siape = $linha['siape'];
$fone = $linha['fone'];
$email = $linha['email'];
$lotacao = $linha['lotacao'];
$cpf = $linha['cpf'];

list($nome, $nome2, $nome3) = explode(' ', $nome_prof);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Inicio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
  </script>

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
          <p><?php echo $nome.' '.$nome2.' '.$nome3; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'pages/barra_menu_index.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
<!--aqui é a página inicial da parte do professor, vai mostra uma tabela com todos os alunos orientados pelo o professor e também a possibilidade de gerar PDF de uma declaração para o aluno específico ou todos os alunos orientados-->
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
              <h4>TODOS OS ALUNOS ORIENTADOS POR <?php echo $nome_prof; ?></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th></th>
                  <th>Aluno(a)</th>
                  <th>Data início do estágio</th>
                  <th>Data término do estágio</th>
                  <th>Empresa</th>
                  <th>Declaração</th>
                </tr>
                <?php 
                  require('../conn.php');
                  mysql_select_db('estagios');

                  $consulta = mysql_query("SELECT * FROM termo_compromisso WHERE siape LIKE '$siape'");

                  while ($sql = mysql_fetch_array($consulta)) {
                    $id_termo = $sql['id_termo_compromisso'];
                    $matricula_aluno = $sql['matricula_aluno'];
                    $nome = $sql['nome'];
                    $dt_inicio = $sql['dt_inicio'];
                    $dt_fim = $sql['dt_fim'];

                    $consulta1 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
                    $sql1 = mysql_fetch_array($consulta1);
                    $aluno = utf8_encode($sql1['nome']);

                    $consulta2 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$nome'");
                    $sql2 = mysql_fetch_array($consulta2);
                    $empresa = utf8_encode($sql2['nome']);

                    echo '<tr>
                            <td></td>
                            <td>'.$aluno.'</td>
                            <td>'.$dt_inicio.'</td>
                            <td>'.$dt_fim.'</td>
                            <td>'.$empresa.'</td>
                            <td><form action="acao_gerar_declaracao.php" method="POST" onsubmit="javascript: abreResposta(this)"><button id="btn" type="submit" class="btn btn-primary">GERAR DECLARAÇÃO</button>
                                <input type="hidden" value="'.$matricula_aluno.'" name="matricula_aluno">
                                <input type="hidden" value="'.$siape.'" name="siape">
                                <input type="hidden" value="'.$nome.'" name="CD_EMPRESA">
                                <input type="hidden" value="'.$id_termo.'" name="id_termo">
                                </form>
                            </td>
                          </tr>';
                  }

                 ?>
                 <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><form action="acao_gerar_pdf.php" method="POST" onsubmit="javascript: abreResposta(this)"><button id="btn" type="submit" class="btn btn-primary"> GERAR PDF&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
                        <input type="hidden" value="<?php echo $matricula_aluno; ?>" name="matricula_aluno">
                        <input type="hidden" value="<?php echo $siape; ?>" name="siape">
                        <input type="hidden" value="<?php echo $nome; ?>" name="CD_EMPRESA">
                        <input type="hidden" value="<?php echo $id_termo; ?>" name="id_termo">
                        <input type="hidden" value="<?php echo $nome_prof; ?>" name="nome_prof">
                        </form>
                    </td>
                  </tr>
              </table>
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
</div>
<!-- ./wrapper -->

 
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="dist/js/funcs.js"></script>
</body>
</html>
