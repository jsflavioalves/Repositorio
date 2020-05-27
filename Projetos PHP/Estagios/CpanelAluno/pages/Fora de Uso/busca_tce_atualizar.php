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

  <script type="text/javascript">
    
      $(document).ready(function()
    {
      $('#empresa').autocomplete(
      {
        source: "search.php",
        minLength: 1
      });

    });
    
  </script>
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
          <p><?php echo utf8_encode($nome.' '.$nome2.' '.$nome3); ?></p>
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
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2"></div>
          <div class="col-md-7">
          <!--<div class="col-md-8">-->
            <section class="content">
              <!-- SELECT2 EXAMPLE -->
              <div class="box box-primary">
                <div class="form-group">
                  <div class="box-header with-border">
                  <div class="box-body">
                    <h3 class="box-title">Atualizar Termo de Compromisso</h3>
<?php
// Incluir aquivo de conexão
include("../../../conn.php");
 mysql_select_db('estagios');
// Recebe o valor enviado
echo '<form action="atualizar_tce.php" method="POST">';

if(isset($_POST['btn_atu'])){

$valor = $_POST['tce_atu'];
 
// Procura titulos no banco relacionados ao valor 
$sql = mysql_query("SELECT * FROM termo_compromisso WHERE id_termo_compromisso LIKE '$valor'");

$resulatdo = mysql_num_rows($sql);

  
 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysql_fetch_object($sql);
  $nome_aluno = $noticias->matricula_aluno;
  $sql1 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '%$nome_aluno%'");
  $noticias1 = @mysql_fetch_object($sql1);

  $sql3 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$noticias->nome' order by nome ASC");
  $noticias3 = @mysql_fetch_object($sql3);

  $sqlsetor = mysql_query("SELECT * FROM Setor WHERE id_setor LIKE '$noticias->id_setor'");
  $noticiassetor = @mysql_fetch_object($sqlsetor);

  $agente = $noticias->agente;
  $sq6 = mysql_query("SELECT * FROM agentes WHERE CD_AGENTE LIKE '$agente'");
  $noticias6 = @mysql_fetch_object($sq6);

 // echo utf8_encode('<br><a onclick="siim()" id="nome"><div class="alert alert-success">'.@$noticias1->nome.' - ' . @$noticias->dt_inicio . ' - '.@$noticias->dt_fim.'</div></a>');

  echo '<div id="dasinp1" onclick="siim();" style="display:block">';
  echo utf8_encode('<br><label>Concedente</label>
                     <div class="form-group">
                              <select class="form-control select2" name="concedente_n" style="width: 100%;" required>
                                <option value="'.$noticias3->CD_EMPRESA.'" selected="selected">'.$noticias3->nome.'</option>
                                ');

             $sql4 = mysql_query("SELECT * FROM empresas");
             while ($noticias4 = @mysql_fetch_object($sql4)) {
                echo utf8_encode('<option value="'.$noticias4->CD_EMPRESA.'" >'.$noticias4->nome.'</option>');}
                    
                

                   echo utf8_encode('
                              </select>
                            </div>

                              <label>Setor UFC</label>
                     <div class="form-group">
                              <select class="form-control select2" name="setor_nn" style="width: 100%;">
                                <option value="'.$noticiassetor->id_setor.'" selected="selected">'.$noticiassetor->nome_setor.'</option>
                                ');

             $sqlsetor1 = mysql_query("SELECT * FROM Setor");
             while ($noticiassetor1 = @mysql_fetch_object($sqlsetor1)) {
                echo utf8_encode('<option value="'.$noticiassetor1->id_setor.'" >'.$noticiassetor1->nome_setor.'</option>');}
                    
                
                   echo utf8_encode('
                              </select>
                              </div>

                    <label>Data de inicio</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName" class="form-control" name="dt_ini_n" value="'.$noticias->dt_inicio.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Data de T&eacute;rmino </label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="dt_fim_n" value="'.$noticias->dt_fim.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label>Valor da Bolsa</label>
                    <div class="form-group" id="mostrar_div2">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="valor_n" value="'.$noticias->valor.'" onkeypress="mascara( this, mvalor );" maxlength="14" >
                            </div>
                    </div>
                    <label> Rescis&atilde;o</label>
                    <div class="form-group" id="mostrar_div2">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="rescisao_nn" value="'.$noticias->rescisao.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Hora de Inicio</label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="hr_ini_n" value="'.$noticias->hora_inicio.'" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                          </div>
                    </div>
                    <label> Hora Final </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="hr_fim_n" value="'.$noticias->hora_fim.'" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                          </div>
                    </div>
                    <label> Variavel </label>
                    <div class="form-group">
                          <select class="form-control select2" name="variavel_n" style="width: 100%;" required>
                            <option>SIM</option>
                            <option>NÃO</option>
                          </select>
                    </div>
                    <label> Carga Horaria Semanal </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="cg_hrr_n" value="'.$noticias->carga_horaria.'" >
                          </div>
                    </div>
                     <label>Tipo do Termo</label>
                    <div class="form-group">
                              <select class="form-control select2" name="tp_trm_n" style="width: 100%;" required>
                                <option selected="selected">'.$noticias->tipo_termo.'</option>
                                <option>T.A</option>
                                <option>T.C</option>
                               
                              </select>
                            </div>
                    <label>Classifica&ccedil;&atilde;o do Termo</label>
                     <div class="form-group">
                              <select class="form-control select2" name="cl_trm_n" style="width: 100%;" required>
                                <option selected="selected">'.$noticias->classificacao_termo.'</option>
                                <option>OBRIGATORIO</option>
                                <option>NÃO OBRIGATORIO</option>
                               
                              </select>
                            </div>
                    <label> Relatorio </label>
                    <div class="form-group">

                          <div class="form-group">
                              <select class="form-control select2" name="relatorio_n" style="width: 100%;" required>
                                <option selected="selected">'.$noticias->relatorio.'</option>
                                <option>SIM</option>
                                <option>NÃO</option>
                               
                              </select>
                            </div>
                    </div>
                    <label> Data_Relatorio 01</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_1" value="'.$noticias->data_relatorio_1.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Data_Relatorio 02</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_2" value="'.$noticias->data_relatorio_2.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Data_Relatorio 03</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_3" value="'.$noticias->data_relatorio_3.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Data_Relatorio 04</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_4" value="'.$noticias->data_relatorio_4.'" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                            </div>
                    </div>
                    <label> Agente </label>
                    <div class="form-group">
                              <select class="form-control select2"  name="agente_n" style="width: 100%;" required>
                                <option selected="selected" value="'.$agente.'">'.$noticias6->NM_AGENTE.'</option>');
                                 $sql5 = mysql_query("SELECT * FROM agentes");
            while($resultado5=mysql_fetch_object($sql5)){


              echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');}
              echo utf8_encode('</select>
                            </div>
                    <label> Professor Orientador </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="prof_n" value="'.$noticias->prof_orientador.'" >
                          </div>
                    </div>
                    <label> SIAPE </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="siape" value="'.$noticias->siape.'" >
                          </div>
                    </div>
                     <label> Arquivo </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="file" id="inputName" class="form-control" name="pdf" value="'.$noticias->arquivo.'" >
                          </div>
                    </div>
                     <label> Observa&ccedil;&atilde;o </label>
                    <div class="form-group">

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <input type="text" id="inputName" class="form-control" name="obs" value="'.$noticias->obs.'" >
                          </div>
                    </div>
                    <label> Status do TCE </label>
                    <div class="form-group">
                          <select class="form-control select2" name="status_n" style="width: 100%;" required>
                            <option>'.$noticias->status.'</option>
                            <option>ATIVO</option>
                            <option>INATIVO</option>
                          </select>
                    </div>

                      <input type="hidden" id="inputName" class="form-control" name="matricula_aluno" value="'.$noticias1->matricula.'" >
                      <input type="hidden" name="id_termo_compromisso" value="'.$noticias->id_termo_compromisso.'"/>

                    <button type="submit" name="btn_salvar" class="btn btn-primary pull-left">Salvar</button>
                    </form>
                    <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right">Cancelar</button></a>'); 
}
if ($resulatdo == 0) {
    echo utf8_encode('               

              <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                  <p><font color="red">Nenhum TCE com esse registro encontrado.</font></p>
                  <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right">Cancelar</button></a>
               </div>');
  } 

echo '</form>';

}
// Acentuação
/*@header("Content-Type: text/html; charset=ISO-8859-1",true);*/
?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box -->
            </section>
            </div>
          </div>
        </div>
      </div>
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
