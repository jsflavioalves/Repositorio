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
  <title>Agência de Estágio | Empresas Conveniadas</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="../../dist/js/mascaras.js"></script>

      <script>
      function processo2 (mask) {
          if (mask.value.length == 6) {
              mask.value = mask.value+'/';
          };
          if (mask.value.length == 9) {
              mask.value = mask.value+'-';
          };
      }

      function data3(conv) {
          if (conv.value.length == 2) {
              conv.value = conv.value+'/';
          };
          if (conv.value.length == 5) {
              conv.value = conv.value+'/';
          };
      }
    function siim() {
      var mudar = document.getElementById("conteudo").style.display = 'block';
      var mudar = document.getElementById("busca").style.display = 'none';
      var mudar = document.getElementById("nome").style.display = 'none';
      var mudar = document.getElementById("dasinp").style.display = 'block';
      var mudar = document.getElementById("nome1").style.display = 'none';
      var mudar = document.getElementById("div_teste1").style.display = 'block';

    }
    function mostrar_salvar() {
  var mudar = document.getElementById("mostrar_div4").style.display = 'block';
    }
    function btn(){
      var mudar = document.getElementById("mostrar_div4").style.display = 'block';  
    }
    function btn2(){
      var mudar = document.getElementById("btn2").style.display = 'block';  
    }
    function btn3(){
      var mudar = document.getElementById("dasinp").style.display = 'none';
      var mudar = document.getElementById("btn3").style.display = 'block';  
    }
    function divConv_and() {
      var mudar = document.getElementById("tabela").style.display = 'none';
    }
  // </script>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONVÊNIOS EM ANDAMENTO</h3>
              <div class="input-group input-group-sm" style="width: 150px; float:right;">
                <!-- FUNÇÃO (funcs_Conv_and.js) E BUSCA (busca_Conv_and.php) -->
                <input id="inputName1" onclick="divConv_and();" onkeyup="buscarNoticias_Conv_and(this.value)" type="text" placeholder="PROCURAR" class="form-control" />
                <div class="input-group-btn" id="conteudo_Conv_and" onclick="divConv_and();">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div><br>
            </div>
              <div id="resultado_Conv_and"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="tabela" style="display: block;" >
              <table class="table table-hover">
                <tr>
                  <th>Data de Abertura de Processo</th>
                  <th>Processo</th>
                  <th>Interessado</th>
                  <th>Saida P/ Procuradoria</th>
                  <th>Retorno da Procuradoria</th>
                  <th>Saida P/ PREX</th>
                  <th>Retorno da PREX</th>
                  <th>Pendência</th>
                  <th>Ação</th>
                </tr>
                <?php 
                  require('../../../conn.php');

                  $consulta = mysql_query("SELECT * FROM convenios_andamento WHERE retorno_prex = ' ' or (retorno_prex != ' ' and pendencia != ' ') ORDER BY id_convenios_andamento DESC");

                  while($sql = mysql_fetch_array($consulta)){
                    $dt_abertura = $sql['dt_abertura'];
                    $processo = $sql['processo'];
                    $interessado = $sql['interessado'];
                    $saida_procuradoria = $sql['saida_procuradoria'];
                    $retorno_procuradoria = $sql['retorno_procuradoria'];
                    $saida_prex = $sql['saida_prex'];
                    $retorno_prex = $sql['retorno_prex'];
                    $pendencia = $sql['pendencia'];
                    $id_convenios_andamento = $sql['id_convenios_andamento'];

                    echo utf8_encode('<tr>
                            <td>'.$dt_abertura.'</td>
                            <td>'.$processo.'</td>
                            <td>'.$interessado.'</td>
                            <td>'.$saida_procuradoria.'</td>
                            <td><label id="ret_proc_nome">'.$retorno_procuradoria.'</label><input type="hidden" value="'.$retorno_procuradoria.'" class="form-control" name="retorno_procuradoria" id="retorno_procuradoria" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="sai_prex_nome">'.$saida_prex.'</label><input type="hidden" value="'.$saida_prex.'" class="form-control" name="saida_prex" id="saida_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="ret_prex_nome">'.$retorno_prex.'</label><input type="hidden" value="'.$retorno_prex.'" class="form-control" name="retorno_prex" id="retorno_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="pendencia_nome">'.$pendencia.'</label><input type="hidden" value="'.$pendencia.'" class="form-control" name="pendencia" id="pendencia" onclick="editar();"></td>
                          </tr>');
                  }

                 ?>
                <tr>
                  <form action="inserir_conv_and.php" method="POST">
                  <td><input type="text" class="form-control" name="dt_abertura" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required></td>
                  <td><input type="text" id="mask" onkeypress="processo2(mask)" maxlength="12" class="form-control" name="processo" required></td>
                  <td><input type="text" class="form-control" name="interessado" required></td>
                  <td><input type="text" class="form-control" name="saida_procuradoria" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required></td>
                  <td><input type="text" class="form-control" name="retorno_procuradoria" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="saida_prex" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="retorno_prex" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="pendencia"></td>
                  <td><button type="submit" class="btn btn-block btn-primary">Inserir</button></td>
                  </form>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Atualizar Andamento de Convênio</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group" id="btn3" style="display: block;">

                  <div class="form-group" id="pesquisa">
                            <div class="input-icon right" id="busca">
                            <!-- FUNÇÃO (funcs_conv_and.js) E BUSCA (busca_conv_and.php) -->
                                <input id="inputName" onkeyup="buscarNoticias(this.value)" type="text" placeholder="Nome do Interessado" class="form-control" />
                            </div>
                            
                            <div id="resultado"></div>
                        </div>
                        <div id="conteudo" onclick="siim();" style="display:none">
                        </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Excluir Convênio</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group" id="ok_conv" style="display: block;">

                  <div class="form-group" id="pesquisa1">
                            <div class="input-icon right" id="busca1">
                            <!-- FUNÇÃO (funcs_conv_and_ok.js) E BUSCA (busca_conv_and_ok.php) -->
                                <input id="inputName" onkeyup="buscarNoticias1(this.value)" type="text" placeholder="Nome do Interessado" class="form-control" />
                            </div>
                            
                            <div id="resultado1"></div>
                        </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
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

<script src="../../dist/js/funcs_Conv_and.js"></script>
<!-- Page script -->
<script src="../../dist/js/funcs_conv_and.js"></script>

<script src="../../dist/js/funcs_conv_and_ok.js"></script>

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
  