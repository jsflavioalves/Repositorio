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
  <title>Agência de Estágio | Convênios Pendentes</title>
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

  <!--precisa ter essas importacoes para a funcao de autocomplete funcionar -->
  <!--nas importacoes nas linhas finais desse codigo tem jQuery 2.2.0 que precisa esta desabilitado para esses plugins abaixo funcionar -->
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

  <script src="../../dist/js/mascaras.js"></script>

      <script>
      function processo2 (mask) {
          if (mask.value.length == 6) {
              mask.value = mask.value+'/';
          };
          if (mask.value.length == 9) {
              mask.value = mask.value+'-';
          };
      }

      function data3(conv) {
          if (conv.value.length == 2) {
              conv.value = conv.value+'/';
          };
          if (conv.value.length == 5) {
              conv.value = conv.value+'/';
          };
      }
    function siim() {
      var mudar = document.getElementById("conteudo").style.display = 'block';
      var mudar = document.getElementById("busca").style.display = 'none';
      var mudar = document.getElementById("nome").style.display = 'none';
      var mudar = document.getElementById("dasinp").style.display = 'block';
      var mudar = document.getElementById("nome1").style.display = 'none';
      var mudar = document.getElementById("div_teste1").style.display = 'block';

    }
    function mostrar_salvar() {
      var mudar = document.getElementById("mostrar_div4").style.display = 'block';
    }
    function btn(){
      var mudar = document.getElementById("mostrar_div4").style.display = 'block';  
    }
    function btn2(){
      var mudar = document.getElementById("btn2").style.display = 'block';  
    }
    function btn3(){
      var mudar = document.getElementById("dasinp").style.display = 'none';
      var mudar = document.getElementById("btn3").style.display = 'block';  
    }
    function divConv_pen() {
      var mudar = document.getElementById("tabela").style.display = 'none';
    }

    // MUDAR O ACTION DO FORMULÁRIO (DOIS SUBMIT's DENTRO DE UM MESMO FORM)
    function Enviar(opc){
      if(opc == 1){
      document.form.action = "acao_mudar_tabela2.php";
      document.form.submit();
      }
      if(opc == 2){
      document.form.action = "acao_mudar_tabela3.php";
      document.form.submit();
      }
    }
    //funcao que recebe o id do formulario atualizar convenios pendentes para mostrar os resultados aproximados
    function completarpen() {
          
        
            $(document).ready(function(){
              $('#nome').autocomplete(
              { 
                source: "search_convenio_pendente_atual.php",
                minLength: 1,
                delay: 0
              });

            });
        
        }
        function completar_del() {
          
        
            $(document).ready(function(){
              $('#nome1').autocomplete(
              { 
                source: "search_del_convenio_pen.php",
                minLength: 1,
                delay: 0
              });

            });
        
        }


  // </script>

  <!-- CONFIGURAÇÕES DOS CHECKBOX's -->
  <style type="text/css">
    #check{
      margin-top: 10px;
      margin-left: 30px;
    }  

    #interessado{
      width: 250px;
    }

    #sai_prex_nome{
      width: 100px;
    }

    #pendencia_nome{
      width: 350px;
    }

  </style>

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

    <!-- Main content -->
    <div class="content">
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">CONVÊNIOS PENDENTES</h3>
              <div class="input-group input-group-sm" style="width: 150px; float:right;">
                <!-- FUNÇÃO (funcs_Conv_pen.js) E BUSCA (busca_conv_pendentes.php) -->
                <input id="inputName1" onclick="divConv_pen();" onkeyup="buscarNoticias_Conv_pen(this.value)" type="text" placeholder="PROCURAR" class="form-control" />
                <div class="input-group-btn" id="conteudo_Conv_pen" onclick="divConv_pen();">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div><br>
            </div>
              <div id="resultado_Conv_pen"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="tabela" style="display: block;" >
              <table class="table table-hover">
                <tr>
                  <th><!--COLUNA DOS CHECKBOX's--></th>
                  <th>Data de Abertura de Processo</th>
                  <th>Processo</th>
                  <th>Interessado</th>
                  <th>CNPJ</th>
                  <th>Saida P/ Procuradoria</th>
                  <th>Retorno da Procuradoria</th>
                  <th>Saida P/ PREX</th>
                  <th>Data da Assinatura/Convênio ativo</th>
                  <th>Pendência</th>
                  <th>Data Arquivamento</th>
                  <th>Data E-mail 01</th>
                  <th>Data E-mail 02</th>
                  <th>Observação</th>
                  <th>Documento</th>
                  <th><!--COLUNA DO BOTÃO INSERIR--></th>
                </tr>
                <?php 
                  require('../../../conn.php');

                  $consulta = mysql_query("SELECT * FROM convenios_pendentes ORDER BY id_convenios_pendentes DESC");

                  setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  $dia_atual = date('d');
                  $mes_atual = date('m');
                  $ano_atual = date('Y');

                  while($sql = mysql_fetch_array($consulta)){
                    $dt_abertura = $sql['dt_abertura'];
                    $processo = $sql['processo'];
                    $interessado = $sql['interessado'];
                    $cnpj = $sql['cnpj'];
                    $saida_procuradoria = $sql['saida_procuradoria'];
                    $retorno_procuradoria = $sql['retorno_procuradoria'];
                    $saida_prex = $sql['saida_prex'];
                    $retorno_prex = $sql['retorno_prex'];
                    $pendencia = $sql['pendencia'];
                    $data_arquivamento = $sql['data_arquivamento'];
                    $data_email_01 = $sql['data_email1'];
                    $data_email_02 = $sql['data_email2'];
                    $observacao = $sql['observacao'];
                    $arquivo = $sql['arquivo'];
                    $id_convenios_pendentes = $sql['id_convenios_pendentes'];

                    echo utf8_encode('
                        <form action="" method="POST" name="form" id="form" onSubmit="">
                          <tr>
                            <td><input type="checkbox" name="check" id="check" value="'.$id_convenios_pendentes.'"></td>

                            <td>'.$dt_abertura.' <input type="hidden" value="'.$dt_abertura.'" class="form-control" name="dt_abertura" id="dt_abertura"> </td>
                            
                            <td>'.$processo.' <input type="hidden" value="'.$processo.'" class="form-control" name="processo" id="processo"> </td>');

                    $partes = explode("/", $data_email_01);
                    $dia_email = $partes[0];                   
                    $mes_email = $partes[1];                   
                    $total = $dia_atual - $dia_email;
                    
                    if($data_email_01 == ""){
                      echo utf8_encode('<td><label id="interessado">'.$interessado.'</label> <input type="hidden" value="'.$interessado.'" class="form-control" name="interessado" id="interessado"> </td>');
                    }else if($dia_email == $dia_atual AND $mes_email < $mes_atual){
                      echo utf8_encode('<td><label id="interessado" style="color: red;">'.$interessado.'</label> <input type="hidden" value="'.$interessado.'" class="form-control" name="interessado" id="interessado"> </td>');
                    } else if($dia_email < $dia_atual AND $mes_email < $mes_atual){
                      echo utf8_encode('<td><label id="interessado" style="color: red;">'.$interessado.'</label> <input type="hidden" value="'.$interessado.'" class="form-control" name="interessado" id="interessado"> </td>');
                    } else{
                      echo utf8_encode('<td><label id="interessado">'.$interessado.'</label> <input type="hidden" value="'.$interessado.'" class="form-control" name="interessado" id="interessado"> </td>');
                    }
                    echo utf8_encode('
                            <td><label id="cnpj">'.$cnpj.'</label> <input type="hidden" value="'.$cnpj.'" class="form-control" name="cnpj" id="cnpj"> </td>

                            <td>'.$saida_procuradoria.' <input type="hidden" value="'.$saida_procuradoria.'" class="form-control" name="saida_procuradoria" id="saida_procuradoria"></td>
                            
                            <td><label id="ret_proc_nome">'.$retorno_procuradoria.'</label><input type="hidden" value="'.$retorno_procuradoria.'" class="form-control" name="retorno_procuradoria" id="retorno_procuradoria" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>

                            <td><label id="sai_prex_nome">'.$saida_prex.'</label><input type="hidden" value="'.$saida_prex.'" class="form-control" name="saida_prex" id="saida_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="ret_prex_nome">'.$retorno_prex.'</label><input type="hidden" value="'.$retorno_prex.'" class="form-control" name="retorno_prex" id="retorno_prex" onclick="editar();" data-inputmask=""alias": "dd/mm/yyyy"" data-mask></td>
                            <td><label id="pendencia_nome">'.$pendencia.'</label><input type="hidden" value="'.$pendencia.'" class="form-control" name="pendencia" id="pendencia" onclick="editar();"></td>
                            <td><label>'.$data_arquivamento.'</label><input type="hidden" value="'.$data_arquivamento.'" class="form-control" name="data_arquivamento" id="data_arquivamento" onclick="editar();"></td>
                            <td><label>'.$data_email_01.'</label><input type="hidden" value="'.$data_email_01.'" class="form-control" name="data_arquivamento" id="data_arquivamento" onclick="editar();"></td>
                            <td><label>'.$data_email_02.'</label><input type="hidden" value="'.$data_email_02.'" class="form-control" name="data_arquivamento" id="data_arquivamento" onclick="editar();"></td>
                            <td><label id="pendencia_nome">'.$observacao.'</label><input type="hidden" value="'.$observacao.'" class="form-control" name="observacao" id="observacao" onclick="editar();"></td>');


                     if($arquivo == ""){
                      
                    }else if($arquivo != ""){
                      echo'
                      <td><a href="convenio_pendentes/'.$arquivo.'"><input type="button" value="'.$arquivo.'" class="btn btn-success" style="width:100%;" name="observacao" id="observacao" onclick="editar();"></a></td>';
                          }

                        echo'  </tr>';
                  } 
                        echo '<td><input type="submit" name="btn_mover" value="MOVER" class="btn btn-block btn-danger" onClick="Enviar(1);"></td>';
                        echo '<td><input type="submit" name="btn_arquivar" value="ARQUIVAR" class="btn btn-block btn-primary" onClick="Enviar(2);"></td>';
                        
                        echo '</form>';

                 ?>
                <tr>
                  <td></td>
                  <form action="acao_inserir_conv_pendente.php" enctype="multipart/form-data" method="POST">
                  <td><input type="text" class="form-control" name="dt_abertura" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required></td>
                  <td><input type="text" id="mask" data-inputmask='"mask": "999999/99-99"' data-mask maxlength="12" class="form-control" name="processo" placeholder="Nº Processo" required></td>
                  <td><input type="text" class="form-control" name="interessado" placeholder="Interessado" required></td>
                  <td><input type="text" class="form-control" data-inputmask='"mask": "99.999.999/9999-99"' data-mask maxlength="18" name="cnpj" placeholder="CNPJ"></td>
                  <td><input type="text" class="form-control" name="saida_procuradoria" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required></td>
                  <td><input type="text" class="form-control" name="retorno_procuradoria" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="saida_prex" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="retorno_prex" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="pendencia" placeholder="Pendência"></td>
                  <td><input type="text" class="form-control" name="data_arquivamento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="data_email_01" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="data_email_02" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask></td>
                  <td><input type="text" class="form-control" name="observacao" placeholder="Observação"></td>
                  <td><input name="pdf" class="realupload" type="file" id="arquivo_file" accept=”image/*”></td>
                  <td><button type="submit" class="btn btn-block btn-success">INSERIR</button></td>
                  </form>
                
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!--formulario que atualiza os convenios pendentes-->
          <!--primeiro e verificado na funcao completarpen se a empresa existe e depois e mostrado os resultados que estejam parecidos com o que foi escrito-->
          <!--apos a verificacao e recebido na input do formulario para verificar no banco depois do disparo do botao atualizar que ira para a pagina convenios_pendentes_atualizar.php-->
        </div>
      </div>
      <div class="row">
      <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Atualizar Convênio Pendente</h3>
              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group" id="btn3" style="display: block;">
                <form action="page_atualizar_convenios_pendentes.php" method="POST">
                  <div class="form-group" id="pesquisa">
                    <div class="input-icon right" id="busca">
                      <div class="col-md-12">
                        <input id="nome" type="text" name="nome" onkeypress="completarpen();" placeholder="Nome do Convênio" class="form-control" /><br>
                       
                        <div class="col-md-8">
                        </div>
                          <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary" name="btnpen" style="float: right; display:block;">Atualizar</button>
                          </div>
                      </div>     
                    </div>
                  </div>
                </form>
              </div>     
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Excluir Convênio</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
            </div>
            <div class="box-body">
              <div class="form-group" id="btn3" style="display: block;">
                <form action="acao_deleta_conv_pendentes.php" method="POST">
                  <div class="form-group" id="pesquisa">
                    <div class="input-icon right" id="busca">
                        <div class="col-md-12">
                        <input id="nome1" type="text" name="nome1" onkeypress="completar_del();" placeholder="Nome do Convênio" class="form-control" /><br>
                       
                        <div class="col-md-8">
                        </div>
                          <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-danger" name="btna" style="float: right; display:block;">Excluir</button>
                          </div>
                      </div> 
                    </div>
                   <div id="resultado3"></div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
    </div>
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
<script src="../../dist/js/funcs_conv_pendentes_adm.js"></script>

<!-- <script src="../../dist/js/funcs_Conv_and.js"></script> -->
<!-- Page script -->
<!-- <script src="../../dist/js/funcs_conv_and.js"></script>

<script src="../../dist/js/funcs_conv_and_ok.js"></script> -->

<script>
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
  