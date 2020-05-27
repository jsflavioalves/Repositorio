<!DOCTYPE html>
<html lang="pt-br">
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="Creative One Page Parallax Template">
  <meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" /> 
  <meta name="author" content=""> 
  <title>UFC - Agência de Estágios</title> 
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet"> 
  <link href="css/animate.css" rel="stylesheet"> 
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="css/modal.css">
  <script language="JavaScript" type="text/javascript" src="js/MascaraValidacao.js"></script> 

  <link rel="stylesheet" href="CpanelAluno/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="CpanelAluno/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="CpanelAluno/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="CpanelAluno/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="CpanelAluno/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="CpanelAluno/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="CpanelAluno/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="CpanelAluno/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="CpanelAluno/dist/css/skins/_all-skins.min.css">


  <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 

  <script src="js/respond.min.js"></script> <![endif]--> 
  <link rel="shortcut icon" href="images/ico/icon.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png"> 
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link href="css/style2.css" rel="stylesheet">

  <!-- CSS DO ASSETS -->

    <link href="assets/css/material-kit.css" rel="stylesheet"/>
  <link href="assets/css/demo.css" rel="stylesheet" />


  <link rel="stylesheet" href="assets/css/neon-theme.css">

  <script src="assets/js/jquery-1.11.0.min.js"></script>

    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>

    <link rel="stylesheet" type="text/css" href="styles/main.css">

    <script type="text/javascript">
    function divConv_and() {
      var mudar = document.getElementById("tabela").style.display = 'none';
    }
  </script>
  <script>
    function cont(){
       var conteudo = document.getElementById('print').innerHTML;
       tela_impressao = window.open('about:blank');
       tela_impressao.document.write(conteudo);
       tela_impressao.window.print();
       tela_impressao.window.close();
    }
  </script>
</head><!--/head-->
<body>
  <div class="preloader">
    <div class="preloder-wrap">
      <div class="preloder-inner"> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div>
      </div>
    </div>
  </div><!--/.preloader-->
  <header id="navigation"> 
    <div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
      <div class="container"> 
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
          </button> 
          <a href="index.php" class="imglogo"><h1><img src="images/logo.png" alt="logo" class="img"></h1></a> 
        </div> 
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav navbar-right"> 
            <li class="scroll"><a href="index.php">Inicio</a></li>
          
            <!-- <li class="scroll"><a href="#services">Serviços</a></li> -->  
            <li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Agência<b class="caret"></b></a>
                        <ul class="dropdown-menu">
            <li class="scroll"><a href="sobre.php">sobre</a></li> 
            <li class="scroll"><a href="legislacao.php">Legislação</a></li> 
                        <li><a href="tds_convenio.php">Empresas Convêniadas</a></li>
                  </ul>
            </li> 

            <li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Termos<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                        <li><a href="termo_convenio.php">Termos de Convênio</a></li>
                        <li><a href="ajuda_convenio.php">faqs - convênio</a></li>
                        <li class="divider"></li>
                        <li><a href="termo_estagio.php">Termo de compromisso</a></li>
                            <li><a href="termo_aditivo.php">Termo Aditivo</a></li>
                            <li><a href="termo_coletivo.php">Termo Coletivo</a></li>
                            <li><a href="ajuda_estagio.php">faqs - estágio</a></li>
                      

                  </ul>
            </li> 
            <li class="scroll"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                        <li><a href="validar_declaracao.php">Validar Declaração</a></li>
                        <li><a href="prof_orientador.php">Professor Orientador</a></li>
                        <!-- <li class="divider"></li>
                        <li><a href="termo_estagio.php">Termo de compromisso</a></li>
                            <li><a href="termo_aditivo.php">Termo Aditivo</a></li>
                            <li><a href="termo_coletivo.php">Termo Coletivo</a></li>
                            <li><a href="ajuda_estagio.php">faqs - estágio</a></li> -->
                      

                  </ul>
            </li>    
            <li class="scroll"><a href="index.php#blog">Oferta de estágios</a></li>
            <li class="scroll"><a href="index.php#contact">Contato</a></li>

            

          </ul> 
        </div> 
      </div> 
    </div><!--/navbar--> 
  </header> <!--/#navigation--><br><br><br><br><br><br>
  <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONVÊNIOS EM ANDAMENTO</h3>              
              <div class="input-group input-group-sm" style="width: 150px; float:right;">
                <input type="button" onclick="cont();" value="Imprimir Div separadamente">
              </div><br>
            </div>
            <div id="resultado_Conv_and"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="tabela" style="display: block;" >
              <table class="conteudo" id="print" style="color:#000000">
                <tr>
                  <th></th>
                  <th>NOME DA EMPRESA</th>
                  <th>DATA DE INICIO</th>
                  <th>DATA FINAL</th>
                </tr>
                <?php 
                  require('CpanelAluno/pages/conn.php');
                  mysql_select_db('estagios');

                  //CONSULTA TODOS OS CONVENIOS EM ANDAMENTO
                  $consulta = mysql_query("SELECT * FROM empresas ORDER BY nome ASC");

                  while ($sql = mysql_fetch_array($consulta)) {
                  $nome = $sql['nome'];
                  $agt_int = $sql['AGENTE_INTEGRADOR'];
                  $CD_EMPRESA = $sql['CD_EMPRESA'];

                  $sql1 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$CD_EMPRESA' ORDER BY CD_CONVENIO DESC");

                  $noticias1 = mysql_fetch_array($sql1);
                  $dt_inicio=$noticias1['dt_inicio'];
                  $data_fim=$noticias1['dt_fim'];

                  setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  $dia = strftime('%d', strtotime('today'));
                  $mes = strftime('%m', strtotime('today'));
                  $ano = strftime('%Y', strtotime('today'));

                  //DIVIDE A DATA FINAL DE ESTÁGIO EM DIA MÊS E ANO
                  $dia_final = substr($data_fim, 0, 2);
                  $mes_final = substr($data_fim, 3, 2);
                  $ano_final = substr($data_fim, 6, 4);

                  // if ($agt_int!=null) {
                  //   $pdf->Cell(500,15,ucfirst($sql['nome']),1,0,'L',1); 
                  //   $pdf->Cell(280,15,$sql['AGENTE_INTEGRADOR'],1,1,'C',1);
                  // }
                  if ($ano < $ano_final) {
                    echo '<tr>
                            <td></td>
                            <td>'.$sql['nome'].'</td>
                            <td>'.$dt_inicio=$noticias1['dt_inicio'].'</td>
                            <td>'.$data_fim=$noticias1['dt_fim'].'</td>
                          </tr>';     
                  } 
                  if ($ano_final == $ano and $mes > $mes_final) {     
                    echo '<tr>
                            <td></td>
                            <td>'.$sql['nome'].'</td>
                            <td>'.$dt_inicio=$noticias1['dt_inicio'].'</td>
                            <td>'.$data_fim=$noticias1['dt_fim'].'</td>
                          </tr>';  
                  } 
                  if ($ano == $ano_final and $mes == $mes_final and $dia > $dia_final) {
                    echo '<tr>
                            <td></td>
                            <td>'.$sql['nome'].'</td>
                            <td>'.$dt_inicio=$noticias1['dt_inicio'].'</td>
                            <td>'.$data_fim=$noticias1['dt_fim'].'</td>
                          </tr>';       
                  }
                  }
                 ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  <footer id="footer"> 
    <div class="container"> 
      <div class="text-center"> 
        <p>Copyright &copy; 2016 - <a href="http://ufc.br">UFC</a> - Agência de Estágio | Todos os direitos reservados</p> 
      </div> 
    </div> 
  </footer> <!--/#footer--> 

  <script src="funcs_Conv_and.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script> 
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
  <script type="text/javascript" src="js/jquery.parallax.js"></script> 
  <script type="text/javascript" src="js/main.js"></script>  
  <script type="text/javascript" src="js/modal.js"></script>

  <!-- jQuery 2.2.0 -->
<script src="CpanelAluno/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="CpanelAluno/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="CpanelAluno/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="CpanelAluno/plugins/input-mask/jquery.inputmask.js"></script>
<script src="CpanelAluno/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="CpanelAluno/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="CpanelAluno/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="CpanelAluno/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="CpanelAluno/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="CpanelAluno/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="CpanelAluno/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="CpanelAluno/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="CpanelAluno/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="CpanelAluno/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="CpanelAluno/dist/js/demo.js"></script>

  <script src="assets/js/jquery.nestable.js"></script>


  
</body>
</html>