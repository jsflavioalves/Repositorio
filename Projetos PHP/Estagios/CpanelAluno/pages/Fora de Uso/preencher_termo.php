<?php
require ('conn.php');
mysql_select_db('estagios');

@session_start();

$s_matricula=$_SESSION['sesaomatricula'];

$consultar=mysql_query("SELECT * FROM alunos where matricula like '$s_matricula'");
$result=mysql_num_rows($consultar);

if ($result == 0) {header('location:http://www.estagios.ufc.br/siges/public_html/');}
session_start();
$linha=mysql_fetch_array($consultar);
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y');
$id_aluno = $linha['id_aluno'];
$nome_aluno = $linha['nome'];
$cpf = $linha['cpf'];
$curso = $linha['curso'];
$email = $linha['email'];
$telefone = $linha['telefone'];
$endereco = $linha['endereco'];
$nome_mae = $linha['nome_mae'];
$matricula = $linha['matricula'];
$cidade = $linha['cidade'];
$uf = $linha['uf'];

list($nome, $nome2, $nome3) = explode(' ', $nome_aluno);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Termo de Compromisso Obrigatorio</title>
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
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="../../CpanelAdm/pages/forms/css/jquery-ui-1.8.5.custom.css" rel="Stylesheet" />
  <script src="../../CpanelAdm/pages/forms/js/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="../../CpanelAdm/pages/forms/js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="../../CpanelAluno/dist/js/funcs_tceo.js"></script>
  <script type="text/javascript" src="../../CpanelAluno/dist/js/mascaras.js"></script>
  <script type="text/javascript" src="../../CpanelAluno/dist/js/divsOcultas.js"></script>
  <!--<script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
  </script> -->
  <script type="text/javascript">function direct(){alert('SEU TERMO FOI ENVIADO COM SUCESSO PARA CONFIRMAÇÃO!'); setTimeout("window.location='tceo.php',100000"); }</script>
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
          <p style="font-size: 15px; margin-bottom: 2px;"><?php echo utf8_encode($nome.' '.$nome2.'<br>'.$nome3); ?></p>
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
    <section class="content">
      <!-- Small boxes (Stat box) -->
<div class="row">
        <div class="col-md-12">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <center>
                  <i class="fa fa-warning"></i>
                  <h3 class="box-title">INFORME OS DADOS ABAIXO:</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <form action="gerar_pdf_termo.php" method="POST" target="_blank">
              <div class="box-body">
                <div class="col-md-12">
                  <label>Dados da Unidade Concedente:</label>
                </div>

                <div class="col-md-12" class="form-group">
                  <div class="input-icon right">
                    <input  type="text" name="representante" placeholder="Representante Legal" class="form-control" />   
                  </div>
                </div>

                <div class="col-md-6" class="form-group">
                  <div class="input-icon right">
                    <br>
                    <input  type="text" name="cidade" placeholder="Cidade - UF" class="form-control" />
                  </div>
                </div>
                    
                <div class="col-md-12">
                  <br>
                  <label>Dados do Aluno:</label>
                </div>

                <div class="col-md-12" class="form-group">
                  <div class="input-icon right">
                    <input  type="text" name="semestre" placeholder="Semestre Atual" class="form-control" />   
                  </div>
                </div>

                <div class="col-md-12">
                  <br>
                  <label>Dados sobre o Estágio:</label>
                </div>

                <div class="col-md-12" class="form-group">
                  <div class="input-icon right">
                    <input  type="text" name="supervisor" placeholder="Supervisor" class="form-control" />   
                  </div>
                </div>

                <div class="col-md-12" class="form-group">
                  <div class="input-icon right">
                    <br>
                    <input  type="text" name="meses" placeholder="Meses Estagiando" class="form-control" />   
                  </div>
                </div>

                <div class="col-md-12">
                  <br>
                  <label>Dados do Professor Orientador:</label>
                </div>

                <div class="col-md-12" class="form-group">
                  <div class="input-icon right">
                    <input  type="email" name="email" placeholder="E-mail (Campo não Obrigatório)" class="form-control"/>   
                  </div>
                </div>

                <div class="col-md-6" class="form-group">
                  <div class="input-icon right">
                    <br>
                    <input  type="text" id="fone" name="fone" placeholder="Telefone" class="form-control" onkeypress="telefone(this)" maxlength="15"/>   
                  </div>
                </div>

                <div class="col-md-6" class="form-group">
                  <div class="input-icon right">
                    <br>
                    <input  type="text" name="lotacao" placeholder="Lotação" class="form-control" />   
                    <br>
                  </div>
                </div>
               
                <?php
                  session_start();
                  $_SESSION['id_termo_compromisso'] = $_POST['id_termo_compromisso'];
                  echo '<input type="hidden" name="id_termo_compromisso" value="'.$_SESSION['id_termo_compromisso'].'">';
                ?>
                
                <input type="submit" name="btn" value="ENVIAR" class="btn btn-success" style="margin-left: 450px; margin-bottom: 10px; border-radius: 5px;">
                </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
            
        </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
    $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
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
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mrg(v){
  v=v.replace(/\D/g,'');
  v=v.replace(/^(\d{2})(\d)/g,"$1.$2");
  v=v.replace(/(\d{3})(\d)/g,"$1.$2");
  v=v.replace(/(\d{3})(\d)/g,"$1-$2");
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
<!-- jQuery 2.2.0 -->
 <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script> 
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
