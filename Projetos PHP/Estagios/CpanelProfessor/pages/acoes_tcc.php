<?php
require ('conn.php');
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
$siape = $linha['siape'];
$fone = $linha['fone'];
$email = $linha['email'];
$lotacao = $linha['lotacao'];
$cpf = $linha['cpf'];

list($nome, $nome2, $nome3) = explode(' ', $nome_prof);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágios UFC | Ações TCC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- IMPORTAÇÃOES -->

  <!--   <link rel="shortcut icon" href="images/ico/icon.png"> -->
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">   
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="http://harvesthq.github.io/chosen/chosen.css" rel="stylesheet"/>

  <!--/////////// IMPORTAÇÕES JAVA SCRIPT ///////////-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../plugins/jQueryUI/jquery-ui.min.js"></script>

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
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../brasao.png"></span>
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
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome.' '.$nome2.' '.$nome3; ?></p>
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
            <?php
              // Incluir aquivo de conexão //
              include("conn.php");
                mysql_select_db('estagios');
                // Recebe o valor enviado //
                         
               
                $siape2=$_SESSION['siape'];

                // Procura titulos no banco relacionados ao valor //
                $sqlcons = mysql_query("SELECT * FROM termo_c_coletivo WHERE siape LIKE '$siape2'");
                $noticiascons0 = @mysql_fetch_object($sqlcons);
                $resultadocons = mysql_num_rows($sqlcons);


                $sqlcons2 = mysql_query("SELECT * FROM termo_c_coletivo WHERE cd_tcc LIKE '$noticiascons0->cd_tcc' AND siape LIKE '$siape2'");
                $noticiascons2 = @mysql_fetch_object($sqlcons2);
                $resultadocons2 = mysql_num_rows($sqlcons2);
                           
                  // Exibe todos os valores encontrados //
                 

                  echo'   
                      
                          ';

                  if($resultadocons2 != 0){

                  echo'<div class="col-md-6">
                        <div class="box box-primary " id="cons" style="display: block;">
                          <div class="box-header with-border">
                            <h3 class="box-title">Consultar TCC</h3> 
                                <div class="form-group" id="pesquisa1">
                                  <div class="input-icon right" id="busca1"> 
                                    <div class="form-group">

                                      <!-- //////////////////////// Envio de formulário para "busca_tcc.php" ////////////////////////////// -->
                                      <form action="page_result_tcc.php" method="POST">
                                        <div style="display:block">
                                          <div class="col-md-12">
                                            ';
                                              
                                            echo utf8_encode('                            
                                            <input type="hidden" name="siape" class="form-control" value="'.$noticiascons0->siape.'">
                                            ');

                                      echo '
                                            <table class="table table-hover">
                                              <tr>
                                               ';
                                        ?>
                                                <select class="form-control select2" name="cd_tcc" style="width: 100%;" required>
                                                <?php 
                                                  require('conn.php');
                                                    $sqlcons5 = mysql_query("SELECT * FROM termo_c_coletivo WHERE siape LIKE '$siape2' ORDER BY cd_tcc ASC");        
                                                      echo $resultadocons5 = mysql_num_rows($sqlcons5);

                                                      while ($noticiascons5 = mysql_fetch_array($sqlcons5)) {
                                                        $cd_tcc5 = $noticiascons5['cd_tcc'];
                                                        echo utf8_encode('<option>'.$cd_tcc5.'</option>');
                                                      }
                                                ?>
                                                </select>

                                        <?php
                                      echo '  </tr>  
                                            </table>
                                            <div class="col-md-12">
                                              <button type="submit" name="btntcc2" class="btn btn-primary pull-right">Consultar</button>
                                            </div>
                                          </div>
                                        </div>
                                      <!--//////////////////////// FIM DO FORMULÁRIO //////////////////////////////-->    
                                      </form>
                                   
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>';
                  }
                  if ($resultadocons2 == 0) {
                    echo utf8_encode('
                      <div class="col-md-6">
                        <div class="box box-primary " id="cons" style="display: block;">
                            <div class="box-header with-border">
                              <h3 class="box-title">Consultar TCC</h3>  
                              
                                <div class="form-group">
                                  <br><label>Siape</label>
                                
                                <input type="text" class="form-control" value="'.$siape2.'" disabled>');
                        echo '       
                                <center>                                 
                                <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                                  <p><font color="red">Você não possui Termos Coletivos</font></p>
                                </div>
                                </center>
                               </div>
                            </div>
                        </div>
                      </div>';
                  } 
                 
          ?>
            <?php
              // Incluir aquivo de conexão //
              include("conn.php");
                mysql_select_db('estagios');
                // Recebe o valor enviado
                         
               
                $siape2=$_SESSION['siape'];

                // Procura titulos no banco relacionados ao valor //
                $sqldel = mysql_query("SELECT * FROM termo_c_coletivo WHERE siape LIKE '$siape2'");
                $noticiasdel0 = @mysql_fetch_object($sqldel);
                $resultadodel = mysql_num_rows($sqldel);


                $sqldel2 = mysql_query("SELECT * FROM termo_c_coletivo WHERE cd_tcc LIKE '$noticiasdel0->cd_tcc' AND siape LIKE '$siape2'");
                $noticiasdel2 = @mysql_fetch_object($sqldel2);
                $resultadodel2 = mysql_num_rows($sqldel2);
                           
                  // Exibe todos os valores encontrados //

                  if($resultadodel2 != 0){

                  echo'<div class="col-md-6">
                        <div class="box box-primary" id="del" style="display: block;">
                          <div class="box-header with-border">
                            <h3 class="box-title">Excluir TCC</h3>
                                <div class="form-group" id="pesquisa1">
                                  <div class="input-icon right" id="busca1"> 
                                    <div class="form-group">

                                      <!-- //////////////////////// Envio de Formulário para "deleta_tcc.php" ////////////////////////////// -->
                                      <form action="acao_deleta_tcc.php" method="POST">
                                        <div style="display:block">
                                          <div class="col-md-12">
                                            ';
                                              
                                            echo utf8_encode('                            
                                            <input type="hidden" name="siape" class="form-control" value="'.$noticiasdel0->siape.'">
                                            ');
                                            
                                            echo '                                      
                                            <table class="table table-hover">
                                              <tr>
                                                <th>N° do TCC</th>
                                                <th>Data de Cadastro</th>
                                                <th></th>
                                              </tr>';

                                                $sqldel3 = mysql_query("SELECT * FROM termo_c_coletivo WHERE siape LIKE '$siape2' ORDER BY cd_tcc ASC ");
                                                while($noticiasdel3 = mysql_fetch_array($sqldel3)){

                                                  echo utf8_encode('  
                                                  <tr>
                                                    <td><input type="text" class="form-control" value="'.$noticiasdel3["cd_tcc"].'" disabled></td>
                                                    <td><input type="text" class="form-control" value="'.$noticiasdel3["dt_cadastro"].'" disabled></td>
                                                  </tr>');
                                                
                                                }

                                      echo '</table>
                                            <table class="table table-hover">
                                              <tr>
                                                ';
                                        ?>
                                                <select class="form-control select2" name="cd_tcc_del" style="width: 100%;" required>
                                                <?php 
                                                  require('conn.php');
                                                    $sqldel5 = mysql_query("SELECT * FROM termo_c_coletivo WHERE siape LIKE '$siape2' ORDER BY cd_tcc ASC");        
                                                      echo $resultadodel5 = mysql_num_rows($sqldel5);

                                                      while ($noticiasdel5 = mysql_fetch_array($sqldel5)) {
                                                        $cd_tcc5 = $noticiasdel5['cd_tcc'];
                                                        echo utf8_encode('<option>'.$cd_tcc5.'</option>');
                                                      }
                                                ?>
                                                </select>

                                        <?php
                                      echo '  </tr>  
                                            </table>
                                            <div class="col-md-12">
                                              <button type="submit" name="btntccdel" class="btn btn-danger pull-right">Excluir</button>
                                            </div>
                                          </div>
                                        </div>
                                      <!--//////////////////////// FIM DO FORMULÁRIO //////////////////////////////-->    
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>';
                  }
                  if ($resultadodel2 == 0) {
                    echo utf8_encode('
                      <div class="col-md-6">
                        <div class="box box-primary " id="cons" style="display: block;">
                            <div class="box-header with-border">
                              <h3 class="box-title">Excluir TCC</h3>  
                                <div class="form-group">
                                  <br><label>Siape</label>
                                
                                <input type="text" class="form-control" value="'.$siape2.'" disabled>');
                       echo '   
                                <center>                                     
                                <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                                  <p><font color="red">Você não possui Termos Coletivos</font></p>
                                </div>
                                </center>
                               </div>
                            </div>
                        </div>
                      </div>';
                  }      
          ?>
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
<!--//// jAVA SCRIPT ////-->

<!-- jQuery 2.2.0 
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script> -->

<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- <script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<!-- <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="../dist/js/funcs_tce.js"></script>
<!-- Page script -->
<script src="../dist/js/funcs_atualizar_tce.js"></script>

<script src="../dist/js/funcs_ex_tce.js"></script>


<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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











