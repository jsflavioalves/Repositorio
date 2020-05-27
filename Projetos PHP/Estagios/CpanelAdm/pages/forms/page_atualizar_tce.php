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
        source: "search_atu_emp.php",
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
echo '<form action="acao_atualizar_tce.php" method="POST">';

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
                              <input type="text" id="conce" onkeypress="completar()" class="form-control" name="concedente_n" value="'.$noticias3->nome.'">
                            </div>

                              <label>Setor UFC</label>
                     <div class="form-group">
                              <select class="form-control select2" name="setor_nn" style="width: 100%;">
                                <option value="'.$noticiassetor->id_setor.'" selected="selected">'.$noticiassetor->nome_setor.'</option>
                                ');

             $sqlsetor1 = mysql_query("SELECT * FROM Setor ORDER BY nome_setor");
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
                              
                              <!--<input type="text" id="inputName"  class="form-control" name="valor_n" value="'.$noticias->valor.'" onkeypress="mascara( this, mvalor );" maxlength="14" > -->
                              <input type="text" id="inputName"  class="form-control" name="valor_n" value="'.$noticias->valor.'" maxlength="14" >
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
                    
                    <label> Periodo_Relatorio 01</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_1" value="'.$noticias->data_relatorio_1.'" size="50" maxlength="60" >
                            </div>
                    </div>
                    <label> Periodo_Relatorio 02</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_2" value="'.$noticias->data_relatorio_2.'" id="data" size="50" maxlength="60" >
                            </div>
                    </div>
                    <label> Periodo_Relatorio 03</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_3" value="'.$noticias->data_relatorio_3.'" id="data" size="50" maxlength="60" >
                            </div>
                    </div>
                    <label> Periodo_Relatorio 04</label>
                    <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              
                              <input type="text" id="inputName"  class="form-control" name="data_relatorio_4" value="'.$noticias->data_relatorio_4.'" id="data" size="50" maxlength="60" >
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
                          <select class="form-control select2" name="status_n" style="width: 100%;">
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
    <!-- /.content -->
  
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
