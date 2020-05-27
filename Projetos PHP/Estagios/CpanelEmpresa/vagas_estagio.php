<?php
require ('conn.php');
mysql_select_db('estagios');

session_start();
$cnpj=$_SESSION['cnpj'];

$consultar=mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");
$result=mysql_num_rows($consultar);

if ($result == 0) {
  header('location:http://www.estagios.ufc.br/siges/public_html/');
}
$linha=mysql_fetch_array($consultar);

$nome_empresa = $linha['nome'];
$cnpj = $linha['cnpj'];

$_SESSION['nome_empresa'] = $nome_empresa;

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
  <script src="dist/js/mascaras.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
  </script>

  <script type="text/javascript">
    function alterar(){
      var up = document.getElementById("nome").disabled = false;
      var up = document.getElementById("endereco").disabled = false;
      var up = document.getElementById("cnpj").disabled = false;
      var up = document.getElementById("email").disabled = false;
      var up = document.getElementById("fone").disabled = false;
      var up = document.getElementById("btn_01").style.display = 'none';
      var up = document.getElementById("btn_02").style.display = 'block';
      var up = document.getElementById("btn_03").style.display = 'block';    
    }
    function cancelar(){
      var up = document.getElementById("nome").disabled = true;
      var up = document.getElementById("endereco").disabled = true;
      var up = document.getElementById("cnpj").disabled = true;
      var up = document.getElementById("email").disabled = true;
      var up = document.getElementById("fone").disabled = true;
      var up = document.getElementById("btn_01").style.display = 'block';
      var up = document.getElementById("btn_02").style.display = 'none';
      var up = document.getElementById("btn_03").style.display = 'none'; 
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
          <p><?php echo utf8_encode($nome_empresa); ?></p>
          <p><?php echo utf8_encode($cnpj); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'pages/barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--igual como tem na pagina do administrador, a empresa terá a possibilidade de fazer um cadastro de uma vaga de estágio e também a possibilidade de visualizar o cadastro por meio de uma tabela-->
  <!--caso a empresa queira excluir qualquer vaga de estágio que ela cadastrou, ela será impossibilitada, pois apenas o administrador irá fazer essa função-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header width-border">
              <h3 class="box-title">Inserir Nova Vaga</h3>
            </div>
            <div class="box-body">

              <!-- /.box-header -->
              <form action="pages/acao_inserir_vaga_estagio.php" enctype="multipart/form-data" method="POST">
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                  <label>Centro da Vaga</label>
                  <select class="form-control" style="width: 100%;" name="id_centro" required>
                  <?php 
                    require('conn.php');

                    $consulta = mysql_query("SELECT * FROM centros ORDER BY NM_CENTRO ASC");
                     echo $result = mysql_num_rows($consulta);

                    while ($sql = mysql_fetch_array($consulta)) {
                      $CD_CENTRO = $sql['CD_CENTRO'];
                      $NM_CENTRO = $sql['NM_CENTRO'];


                      echo utf8_encode('<option value="'.$CD_CENTRO.'">'.$NM_CENTRO.'</option>');
                    }
                   ?>
                </select>
                </div>

              <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control" rows="3" placeholder="Descrição ..." name="descricao" required></textarea>
              </div>

              <div class="form-group">
                <label>Link da Vaga (Não Obrigatório)</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-link"></i>
                  </div>
                  <input type="text" class="form-control" name="link">
                </div>
              </div>

              <div class="form-group">
                  Selecione uma imagem (Não Obrigatório): <input name="foto_vaga" type="file"/>
              </div>

              <?php
                 echo '<input type="hidden" name="autor" value="'.$_SESSION['cnpj'].'">';
              ?>

              <div class="form-group">
                <input type="submit" name="btn" value="ENVIAR" class="btn btn-success" style="float: right; border-radius: 5px;">
              </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
      	<div class="col-md-12">
      		<div class="box box-primary">
      			<div class="box-header width-border">
                    <h3 class="box-title">Suas Vagas</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                	<tr>
                      <th>CENTRO</th>
                      <th>DESCRIÇÃO</th>
                      <th>LINK</th>
                  </tr>

                    <?php
                    require ('conn.php');
        			mysql_select_db('estagios');
        			$cnpj = $_SESSION['cnpj'];
        			$busca_vagas = mysql_query("SELECT * FROM vagas_estagios WHERE autor LIKE '$cnpj'");

        			while($array = mysql_fetch_array($busca_vagas)){
        				$cd_centro = $array['CD_CENTRO'];
        				$busca_centro = mysql_query("SELECT * FROM centros WHERE CD_CENTRO LIKE '$cd_centro'");
        				$array2 = mysql_fetch_array($busca_centro);
        				echo utf8_encode('<tr>
        					<td>'.$array2['NM_CENTRO'].'</td>
        					<td style="text-align: justify;">'.$array['descricao'].'</td>
        					<td>'.$array['link'].'</td>
        				</tr>');
        			}
                    ?>
                </table>
            	</div>
             </div>
      	</div>
    </div>
      <!-- /.row -->
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
