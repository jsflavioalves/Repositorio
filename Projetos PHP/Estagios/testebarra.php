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

  <script type="text/javascript">

    function mostrar() {
      var mudar = document.getElementById("curso").style.display = 'block';
      var mudar = document.getElementById("centro").style.display = 'block';
      var mudar = document.getElementById("cursobtn2").style.display = 'block';

      

    }
    function completarcurso() {
          
        
            $(document).ready(function(){
              $('#curso').autocomplete(
              { 
                source: "search_atual_curso.php",
                minLength: 1,
                delay: 0
              });

            });
        
        }


  </script>
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
</head>



<body class="hold-transition skin-blue sidebar-mini">
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
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
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <!--<div class="col-md-8">-->
            <section class="content">
      <!--PARTE DA PAGINA QUE INSERE CURSO NOVO E CENTRO QUE BASTA APENAS SELECIONAR-->
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Inserir Novo Curso</h3>
        </div>
        <!-- /.box-header -->
      
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            <form action="inserir_curso.php" method="POST">
              <div class="form-group">
                <label>Nome do Curso</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-plus"></i>
                  </div>
                  <input type="text" class="form-control" name="curso" style="text-transform:uppercase" placeholder="Nome do curso">
                </div>
                <!-- /.input group -->
              </div>
              <!--SELECT QUE E USADO PARA SELECIONAR UM CENTRO QUANDO VAI SER CADASTRADO UM NOVO CURSO-->
              <!-- /.form group -->
              <div class="form-group">
                <label>Centro</label>
                <select class="form-control select2" style="width: 100%;" name="id_centro">
                  <?php 
                    require('../../../conn.php');

                    $consulta = mysql_query("SELECT * FROM centros");
                    echo $result = mysql_num_rows($consulta);

                    while ($sql = mysql_fetch_array($consulta)) {
                      $CD_CENTRO = $sql['CD_CENTRO'];
                      $NM_CENTRO = $sql['NM_CENTRO'];

                      echo utf8_encode('<option value="'.$CD_CENTRO.'">'.$NM_CENTRO.'</option>');
                    }
                   ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary pull-right" nome="curso">Inserir</button>
              </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Atualizar Curso</h3>
        </div>
        <!-- /.box-header -->
      <!--PARTE USADA PARA ATUALIZAR QUALQUER CURSO QUE CONSTAR NA TABELA DE CURSOS BASTA CONSULTAR E APRECERA POR MEIO DE PESQUISA COM AUTOCOMPLETE-->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            <form action="atualizar_curso_novo.php" method="POST">
              <div class="form-group">
                <label>Escolha um curso para atualizar</label>
              </div>
                        <input id="curso" name="curso" onkeypress="completarcurso();" type="text" style="text-transform:uppercase" placeholder="Nome do Curso" class="form-control" /></br>

                        <button type="submit" class="btn btn-primary pull-right" name="cursobtn" style="float: right; display:block;">Atualizar</button>
            </div>
            </form>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Excluir Curso</h3>
        </div>
        <!-- /.box-header -->
      <!--PARTE QUE IRA EXCLUIR UM CURSO DE ACORDO COM A ESCOLHA-->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
               <label>Escolha um curso para excluir</label>
                <form action="deleta_curso.php" method="POST">
                <select class="form-control select2" name="CD_CURSO" style="width: 100%;">
                  <?php 
                    require('../../../conn.php');

                    $consulta = mysql_query("SELECT * FROM cursos");
                    echo $result = mysql_num_rows($consulta);

                    while ($sql = mysql_fetch_array($consulta)) {
                      $CD_CURSO = $sql['id_curso'];
                      $NM_CURSO = $sql['curso'];
                      $CD_CENTRO = $sql['id_centro'];

                      echo utf8_encode('<option value="'.$CD_CURSO.'">'.$NM_CURSO.'</option>');
                    }
                   ?>
                </select>
              </div>
                <button type="submit" class="btn btn-danger pull-right">Excluir</button>
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      
      </div>
      </div>

      <!-- /.box -->
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
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
	window.onload = function(){
	var entidade = document.getElementById('imagem');
  	var ampliar = document.getElementById('ampliar');
  	var diminuir = document.getElementById('diminuir');

  	// Altere o número para a apliação/redução desejada
  	var fator_lupa = 2;
  	ampliar.onclick = function () { entidade.style.width = (this.clientWidth * fator_lupa) + "px"; };

  	var fator_lupa = 2;
  	diminuir.onclick = function () { entidade.style.width = (this.clientWidth / fator_lupa) + "px"; };

  
}

	</script>
</head>
<body>
	<img src="vagas_foto/UFC.png" id="imagem">
	<button id="ampliar">AMPLIAR</button>
	<button id="diminuir">DIMINUIR</button>
</body>
</html>