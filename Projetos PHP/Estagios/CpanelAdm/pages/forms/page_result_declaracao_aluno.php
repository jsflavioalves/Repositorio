<?php 
require('../../../conn.php');
//mysqli_select_db('estagios');
session_start();
  $matricula = $_SESSION['sesaomatricula'];
  $cpf = $_SESSION['sesaocpf'];

  $sesao=mysqli_query($conn,"SELECT*FROM usuarios_agencia where login like '$matricula' and senha like '$cpf'");
  $resulti=mysqli_num_rows($sesao);

  if($resulti==0){//header('location:http://www.estagios.ufc.br/siges/public_html/');
  }
  
  $sql=mysqli_fetch_array($sesao);
  $nome=$sql['nome'];
  $funcao=$sql['funcao'];
  $foto=$sql['perfil'];

   ?>
   
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agência de Estágio | Termo de Compromisso</title>


<!--   <link rel="shortcut icon" href="images/ico/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

  <script language="javascript" type="text/javascript">
    function abreResposta(formulario) {
      window.open("_blank","novaJanela","......"); 
      formulario.target = 'novaJanela';
      return true;      
     }
    
     function completar_declaracao(){
      $(document).ready(function()
    {
      $('#input1').autocomplete(
      {
        source: "search_consulta_dec.php",
        minLength: 1
      });

    });
    }
    function sumir(){
      var mudar = document.getElementById("sumir").style.display = 'none';
    }
  </script>

  <!-- CONFLITOS DE PLUGINS
  <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script> -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../brasao.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><strong>CLICK<i class="fa fa-caret-left"></i></strong> NUTEDS</span>
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
            <!--<div class="col-md-8">-->
              <section class="content">
                <!-- SELECT2 EXAMPLE -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title" id="nome_empresa">Consultar Declarações do Aluno: </h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group" id="btn" style="display: block;">
                        <form action="page_result_declaracao_aluno.php" method="POST">
                          <div class="form-group" id="pesquisa">
                              <div class="input-icon right" id="busca">
                                <div class="col-md-12">
                                    <input id="input1" onkeypress="completar_declaracao()" onkeyup="sumir()" type="text" name="input1" placeholder="Nome ou Matricula do Aluno" class="form-control" /><br>
                                 
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                      <button type="submit" class="btn btn-block btn-primary" name="btnalunodec" style="float: right; display:block;">Consultar</button>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="box box-primary" id="sumir">
                  <div class="form-group">
                    <div class="box-header with-border">
                    <div class="box-body">
                      <h3 class="box-title">Declarações do Aluno</h3>
                      </div>
                    <div class="box-body">
<?php
// Incluir aquivo de conexão
include("../../../conn.php");
// mysqli_select_db('estagios');
// Recebe o valor enviado
if(isset($_POST['btnalunodec'])){

$valor = utf8_decode($_POST['input1']);
 
// Procura titulos no banco relacionados ao valor
$sql = mysqli_query($conn,"SELECT * FROM alunos WHERE nome LIKE '$valor' or matricula LIKE '$valor'");

$resulatdo = mysqli_num_rows($sql);


 
// Exibe todos os valores encontrados
if($resulatdo != 0){
  $noticias = @mysqli_fetch_object($sql);
  $matricula = $noticias->matricula;
$sql1 = mysqli_query($conn,"SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula' ORDER BY id_termo_compromisso DESC");


$resultado1 = mysqli_num_rows($sql1);

  //echo utf8_encode('<br><a onclick="declaracao_aluno()" id="nome"><div class="alert alert-success">' . @$noticias->nome . '</div></a>');
  echo '<div id="dasinp" onclick="declaracao_aluno();" style="display:block">';
  echo utf8_encode('<div class="form-group">
           <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-plus"></i>
              </div>
              <input type="text" id="habilitar" class="form-control" name="nm" value="'.$noticias->nome.'" placeholder="Nome do Aluno" disabled>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" id="habilitar1" name="cpf" class="form-control" value="'.$noticias->cpf.'" placeholder="cpf" disabled>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" id="habilitar2" name="rg"  class="form-control" value="'.$noticias->rg.'" placeholder="RG" disabled>
            </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-exclamation-triangle"></i>
                </div>
                <input type="text" id="habilitar3" class="form-control" name="matricula" value="'.$noticias->matricula.'"  placeholder="Nº matricula" disabled>
              </div>
          </div>') ;
}
if($resultado1 != 0){
        $sql3 = mysqli_query($conn,"SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias->matricula'");
        echo'<div class="row" id="tabela" onclick="declaracao_aluno();" style="display:block">
              <div class="col-xs-12"><br>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Termos de Compromisso</h3>
                  </div>
                  <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID_TCE</th>
                      <th>BOLSA</th>
                      <th>CONCEDENTE/EMPRESA</th> 
                      <th>DATA_INICIO</th>
                      <th>DATA_TERMINO</th>
                      <th>RESCISÃO</th>
                      <th>TIPO_ESTAGIO</th>
                      <th>PROF.ORIENTADOR</th>
                      <th>DECLARAÇÃO</th>
                      <th>EDITAR</th>
                    </tr>';
               //     session_start();
                    $_SESSION['x'] = 0;
                    $_SESSION['y'] = 0;
                    $_SESSION['y'] = $noticias->matricula;
                    while($noticias3=@mysqli_fetch_array($sql3)){ 
                    $_SESSION['x'] = $noticias3['id_termo_compromisso'];


                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $dia = strftime('%d', strtotime('today'));
                    $mes = strftime('%B', strtotime('today'));
                    $ano = strftime('%Y', strtotime('today'));
                    $hora = date('H:i:s');
                    
                    $empresa = $noticias3['nome'];
                    $sql_empresa = mysqli_query($conn,"SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$empresa' ORDER BY nome ASC");
                    $noticias_empresa = @mysqli_fetch_array($sql_empresa);

      echo utf8_encode('<tr>
                          <td>'.$noticias3['id_termo_compromisso'].'</td>
                          <td>'.$noticias3['valor'].'</td>
                          <td>'.$noticias_empresa['nome'].'</td>
                          <td><label id="ret_proc_nome" style="color:#00a258;">'.$noticias3['dt_inicio'].'</label></td>
                          <td><label id="ret_proc_nome" style="color:#00a258;">'.$noticias3['dt_fim'].'</label></td>');
                          if($noticias3['rescisao'] == NULL){
                          echo '<td></td>';
                          } else if($noticias3['rescisao'] != NULL){
                          echo '<td><label style="color:#FF0000;">'.$noticias3['rescisao'].'</label></td>';
                          }
        echo utf8_encode('<td>'.$noticias3['classificacao_termo'].'</td>
                          <td>'.$noticias3['prof_orientador'].'</td> 
                          <form action="acao_gerar_declaracao.php" onsubmit="javascript: abreResposta(this)" method="POST">
                              <input type="hidden" class="form-control" name="id_tce" value="'.$noticias3['id_termo_compromisso'].'">
                              <input type="hidden" class="form-control" name="id_aluno" value="'.$noticias3['matricula_aluno'].'">
                              <input type="hidden" name="dia" value="'.$dia.'">
                              <input type="hidden" name="mes" value="'.$mes.'">
                              <input type="hidden" name="ano" value="'.$ano.'">
                              <input type="hidden" name="hora" value="'.$hora.'">');
                      if($noticias3['obs'] == "FALTA VIA UFC"){
                        echo '<td><button type="button" class="btn btn-danger pull-right">FALTA VIA UFC</button></td>';
                      }else{
                        echo '<td><button type="submit" class="btn btn-primary" type="button" style="margin-left:20%;" class="btn btn-box-tool">GERAR</button></td>';
                        echo '<td><a href="page_editar_declaracao.php" target="_blank"><button type="button" class="btn btn-success pull-left" type="button" class="btn btn-box-tool">EDITAR</button></a></td>';
                      }
                          echo '</form>
                          
                        </tr>';
                  }
                  $sql4 = mysqli_query($conn,"SELECT * FROM alunos WHERE nome LIKE '%$valor%' or matricula like '%$valor%'");
                  $noticias4 = @mysqli_fetch_array($sql4);
    echo utf8_encode('</table>
                    </div>   
                  </div>
                     <form action="acao_gerar_declaracao_todos.php" onsubmit="javascript: abreResposta(this)" method="POST">
                      <input type="hidden" class="form-control" name="id_aluno" value="'.$noticias4['matricula'].'">
                      <input type="hidden" class="form-control" name="id_tce" value="'.$_SESSION['x'].'">
                      <input type="hidden" name="dia" value="'.$dia.'">
                      <input type="hidden" name="mes" value="'.$mes.'">
                      <input type="hidden" name="ano" value="'.$ano.'">
                      <input type="hidden" name="hora" value="'.$hora.'">
                      <button type="submit" class="btn btn-primary pull-right" type="button" class="btn btn-box-tool">GERAR TODOS</button>
                      <a href="declaracao_aluno.php"><button type="button" style="margin-right:1%;" class="btn btn-danger pull-right">CANCELAR</button></a>
                      </form>
                </div>
              </div>');
  }

      if($resultado1 == 0){
         echo utf8_encode('<br>
                            <div class="row">
                              <div class="col-xs-12"><br>
                                <div class="box box-primary">
                                  <div class="box-header">
                                    <h3 class="box-title">Termos de Compromisso</h3>
                                  </div>
                                  <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                      <tr>
                                        <th><label id="ret_proc_nome" style="color:#dd4b39;">O(A) ALUNO(A) ');echo $noticias->nome; echo' NÃO POSSUI TERMO DE COMPROMISSO.</label></th>
                                      </tr>
                                      <tr></tr>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>';  
                
} 

}

?>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
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
