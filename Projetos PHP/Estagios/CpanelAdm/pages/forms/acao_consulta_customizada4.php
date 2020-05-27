<?php 
require('../../../conn.php');
mysql_select_db('estagios');
session_start();
  $matricula = $_SESSION['sesaomatricula'];
  $cpf = $_SESSION['sesaocpf'];

  $sesao=mysql_query("SELECT*FROM usuarios_agencia where login like '$matricula' and senha like '$cpf'");
  $resulti=mysql_num_rows($sesao);

  if($resulti==0){header('location:http://www.estagios.ufc.br/siges/public_html/');}
  
  $sql=mysql_fetch_array($sesao);
  $nome=$sql['nome'];
  $funcao=$sql['funcao'];
  $foto=$sql['perfil'];

   ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UFC - Agência de Estágio</title>
  <link rel="shortcut icon" href="images/ico/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

   <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

  <link type="text/css" href="jquery-ui-1.8.5.custom.css" rel="stylesheet" />
  <script src="jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
     <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../brasao.png"></span>
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
          <img src="perfil/<?php echo $foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include 'barra_menu.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      	<div class="row">
      		<div class="col-md-2"></div>
        	<div class="col-md-8">
          		<section class="content">
          			<center>
<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$opt = $_POST['opt'];

if($opt == "emp_cnpj"){

	
	// Criamos uma tabela HTML com o formato da planilha
	echo '<table border="2">';
	echo '<tr>';
	echo '<td colspan="1" style="color:green;"><center><b>Relatório - Relação Empresas sem CNPJ</b></center></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="width:580px; text-align:center;"><b>Empresas</b></td>';
	echo '</tr>';

	$x = "";
	$busca_empresas = mysql_query("SELECT * FROM empresas WHERE cnpj = '$x' ORDER BY nome ASC");
	$conta = mysql_num_rows($busca_empresas);
		while($array1 = mysql_fetch_array($busca_empresas)){
			echo '<tr>';
			echo '<td style="padding-left:4px;">'.utf8_encode($array1['nome']).'</td>';
			echo '</tr>';
		}
		
		echo '<tr></tr>';
		echo '<td  style="text-align:center;"><b>Total - </b><b  style="color: red;">'.$conta.'</b></td>';
		echo '</table>';
		

/////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "emp_duplicadas"){
	
	
		// Criamos uma tabela HTML com o formato da planilha

		echo '<table border="1">';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Empresas com o CNPJ Duplicado</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:150px; text-align:center;"><b>CNPJ Duplicado</b></td>';
		echo '<td style="width:580px; text-align:center;"><b>Empresas</b></td>';
		echo '</tr>';
		
		$busca1 = mysql_query("SELECT cnpj, Count(*) FROM empresas GROUP BY cnpj HAVING Count(*) > 1");
		$conta = mysql_num_rows($busca1);
	
		while($array = mysql_fetch_array($busca1)){
			$cnpj = $array['cnpj'];
			$qtd = $array['Count(*)'];

			if($cnpj == ""){
				$conta =  $qtd - $conta;
			} else{			
			$busca_nome = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");
			$contar = mysql_num_rows($busca_nome);

				echo '<tr>';
				echo '<th rowspan="'.($contar+1).'" style="text-align:center;" ><b>'.$cnpj.'</b></th>';
				echo '</tr>';

				while ($array2 = mysql_fetch_array($busca_nome)) {	
					$nome_empresa = utf8_encode($array2['nome']);
					echo '<tr>';
					echo '<td style="padding-left:4px;">'.$nome_empresa.'</td>';
					echo '</tr>';
				}
			}
		}

		echo '<tr></tr>';
		echo '<td style="text-align:center;"><b>Total<b></td>';
		echo '<td style="text-align:center; color:red;"><b>'.$conta.'</b></td>';
		echo '</table>';
		

///////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "conv_duplicados"){
	
	// Criamos uma tabela HTML com o formato da planilha
	echo '<table border="1">';
	echo '<tr>';
	echo '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Convênios Duplicados</b></center></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="width:300px; text-align:center;"><b>N° Processo Duplicado</b></td>';
	echo '<td style="width:100px; text-align:center;"><b>Subtotal</b></td>';
	echo '</tr>';
	
	
	$busca1 = mysql_query("SELECT NR_PROCESSO, Count(*) FROM termo_convenio GROUP BY NR_PROCESSO HAVING Count(*) > 1");
	$conta = mysql_num_rows($busca1);
	$total = "0";
	
	while($array = mysql_fetch_array($busca1)){
	
		$processo = $array['NR_PROCESSO'];
		$qtd = $array['Count(*)'];
		$total = $total+$qtd;

		$busca_processo = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$processo'");
		$conta = mysql_num_rows($busca_processo);				

			echo '<tr>';
			echo '<td style="text-align:center;">'.$processo.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			echo '</tr>';
	}
	
		echo '<tr></tr>';
		echo '<td style="text-align:center;"><b>Total<b></td>';
		echo '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
		echo '</table>';
		

//////////////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "alunos_duplicados"){
	
	// Criamos uma tabela HTML com o formato da planilha
	echo '<table border="1">';
	echo '<tr>';
	echo '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Alunos Duplicados</b></center></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>Matrícula</b></td>';
	echo '<td style="width:450px; text-align:center;"><b>Aluno</b></td>';
	echo '</tr>';

	
	$consulta = mysql_query("SELECT matricula, Count(*) FROM alunos GROUP BY matricula HAVING Count(*) > 1");
	$conta = mysql_num_rows($consulta);
	
	while($array = mysql_fetch_array($consulta)){
		$matricula = $array['matricula'];
	
			$consulta2 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
			$contar = mysql_num_rows($consulta2);

				echo '<tr>';
				echo '<th rowspan="'.($contar+1).'" style="text-align:center;"><b>'.$matricula.'</b></th>';
				echo '</tr>';

			while($array2 = mysql_fetch_array($consulta2)){
					if(utf8_encode($array2['nome'])  != ""){
						echo '<tr>';
						echo '<td style="padding-left:4px;">'.utf8_encode($array2['nome']).'</td>';
						echo '</tr>';
					}else{
						echo '<tr>';
						echo '<td style="padding-left:4px; color:red;">Registro sem Nome</td>';
						echo '</tr>';
					}
					
			}

	}
		echo '<tr></tr>';
		echo '<td style="text-align:center;"><b>Total<b></td>';
		echo '<td style="text-align:center;"><b style="color: red;">'.$conta.'</b></td>';
		echo '</table>';
		

}
	
?>
</center>
		  			</section>
				</div>
       		</div>
      	</div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recente atividades.</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Proximo Aniversario</h4>

                <p>Raynna - 22/04/2017</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cadastro de termo</h4>

                <p>Henrique Luiz - TCE (OBRIGATÓRIO).</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Email enviado</h4>

                <p>dora@example.com - resposta</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Declaração feita</h4>

                <p>Terminou estágio</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab"></div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configurações gerais</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              O uso do painel de relatório
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Algumas informações sobre esta opção de configurações gerais
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Permitir redirecionamento de correio
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Outros conjuntos de opções estão disponíveis
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expor o nome do autor em postos
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
             Permitir que o usuário para mostrar o seu nome nas postagens do blog
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Configurações de bate-papo</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Mostre-me como on-line
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Desligar notificações
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Excluir o histórico de bate-papo
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<!--<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>-->
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="../../dist/js/funcs_cursos.js"></script>
</body>
</html>