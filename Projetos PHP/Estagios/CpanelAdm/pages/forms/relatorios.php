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
<?php 
      require('../../../conn.php');
      mysql_select_db('estagios');
   
      $curso=mysql_query("SELECT*FROM cursos");
      $result_curso=mysql_num_rows($curso);
      $centros=mysql_query("SELECT*FROM centros");
      $result_centros=mysql_num_rows($centros);
     

      ?>
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content">    
    <div class="row">
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE OBRIGATORIO </span>
            <div class="form-group" id="btn3" style="display: block;">   
              <div class="form-group" id="pesquisa_tceano">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_tceo(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_tceo"></div>          
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE NÃO OBRIGATORIO </span>
            <div class="form-group" id="btn3" style="display: block;">              
              <div class="form-group" id="pesquisa_tceno">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_tceno(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_tceno"></div>        
              </div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TA </span>
            <div class="form-group" id="btn3" style="display: block;">        
              <div class="form-group" id="pesquisa_ta_r">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_ta_r(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_ta_r"></div>                   
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TERMOS POR AGENTE</span>
            <div class="form-group" id="btn3" style="display: block;">                  
              <div class="form-group" id="pesquisa_agente">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_agente(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_agente"></div>                         
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
    </div> 

    <div class="row">
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE/CURSO</span>
            <div class="form-group" id="btn3" style="display: block;">                
              <div class="form-group" id="pesquisa_curso_relatorio">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_curso_relatorio(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                  Aguarde...
                </div>
                <div id="resultado_curso_relatorio"></div>       
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE (BOLSA)</span>
            <div class="form-group" id="btn3" style="display: block;">    
              <div class="form-group" id="pesquisa_bolsa">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_bolsa(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_bolsa"></div>                
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE OB.(BOLSA)</span>
            <div class="form-group" id="btn3" style="display: block;">
              <div class="form-group" id="pesquisa_bls_tce">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_bls_tce(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_bls_tce"></div>         
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE ANO (BOLSA)</span>
            <div class="form-group" id="btn3" style="display: block;">
              <div class="form-group" id="pesquisa_bls_tcen">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_bls_tcen(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_bls_tcen"></div>         
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CURSOS</span>
            <span class="info-box-number"><?php echo $result_curso;  ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CENTROS</span>
            <span class="info-box-number"><?php echo $result_centros; ?></span>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">TCE/ANO</span>
            <div class="form-group" id="btn3" style="display: block;">
              <div class="form-group" id="pesquisa_tceano">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_tceano(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_tceano"></div>         
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
      <div class="col-md-6 col-sm-8 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CONVENIO/ANO</span>
            <div class="form-group" id="btn3" style="display: block;">  
              <div class="form-group" id="pesquisa_convenio_r">
                <div class="input-icon right" id="busca">
                  <input id="inputName" onkeyup="buscarNoticias_convenio_r(this.value)" maxlength="10" type="text" onkeypress="mascara( this, mvdt );" placeholder="AAAA" class="form-control" />
                </div>
                <div id="resultado_convenio_r"></div>            
              </div>
            </div>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
        <!-- /.col -->
    </div>      
    <div class="row" >
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>
    
    <!-- /.content -->  
  <!-- Content Wrapper. Contains page content -->
   
    <!-- /.content -->
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

<script src="../../dist/js/funcs_tce_ano.js"></script>

<script src="../../dist/js/funcs_convenio_r.js"></script>

<script src="../../dist/js/funcs_tce_obrigatorio.js"></script>

<script src="../../dist/js/funcs_tce_ano_bolsa.js"></script>

<script src="../../dist/js/funcs_ta_r.js"></script>

<script src="../../dist/js/funcs_agente.js"></script>

<script src="../../dist/js/funcs_curso_relatorio.js"></script>

<script src="../../dist/js/funcs_bolsa.js"></script>

<script src="../../dist/js/funcs_bls_tce.js"></script>

<script src="../../dist/js/funcs_bls_tcen.js"></script>
<!-- Page script -->
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
function mvdt(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{8})(\d)/,"$1-$2");       
    v=v.replace(/(\d{6})(\d)/,"$1-$2");  

    v=v.replace(/(\d{4})(\d)/,"$1-$2");     
                                            
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