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
  <script src="../../dist/js/divsOcultas.js"></script>
  <script src="../../dist/js/mascaras.js"></script>

  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

  <link type="text/css" href="jquery-ui-1.8.5.custom.css" rel="stylesheet" />
  <script src="jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">
    function completar(){
      $(document).ready(function()
    {
      $('#conce').autocomplete(
      {
        source: "search.php",
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
  <div class="content-wrapper">

<?php
  $matricula_aluno11=$_POST['matriculaadc'];
  $nome_aluno11=$_POST['nmadc'];

echo '
    <!-- Main content -->
    <div class="content">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-7">
              <div class="col-md-12">
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <h3 class="box-title" id="nome_empresa">Adicionar Termo de Compromisso</h3>
                              
                          </div>
                          <div class="box-body">
                            <div class="form-group" id="btn" style="display: block;">
                              <form action="page_result_aluno_tce.php" method="POST">

                                     
                                      <div class="col-md-8"> 
                                        <label>Nome do Aluno</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" value="'.$nome_aluno11.'" disabled>
                                          <input type="hidden" id="nomeA" class="form-control" value="'.$nome_aluno11.'" name="nmadc" >
                                        </div>
                                      </div>
                                      <div class="col-md-4"> 
                                        <label>Matricula</label>
                                        <div class="form-group">
                                          <input type="text" class="form-control" value="'.$matricula_aluno11.'" disabled>
                                          <input type="hidden" id="aluno" class="form-control" value="'.$matricula_aluno11.'" name="aluno" >
                                        </div>
                                      </div>
                                    
                                  
                                    <div class="col-md-12"> 
                                      <label>Concedente</label>
                                      <div class="form-group">
                                        <input type="text" id="conce" onkeypress="completar()" class="form-control" name="concedente_n" >
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <label>Setor UFC/Órgão do Estado/Órgão Prefeitura</label>
                                      <div class="form-group">
                                        <select class="form-control select2" name="setor_n">
                                          <option selected="selected"></option>';
?>

<?php                                         $sqlsetor1 = mysql_query("SELECT * FROM Setor");
                                               
                                                while ($noticiassetor1 = @mysql_fetch_object($sqlsetor1)) {
                                                  echo utf8_encode('<option value="'.$noticiassetor1->id_setor.'" >'.$noticiassetor1->nome_setor.'</option>');}
                                                      
?> 

<?php               
                                  echo' </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <label> Agente </label>
                                      <div class="form-group">
                                        <select class="form-control select2"  name="agente_n" required>
                                          <option selected="selected"></option> ';
?>

<?php                                                 $sql5 = mysql_query("SELECT * FROM agentes");
                                                    while($resultado5=mysql_fetch_object($sql5)){
                                  echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                                                    }
?>    

<?php                  
                                  echo'</select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label>Valor da Bolsa</label>
                                      <div class="form-group" id="mostrar_div2">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="valor_n" onkeypress="mascara( this, mvalor );" maxlength="14" placeholder="EX.: 1450.50">
                                        </div>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <br>
                                      <label> Carga Horaria Semanal </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="text" id="inputName" class="form-control" name="carga_hrr_n" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label>Data de inicio</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                           <input type="text" id="inputName" class="form-control" name="dt_ini_n" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label> Data de Término </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="dt_fim_n" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label> Hora de Inicio</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="text" id="inputName" class="form-control" name="hr_ini_n" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label> Hora Final </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="text" id="inputName" class="form-control" name="hr_fim_n" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" >
                                        </div>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <br>
                                      <label> Rescisão</label>
                                      <div class="form-group" id="mostrar_div2">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="rescisao_n" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label> Variavel </label>
                                      <div class="form-group">
                                        <select class="form-control select2" name="variavel_n" required>
                                          <option>SIM</option>
                                          <option>NÃO</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <br>
                                      <label>Classificação do Termo</label>
                                      <div class="form-group">
                                        <select class="form-control select2" name="cl_trm_n" required>
                                          <option selected="selected"></option>
                                          <option>OBRIGATORIO</option>
                                          <option>NÃO OBRIGATORIO</option>   
                                        </select>
                                        <br>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <label> Período_Relatorio 01</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="data_relatorio_1" id="data" size="60" maxlength="50" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label> Período_Relatorio 02</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="data_relatorio_2" id="data" size="60" maxlength="50" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label> Período_Relatorio 03</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="data_relatorio_3" id="data" size="60" maxlength="50" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label> Período_Relatorio 04</label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" id="inputName"  class="form-control" name="data_relatorio_4" id="data" size="60" maxlength="50" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label>Tipo do Termo</label>
                                      <div class="form-group">
                                        <select class="form-control select2" name="tp_trm_n" required>
                                            <option selected="selected"></option>
                                            <option>T.A</option>
                                            <option>T.C</option>    
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <br>
                                      <label> SIAPE </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="text" id="inputName" class="form-control" name="siape" >
                                        </div>
                                      </div>
                                    </div>
                                     <div class="col-md-12">
                                      <label> Professor Orientador </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="text" id="inputName" class="form-control" name="prof_n" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <br>
                                      <label> Arquivo </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                          <input type="file" id="inputName" class="form-control" name="pdf"  >
                                        </div>
                                      </div>
                                    </div>
                                     <div class="col-md-12">
                                      <label> Observação </label>
                                      <div class="form-group">
                                        <div class="input-group"><div class="input-group-addon"><i class="fa fa-exclamation-triangle"></i></div>
                                            <input type="text" id="inputName" class="form-control" name="obs" >
                                        </div>
                                      </div>
                                    </div>                                  

                                <div class="col-md-12">
                                  <a href="termo_compromisso.php"><input type="button" class="btn btn-danger pull-left" value="Cancelar"></a>
                                  <input type="submit" name="btn_cdt" class="btn btn-primary pull-right" value="Cadastrar">
                                </div>
                              
                            </form>
                          </div>
                        </div>
                      </div>
              </div>
            </div>
        </div>
      </div>';

?>
    </div>
    <!-- /.content -->
  
   <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0
    </div>
    <strong>Copyright &copy; 2018 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
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

<!-- jQuery 2.2.0 
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script> -->

<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script> -->
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
<!-- <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="../../dist/js/funcs_tce.js"></script>
<!-- Page script -->
<script src="../../dist/js/funcs_atualizar_tce.js"></script>

<script src="../../dist/js/funcs_ex_tce.js"></script>


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
    //v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    //v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
        
    v=v.replace(/(\d)(\d{2})$/,"$1.$2");//coloca a virgula antes dos 2 últimos dígitos
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
