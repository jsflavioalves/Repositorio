<?php
require ('pages/conn.php');
mysql_select_db('estagios');

session_start();
$siape=$_SESSION['siape'];

$consultar=mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape'");
$result=mysql_num_rows($consultar);

if ($result == 0) {
  header('location:http://www.estagios.ufc.br/siges/public_html/');
}

$linha=mysql_fetch_array($consultar);
$id_professor = $linha['id_professor'];
$nome_prof = utf8_encode($linha['nome']);
$input = $linha['nome']; list($nome, $surname) = explode(' ', $input, 2);
$input2 = $surname; list($nome2, $surname2) = explode(' ', $input2, 2);
$siape = $linha['siape'];
$fone = $linha['fone'];
$email = $linha['email'];
$lotacao = $linha['lotacao'];
$cpf = $linha['cpf'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Ações TCC</title>
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

  <!-- AUTOCOMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="Stylesheet" />
  <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>

  <!--
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  -->

  <script>
    function completar_TCC(){
      $(document).ready(function()
    {
      $('#emp').autocomplete(
      {
        source: "search_completa_tcc.php",
        minLength: 1
      });

    });
    }
    function complete_tcc(){
      $(document).ready(function()
    {
      $('#tcc').autocomplete(
      {
        source: "search_complete_tcc.php",
        minLength: 1
      });

    });
    }
    function complete_tcc2(){
      $(document).ready(function()
    {
      $('#tcc2').autocomplete(
      {
        source: "search_complete_tcc.php",
        minLength: 1
      });

    });
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
      <?php include 'barra_topo_index.php'; ?>
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
          <p><?php echo utf8_encode($input); ?></p>
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

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <section class="content">
              <div class="col-md-6">
              <!-- FORMULÁRIO PARA CONSULTAR TERMOS COLETIVOS-->
              <div class="box box-primary ">
                <div class="box-header with-border">
                  <h3 class="box-title">Consultar TCC</h3>
                
                      <div class="box-body">
                        <div class="form-group" id="btn" style="display: block;">
                            <form action="busca_tcc.php" method="POST">
                              <div class="form-group" id="pesquisa">
                                  <div class="input-icon right" id="busca">
                                      
                                      <!-- INPUT QUE RECEBE O CÓDIGO DO TCC-->
                                        <div class="col-md-12">
                                          <label>Código TCC</label>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                              <input type="text" name="cd_tcc" id="tcc" placeholder="Codigo do TCC" onkeyup="complete_tcc()" class="form-control" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                         
                                        <!-- BOTÃO DE CONSULTA -->
                                          <button type="submit" class="btn btn-block btn-primary" name="btntcc2" style="float: right; display:block;">Consultar</button>
                                        </div>
                                    
                                  </div>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- FORMULÁRIO PARA EXCLUSÃO DE TERMOS COLETIVOS -->
              <div class="box box-primary ">
                <div class="box-header with-border">
                  <h3 class="box-title">Excluir TCC</h3>
                      <div class="box-body">
                        <div class="form-group" id="btn" style="display: block;">
                            <form action="deleta_tcc.php" method="POST">
                              <div class="form-group" id="pesquisa">
                                  <div class="input-icon right" id="busca">
                                      
                                      <!-- INPUT QUE RECEBE O CÓDIGO DO TCC PRA SUA EXCLUSÃO -->
                                        <div class="col-md-12">
                                          <label>Código TCC</label>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                              <input type="text" name="cd_tcc_del" id="tcc2" placeholder="Codigo do TCC" onkeyup="complete_tcc2()" class="form-control" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                         
                                        <!-- BOTÃO DE EXCLUSÃO -->
                                          <button type="submit" class="btn btn-block btn-danger" name="btntccdel" style="float: right; display:block;">Excluir</button>
                                        </div>
                                    
                                  </div>
                              </div>
                            </form>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     
    <strong>Copyright © 2017 - <a href="http://www.ufc.br">UFC</a> - Agência de Estágios | Todos os direitos reservardos</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script> -->
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
<!-- MÁSCARAS -->
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











