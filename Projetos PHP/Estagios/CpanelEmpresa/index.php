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
      <?php include 'pages/barra_menu_index.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--página principal da parte das empresas, aqui a empresa terá a possibilidade de fazer alterações nas suas informações cadastradas quando ocorreu o cadastro-->
  <!--aqui também irá mostrar se a empresa tem convênio com a UFC-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-info">
            <h4>SEUS CONVÊNIOS</h4>
          </div>
          <?php
// Incluir aquivo de conexão

// Procura titulos no banco relacionados ao valor
$sql0 = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj' ORDER BY CD_EMPRESA ASC");

$resulatdo = mysql_num_rows($sql0);


// Exibe todos os valores encontrados
if($resulatdo != 0){
   
    while($noticias0 = mysql_fetch_array($sql0)){

       $agt_int=utf8_encode($noticias0['AGENTE_INTEGRADOR']);
       $nome=utf8_encode($noticias0['nome']);
       $CD_EMPRESA=$noticias0['CD_EMPRESA'];
       $CNPJ=$noticias0['cnpj'];

if ($agt_int!=null) {
echo '<a id="teste"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">EMPRESA: ' . $nome . ' -  CNPJ:  '.$CNPJ.' - TEM REGISTRO NO CADASTRO DE EMPRESAS MAS O CONVÊNIO É POR AGENTE: '.$agt_int.'
  </div></a>';
}


      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $dia = strftime('%d', strtotime('today'));
        $mes = strftime('%m', strtotime('today'));
        $ano = strftime('%Y', strtotime('today'));

        $sql1 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$CD_EMPRESA' ORDER BY CD_CONVENIO DESC");

      $noticias1 = mysql_fetch_array($sql1);
        //CONSULTA O ULTIMO TERMO DO ALUNO
        //PEGA OS DADOS DO TERMO
      $dt_inicio=$noticias1['dt_inicio'];
      $data_fim=$noticias1['dt_fim'];

     
        //DIVIDE A DATA FINAL DE ESTÁGIO EM DIA MÊS E ANO
        $dia_final = substr($data_fim, 0, 2);
        $mes_final = substr($data_fim, 3, 2);
        $ano_final = substr($data_fim, 6, 4);



    //VERIFICA SE PODE FAZER OUTRO TERMO
        if ($ano_final != '' and $ano > $ano_final and $agt_int=='') {
          echo utf8_encode('<a id="teste"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } if ($ano_final == $ano and $mes > $mes_final and $agt_int=='') {
          echo utf8_encode('<a id="teste"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } if ($ano == $ano_final and $mes == $mes_final and $dia >= $dia_final and $agt_int=='') {
          echo utf8_encode('<a id="teste"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - ACABOU O CONVENIO EM '.$data_fim.'</div></a>');
        } 

        if ($ano < $ano_final) {
    echo utf8_encode('<a id="teste"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');       
        } 

       if ($ano_final == $ano and $mes < $mes_final) {
echo utf8_encode('<a id="teste"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');        
       } 
       if ($ano == $ano_final and $mes == $mes_final and $dia <= $dia_final) {
echo utf8_encode('<a id="teste"><div class="alert alert-success" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - TEM CONVENIO DE '. $dt_inicio.' ATE '.$data_fim.'</div></a>');        
       }


        if ($ano_final == '' and $agt_int=='' ) {
      echo utf8_encode('<a id="teste"><div class="alert alert-danger" style="cursor:pointer; margin-top:5px;">EMPRESA: ' .$nome. ' - CNPJ:  '.$CNPJ.' - NAO TEM REGISTRO DE CONVENIO.</div></a>');
        } 


  
 }   
}
if ($resulatdo == 0) {
    echo '<div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">Aviso! Empresa Não Conveniada</font></Strong></h4>
               <p><font color="red">A empresa solicitada não é conveniada com a UFC, para mais detalhes entre em contato com a Agência de Estágios da UFC.</font></p>
               </div>';
  } 

?>
        </div>
      </div>
                <div class="box box-primary">
                <div class="form-group">
                  <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Dados da Empresa</h3>
                  
<?php
// Incluir aquivo de conexão
include("conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");

$resulatdo = mysql_num_rows($sql);

 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);

  echo '<form action="pages/acao_atualizar_empresa.php" method="POST">';
  echo utf8_encode('<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <br><label>Nome da Empresa:</label>
                  <input type="text" id="nome" name="nome_empresa" class="form-control" value="'.$noticias->nome.'" disabled style="text-transform: uppercase;">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Endere&ccedilo:</label>
                  <input type="text" id="endereco" name="endereco" class="form-control" value="'.$noticias->endereco.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>CNPJ:</label>
                  <input type="text" id="cnpj" onkeypress="cnpj2(cnpj);" maxlength="18" name="cnpj" class="form-control" value="'.$noticias->cnpj.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>E-mail:</label>
                  <input type="text" id="email" name="email" class="form-control" value="'.$noticias->email.'" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Telefone:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" id="fone" onkeypress="telefone(fone);" maxlength="15" name="fone" class="form-control" value="'.$noticias->tel.'" disabled>
                </div>

              </div>

              <input type="hidden" id="id_empresa" name="id" class="form-control" value="'.$noticias->CD_EMPRESA.'">

              <button type="button" id="btn_01" class="btn btn-primary pull-right" onclick="alterar();" style="display:block; margin-bottom:10px;"> ATUALIZAR DADOS </button>
              <input type="submit" id="btn_02" class="btn btn-primary pull-right" name="atualizar" onclick="alterar();" style="display:none; margin-bottom:10px;" value="SALVAR">
              <a id="btn_03" class="btn btn-danger pull-right" onclick="cancelar();" style="display:none; margin-bottom:10px; margin-right:5px;"> CANCELAR </a>
            </div>
          </div>
          </form>
        ');
  
}
if ($resulatdo == 0) {
    echo utf8_decode('
               <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
               <p><font color="red">NENHUM RESULTADO ENCONTRADO</font></p>
               <button type="button" onclick="direct90()" class="btn btn-danger pull-right">Cancelar</button></a>
               </div>');
  } 


// Acentuação
@header("Content-Type: text/html; charset=ISO-8859-1",true);
?>                   </div>
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
