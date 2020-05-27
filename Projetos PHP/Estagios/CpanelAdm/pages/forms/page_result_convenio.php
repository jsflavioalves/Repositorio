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
  <script src="../../dist/js/divsOcultas.js"></script>
  <script src="../../dist/js/mascaras.js"></script>
  <script type="text/javascript">
    function processo10 (mask2) {
      if (mask2.value.length == 5) {
          mask2.value = mask2.value+'/';
      };
      if (mask2.value.length == 8) {
          mask2.value = mask2.value+'-';
      };
    }
    function conve2() {
      var mudar = document.getElementById("busca_convenio").style.display = 'none';
      var mudar = document.getElementById("nome2").style.display = 'none';
      var mudar = document.getElementById("dasinp2").style.display = 'block';
    }

  </script>
  <script type="text/javascript">function direct90(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/CpanelAdm/pages/forms/cadastro_empresas_convenio.php',10");}</script>
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
        <div class="col-md-12">
          <div class="col-md-1"></div>
          <div class="col-md-10">
          <!--<div class="col-md-8">-->
            <section class="content">
              <!-- SELECT2 EXAMPLE -->
              <div class="box box-primary">
                <div class="form-group">
                  <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Cadastrar Convênio</h3>
                  
<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
if(isset($_POST['btna'])){

$valor = utf8_decode($_POST['nome']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM empresas WHERE nome LIKE '$valor' or cnpj LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);

 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo utf8_encode('<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <br><label>Nome da Empresa:</label>
                  <input type="text" name="nome_empresa" class="form-control" value="'.$noticias->nome.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Endere&ccedilo:</label>
                  <input type="text" name="endereco" class="form-control" value="'.$noticias->endereco.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>CNPJ:</label>
                  <input type="text" name="cnpj" class="form-control" value="'.$noticias->cnpj.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Telefone:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="fone" class="form-control" value="'.$noticias->tel.'" disabled>
                </div>
              </div>
            </div>
          </div>
        ');
  echo '
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Convênios</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <form action="acao_inserir_empresa_convenio.php" enctype="multipart/form-data" method="POST">
                <table class="table table-hover">
                  <tr>
                    <th>Nº do Processo</th>
                    <th>Data de Início</th>
                    <th>Data Fim</th>
                    <th>Tipo de Convênio</th>
                    <th>Arquivo</th>
                    <th></th>
                  </tr>';

          $empresa = $noticias->CD_EMPRESA;
          $sql2 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$empresa'");
          while($noticias1 = @mysql_fetch_object($sql2)){

          echo '  <tr>
                    <td><input type="text" class="form-control" value="'.$noticias1->NR_PROCESSO.'" disabled></td>
                    <td><input type="text" class="form-control" value="'.$noticias1->dt_inicio.'" disabled></td>
                    <td><input type="text" class="form-control" value="'.$noticias1->dt_fim.'" disabled></td>
                    <td><input type="text" class="form-control" value="'.utf8_encode($noticias1->tipo_convenio).'" disabled></td>';

                    if($noticias1->arquivo == ""){
                    	echo'<td><input type="button" class="btn btn-secondary"" value="SEM ARQUIVO" style="width:100%;"></td>';
                    }else if($noticias1->arquivo != ""){
                      echo'<td><a href="convenio_pdf/'.$noticias1->arquivo.'"><input type="button" class="btn btn-success" value="'.$noticias1->arquivo.'" style="width:100%;"></a></td>';
                          }
                      }
                 echo' </tr>';
          echo '  <tr>
                    <td><input type="text" id="mask" onkeypress="processo2(mask)" maxlength="12" class="form-control" name="processo" required></td>
                    <td><input type="text" id="mascara" onkeypress="inserir_conv(mascara)" maxlength="10" class="form-control" name="dt_inicio" required></td>
                    <td><input type="text" id="mascara1" onkeypress="inserir_conv1(mascara1)" maxlength="10" class="form-control" name="dt_fim" required></td>
                    <td><select name="tipo_convenio" class="form-control">
                        <option value="CRUTAC">CRUTAC</option>
                        <option value="RECÍPROCO">RECÍPROCO</option>
                        <option value="CONVÊNIO">CONVÊNIO</option>
                        <option value="OBRIGATÓRIO">OBRIGATÓRIO</option>
                    </select></td>
                     <td><input name="pdf" class="realupload" type="file" id="arquivo_file" accept=”image/*”/></td>
                    <input type="hidden" class="form-control" name="id_empresa" value="'.$noticias->CD_EMPRESA.'">
                  </tr>';
          echo '</table>
                 
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-left">Inserir</button>
                  <a href="cadastro_empresas_convenio.php"><button type="button" class="btn btn-danger pull-right">Cancelar</button></a>
                  </div>
              </form>
            </div>
          </div>
       ';
}
if ($resulatdo == 0) {
    echo utf8_decode('
               <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">Nenhum Registro Encontrado.</font></p>
               <button type="button" onclick="direct90()" class="btn btn-danger pull-right">Cancelar</button></a>
               </div>');
  } 

 }



// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>                    </div>
                    </div>
                  </div>
                </div>
                 </section>
              </div>
              <!-- /.box -->
            </div>
          </div>
        </div>
      </div>
   

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
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
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

  <script src="../../dist/js/funcs_convenio.js"></script>

<script src="../../dist/js/funcs_processo.js"></script>


<!-- Page script -->
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