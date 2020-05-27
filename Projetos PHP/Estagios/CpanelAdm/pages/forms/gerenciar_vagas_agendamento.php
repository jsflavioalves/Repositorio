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
  <title>Agência de Estágio | Termo de Compromisso</title>
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

       
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="http://harvesthq.github.io/chosen/chosen.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>



  <script src="../../dist/js/onclick.js"></script>

<script type="text/javascript">
  function aparece_btn(){
    var muda = document.getElementById("confirmar").style.display='block';
  }
</script>

<script type="text/javascript">

// FUNCÃO PARA BUSCAR AS DATAS DISPONÍVEL NAQUELE MÊS
function gerenciarMes(valor) {

// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
var url = "acao_gerenciar_mes.php?valor="+valor;

// Chamada do método open para processar a requisição
req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {

  // Exibe a mensagem "Buscando Noticias..." enquanto carrega
  if(req.readyState == 1) {
    document.getElementById('resultado').innerHTML = 'Buscando...';
  }

  // Verifica se o Ajax realizou todas as operações corretamente
  if(req.readyState == 4 && req.status == 200) {

  // Resposta retornada pelo busca.php
  var resposta = req.responseText;

  // Abaixo colocamos a(s) resposta(s) na div resultado
  document.getElementById('resultado').innerHTML = resposta;
  }
}
req.send(null);
}

</script>
    
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
    <section class="content" id="cadastrar_aluno">
       <div class="col-md-2">
       </div>
      <!-- INSERIR VAGAS PARA AGENDAMENTO -->
      <div class="row">
        <div class="col-md-12">
        <div class="col-md-3"></div>
        <div class="col-xs-6">
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title" id="nome_empresa">Inserir vagas para Agendamento</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group" id="btn" style="display: block;">
                        <form action="#" method="POST">
                          <div class="form-group" id="pesquisa">
                              <div class="input-icon right" id="busca">
                                <div class="col-md-6">
                                  <p>Digite o Ano:</p>
                                  <center>
                                  <input type="text" name="ano" class="form-control">
                                  </center>
                                </div>
                                <div class="col-md-6">
                                  <p>Escolha o Mês:</p>
                                  <center>
                                  <select class="form-control" name="mes">
                                    <option value="01">Janeiro</option>
                                    <option value="02">Fevereiro</option>
                                    <option value="03">Março</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Maio</option>
                                    <option value="06">Junho</option>
                                    <option value="07">Julho</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                  </select>
                                  </center>
                                  <br>
                                </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                      <button type="submit" class="btn btn-block btn-primary" name="btn" style="float: right; display:block;">Inserir</button>
                                    </div>
                              </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

<?php
require ('../../../conn.php');
mysql_select_db('estagios');

if(isset($_POST['btn'])){
$meses = array(
      '1' => '01',
      '2' => '02',
      '3' => '03',
      '4' => '04',
      '5' => '05',
      '6' => '06',
      '7' => '07',
      '8' => '08',
      '9' => '09',
      '10' => '10',
      '11' => '11',
      '12' => '12'
   );
$dias = array(
      '1' => '01',
      '2' => '02',
      '3' => '03',
      '4' => '04',
      '5' => '05',
      '6' => '06',
      '7' => '07',
      '8' => '08',
      '9' => '09',
      '10' => '10',
      '11' => '11',
      '12' => '12',
      '13' => '13',
      '14' => '14',
      '15' => '15',
      '16' => '16',
      '17' => '17',
      '18' => '18',
      '19' => '19',
      '20' => '20',
      '21' => '21',
      '22' => '22',
      '23' => '23',
      '24' => '24',
      '25' => '25',
      '26' => '26',
      '27' => '27',
      '28' => '28',
      '29' => '29',
      '30' => '30',
      '31' => '31'
   );

$horas = array(
      '1' => '08:00',
      '2' => '08:20',
      '3' => '08:40',
      '4' => '09:00',
      '5' => '09:20',
      '6' => '09:40',
      '7' => '10:00',
      '8' => '10:20',
      '9' => '10:40',
      '10' => '11:00',
      '11' => '11:20',
      '12' => '11:40',
      '13' => '12:00',
      '14' => '12:20',
      '15' => '12:40',
      '16' => '13:00',
      '17' => '13:20',
      '18' => '13:40',
      '19' => '14:00',
      '20' => '14:20',
      '21' => '14:40',
      '22' => '15:00',
      '23' => '15:20',
      '24' => '15:40',
      '25' => '16:00',
      '26' => '16:20',
      '27' => '16:40',
      '28' => '17:00'
   );

$escolha_mes = $_POST['mes'];
$ano = $_POST['ano'];

  for($x = 1; $x <= 27; $x++){
    for($y = 1; $y <= 31; $y++){
      $a = $dias[$y];
      $c = $horas[$x];
      $inserir = mysql_query("INSERT INTO vagas_agend VALUES('', '$a', '$escolha_mes', '$ano', '$c', '3') ");
    }
  }

echo '<script> alert("Inserido com Sucesso!") </script>';
}   
?>
        
      </div>
      </div>
      <!-- FIM INSERIR VAGAS PARA AGENDAMENTO -->

      <!-- GERENCIAR MESES -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3"></div>
            <div class="col-xs-6">
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title" id="nome_empresa">Gerenciar meses</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group" id="btn" style="display: block;">
                          <div class="form-group" id="pesquisa">
                              <div class="input-icon right" id="busca">
                                <div class="col-md-12">
                                  <p>Escolha o Mês:</p>
                                  <center>
                                  <select class="form-control" name="mes">
                                    <option selected disabled>ESCOLHA O MÊS</option>
                                    <option value="01" onclick="gerenciarMes(this.value)">Janeiro</option>
                                    <option value="02" onclick="gerenciarMes(this.value)">Fevereiro</option>
                                    <option value="03" onclick="gerenciarMes(this.value)">Março</option>
                                    <option value="04" onclick="gerenciarMes(this.value)">Abril</option>
                                    <option value="05" onclick="gerenciarMes(this.value)">Maio</option>
                                    <option value="06" onclick="gerenciarMes(this.value)">Junho</option>
                                    <option value="07" onclick="gerenciarMes(this.value)">Julho</option>
                                    <option value="08" onclick="gerenciarMes(this.value)">Agosto</option>
                                    <option value="09" onclick="gerenciarMes(this.value)">Setembro</option>
                                    <option value="10" onclick="gerenciarMes(this.value)">Outubro</option>
                                    <option value="11" onclick="gerenciarMes(this.value)">Novembro</option>
                                    <option value="12" onclick="gerenciarMes(this.value)">Dezembro</option>
                                  </select>
                                  </center>
                                </div>
                                <div class="col-md-12">
                                    <div id="resultado"></div>
                                </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>

<?php
require ('../../../conn.php');
mysql_select_db('estagios');


?>
        
      </div>
      </div>
      <!-- FIM GERENCIAR MESES -->

    </section>         
    </div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0
    </div>
    <strong>Copyright &copy; 2018 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
  </footer>
</div>
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

<script src="../../dist/js/funcs_declaracao_aluno.js"></script>


<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 
<script>
  function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Esse é tão fácil que não merece explicações
    return v
}
function mhora(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1:$2");        
                                           
    return v;
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
    v=v.replace(/(\d{2})(\d)/,"$1/$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mrg(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/^(\d{10})(\d)/g,"$1-$2");
  return v;
}
function mcpf(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/(\d{9})(\d)/g,"$1-$2");
  v=v.replace(/(\d{6})(\d)/g,"$1.$2");
  v=v.replace(/(\d{3})(\d)/g,"$1.$2");
  return v;
}
function mfone(v){
  v=v.replace(/\D/g,"");
  v=v.replace(/(\d{6})(\d)/g,"$1$2-");
  v=v.replace(/^(\d{1})(\d)/g,"($1$2) ");
  return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
        
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}
           
function Verifica_Hora(v){ 
hrs = (document.forms[0].Hora.value.substring(0,2)); 
min = (document.forms[0].Hora.value.substring(3,5)); 
               
estado = ""; 
if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
estado = "errada"; 
} 
               
if (document.forms[0].Hora.value == "") { 
estado = "errada"; 
} 
 
if (estado == "errada") { 
alert("Hora inválida!"); 
document.forms[0].Hora.focus(); 
} 
}
</script>
</body>
</html>
