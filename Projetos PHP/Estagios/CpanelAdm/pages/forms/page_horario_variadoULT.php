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
  <title>Agência de Estágio | Horário Variado</title>

  <!--//// IMPORTAÇÕES ////-->

  <!--   <link rel="shortcut icon" href="images/ico/icon.png"> -->
  <!-- Tell the browser to be responsive to screen width -->
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">-->
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

  <!--//// IMPORTAÇÕES JAVA SCRIPT ////-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  
  <!-- AUTO COMPLETE - JQUERY UI -->
  <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

  <script type="text/javascript">
    function Editar(){
      var mudar = document.getElementById("editar").style.display = 'none';
      var mudar = document.getElementById("btn_atu_hv").style.display = 'block'; 
      var mudar = document.getElementById("c_edicao").style.display = 'block';
      var mudar = document.getElementById("seg_manh").disabled = false;
      var mudar = document.getElementById("seg_tard").disabled = false;
      var mudar = document.getElementById("seg_noit").disabled = false;
      var mudar = document.getElementById("ter_manh").disabled = false;
      var mudar = document.getElementById("ter_tard").disabled = false;
      var mudar = document.getElementById("ter_noit").disabled = false;
      var mudar = document.getElementById("qua_manh").disabled = false;
      var mudar = document.getElementById("qua_tard").disabled = false;
      var mudar = document.getElementById("qua_noit").disabled = false;
      var mudar = document.getElementById("qui_manh").disabled = false;
      var mudar = document.getElementById("qui_tard").disabled = false;
      var mudar = document.getElementById("qui_noit").disabled = false;
      var mudar = document.getElementById("sex_manh").disabled = false;
      var mudar = document.getElementById("sex_tard").disabled = false;
      var mudar = document.getElementById("sex_noit").disabled = false;
      var mudar = document.getElementById("sab_manh").disabled = false;
      var mudar = document.getElementById("sab_tard").disabled = false;
      var mudar = document.getElementById("sab_noit").disabled = false;
      var mudar = document.getElementById("dom_manh").disabled = false;
      var mudar = document.getElementById("dom_tard").disabled = false;
      var mudar = document.getElementById("dom_noit").disabled = false;
     
    }
    function C_edicao(){
      var mudar = document.getElementById("editar").style.display = 'block';
      var mudar = document.getElementById("btn_atu_hv").style.display = 'none'; 
      var mudar = document.getElementById("c_edicao").style.display = 'none';
      var mudar = document.getElementById("seg_manh").disabled = true;
      var mudar = document.getElementById("seg_tard").disabled = true;
      var mudar = document.getElementById("seg_noit").disabled = true;
      var mudar = document.getElementById("ter_manh").disabled = true;
      var mudar = document.getElementById("ter_tard").disabled = true;
      var mudar = document.getElementById("ter_noit").disabled = true;
      var mudar = document.getElementById("qua_manh").disabled = true;
      var mudar = document.getElementById("qua_tard").disabled = true;
      var mudar = document.getElementById("qua_noit").disabled = true;
      var mudar = document.getElementById("qui_manh").disabled = true;
      var mudar = document.getElementById("qui_tard").disabled = true;
      var mudar = document.getElementById("qui_noit").disabled = true;
      var mudar = document.getElementById("sex_manh").disabled = true;
      var mudar = document.getElementById("sex_tard").disabled = true;
      var mudar = document.getElementById("sex_noit").disabled = true;
      var mudar = document.getElementById("sab_manh").disabled = true;
      var mudar = document.getElementById("sab_tard").disabled = true;
      var mudar = document.getElementById("sab_noit").disabled = true;
      var mudar = document.getElementById("dom_manh").disabled = true;
      var mudar = document.getElementById("dom_tard").disabled = true;
      var mudar = document.getElementById("dom_noit").disabled = true;
    } 
  </script>

  <!-- FUNÇÕES JAVA SCRIPT -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--Barra do topo-->
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <span class="logo-mini"><img src="../../brasao.png"></span>
      <span class="logo-lg"><strong>CLICK<i class="fa fa-caret-left"></i></strong> Estágios</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php include 'barra_topo.php'; ?>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Painel do Usuário -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="perfil/<?php echo $foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Barra de Menu -->
      <?php include 'barra_menu.php'; ?>
    </section>
  </aside>

<!-- Onde encontramos o conteúdo da página -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Horários do Termo</h3><br>
              
<?php 

  
    
    if(isset($_POST['btn_ins2'])){

      $id_termo1 = $_POST['id_tce_hv'];

        echo '
              <form action="acao_horario_variado.php" method="POST">  
                <div class="box-body table-responsive no-padding">
                  <!-- Tabela de Horário Variado -->
                  <br>
                  	<input type="text" class="form-control" name="id_termo" value="'.$id_termo1.'" disabled>
                  <br>
                  <table class="table table-hover">
                    <tr>
                        <th><center>TURNOS</center></th>
                        <th><center>SEGUNDA</center></th>
                        <th><center>TERÇA</center></th>
                        <th><center>QUARTA</center></th>
                        <th><center>QUINTA</center></th>
                        <th><center>SEXTA</center></th>
                        <th><center>SÁBADO</center></th>
                        <th><center>DOMINGO</center></th>
                    </tr>
                    <tr>
                      <td>MANHÃ</td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_manh" name="seg_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_manh" name="ter_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_manh" name="qua_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_manh" name="qui_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_manh" name="sex_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_manh" name="sab_manh" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_manh" name="dom_manh" maxlength="14" ></td>
                    </tr>
                    <tr>
                      <td>TARDE</td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_tard" name="seg_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_tard" name="ter_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_tard" name="qua_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_tard" name="qui_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_tard" name="sex_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_tard" name="sab_tard" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_tard" name="dom_tard" maxlength="14" ></td>
                    </tr>
                    <tr>
                      <td>NOITE</td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_noit" name="seg_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_noit" name="ter_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_noit" name="qua_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_noit" name="qui_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_noit" name="sex_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_noit" name="sab_noit" maxlength="14" ></td>
                      <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_noit" name="dom_noit" maxlength="14" ></td>
                    </tr>
                  </table>
                  <div class="col-md-2">
                      <br>
                      <input type="hidden" class="form-control" name="id_termo" value="'.$id_termo1.'">
                      <button type="submit" id="btn_ins_hv" class="btn btn-primary pull-left" name="btn_ins_hv" > Inserir </button>
                  </div>
                  <div class="col-md-8"></div>
                  <div class="col-md-2">
                      <br>
                      <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right" > Cancelar </button></a>                      
                  </div>
                </div>
              </form>';
    }
    if(isset($_POST['btn_atu2'])){

      $id_termo2 = $_POST['id_tce_hv'];

      $select_hrs_variados = mysql_query("SELECT * FROM horario_variado WHERE id_termo LIKE '$id_termo2'");
      $cont_hr = mysql_num_rows($select_hrs_variados);
      $horarios_tce = mysql_fetch_object($select_hrs_variados);

        if($cont_hr != 0){
      echo '
              <form action="acao_horario_variado.php" method="POST">  
                <div class="box-body table-responsive no-padding">
                  <!-- Tabela de Horário Variado -->
                  <br>
                    <input type="text" class="form-control" name="id_termo" value="'.$id_termo2.'" disabled>
                  <br>
                  <table class="table table-hover" id="table1" style="display:block;">
                    <tr>
                        <th><center>TURNOS</center></th>
                        <th><center>SEGUNDA</center></th>
                        <th><center>TERÇA</center></th>
                        <th><center>QUARTA</center></th>
                        <th><center>QUINTA</center></th>
                        <th><center>SEXTA</center></th>
                        <th><center>SÁBADO</center></th>
                        <th><center>DOMINGO</center></th>
                    </tr>
                    <tr>
                      <td>MANHÃ</td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_manh" name="seg_manh" maxlength="14" value="'.$horarios_tce->seg_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_manh" name="ter_manh" maxlength="14" value="'.$horarios_tce->ter_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_manh" name="qua_manh" maxlength="14" value="'.$horarios_tce->qua_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_manh" name="qui_manh" maxlength="14" value="'.$horarios_tce->qui_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_manh" name="sex_manh" maxlength="14" value="'.$horarios_tce->sex_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_manh" name="sab_manh" maxlength="14" value="'.$horarios_tce->sab_M.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_manh" name="dom_manh" maxlength="14" value="'.$horarios_tce->dom_M.'" disabled ></td>
                    </tr>
                    <tr>
                      <td>TARDE</td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_tard" name="seg_tard" maxlength="14" value="'.$horarios_tce->seg_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_tard" name="ter_tard" maxlength="14" value="'.$horarios_tce->ter_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_tard" name="qua_tard" maxlength="14" value="'.$horarios_tce->qua_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_tard" name="qui_tard" maxlength="14" value="'.$horarios_tce->qui_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_tard" name="sex_tard" maxlength="14" value="'.$horarios_tce->sex_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_tard" name="sab_tard" maxlength="14" value="'.$horarios_tce->sab_T.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_tard" name="dom_tard" maxlength="14" value="'.$horarios_tce->dom_T.'" disabled ></td>
                    </tr>
                    <tr>
                      <td>NOITE</td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="seg_noit" name="seg_noit" maxlength="14" value="'.$horarios_tce->seg_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="ter_noit" name="ter_noit" maxlength="14" value="'.$horarios_tce->ter_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qua_noit" name="qua_noit" maxlength="14" value="'.$horarios_tce->qua_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="qui_noit" name="qui_noit" maxlength="14" value="'.$horarios_tce->qui_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sex_noit" name="sex_noit" maxlength="14" value="'.$horarios_tce->sex_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="sab_noit" name="sab_noit" maxlength="14" value="'.$horarios_tce->sab_N.'" disabled ></td>
                     <td><input type="text" class="form-control" onkeypress="mascara2(this, mascara);" id="dom_noit" name="dom_noit" maxlength="14" value="'.$horarios_tce->dom_N.'" disabled ></td>
                    </tr>
                  </table>
                  <div class="col-md-1">
                    <br>
                      <button type="button" id="editar" class="btn btn-primary pull-left" onclick="Editar()" style="display:block;"> Editar </button>
                      <button type="submit" id="btn_atu_hv" class="btn btn-primary pull-left" name="btn_atu_hv" style="display:none;"> Atualizar </button>
                  </div>
                  <div class="col-md-2">
                    <br>
                      <button type="button" id="c_edicao" class="btn btn-danger pull-left" onclick="C_edicao()" style="display:none;"> Cancelar Edição </button> 
                  </div>
                  <div class="col-md-7"></div>
                  <div class="col-md-2">
                    <br>
                      <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right" > Cancelar </button></a>
                      <input type="hidden" class="form-control" name="id_termo" value="'.$id_termo2.'">
                      
                  </div>
               </div>
              </form>';
          }
        if($cont_hr == 0){
          echo '
            <div class="col-md-12">
              <div class="box-body table-responsive no-padding">
                <!-- Tabela de Horário Variado -->
                <br>
                  <input type="text" class="form-control" name="id_termo" value="'.$id_termo2.'" disabled>
                <br>                        
                <center>
                <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                  <p><font color="red">Este termo Não Possui Horários Cadastrados</font></p>
                </div>
                </center>
              </div>
            </div><br>
              <div class="col-md-10"></div>
              <div class="col-md-2">
                <br>
                <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right" > Voltar </button></a>      
              </div>
            ';
        }
    }

              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Rodapé da Página -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://ufc.br">UFC</a> - Agência de Estágios</strong> Todos os direitos reservados.
  </footer>

  <!-- BARRA DE CONFIGURAÇÃO DA PÁGINA -->
  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
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

      </div>
      <div class="tab-pane" id="control-sidebar-stats-tab"></div>
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

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Permitir redirecionamento de correio
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Outros conjuntos de opções estão disponíveis
            </p>
          </div>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expor o nome do autor em postos
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
             Permitir que o usuário para mostrar o seu nome nas postagens do blog
            </p>
          </div>

          <h3 class="control-sidebar-heading">Configurações de bate-papo</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Mostre-me como on-line
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>

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
        </form>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>


<!--//// jAVA SCRIPT ////-->

<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
 
<!-- MÁSCARAS -->
<script type="text/javascript">
  function mascara2(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
  }
  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
 /* 
function mascara2(x){
  if(x.value.length == 2){
    x.value = x.value + ':';
  }
  if(x.value.length == 5){
   x.value = x.value + 'h a '; 
  }
  if(x.value.length == 11){
    x.value = x.value + ':';
  }
  if(x.value.length == 14){
   x.value = x.value + 'h'; 
  }
}*/
function mascara(v){
  v=v.replace(/\D/g,"");
  v=v.replace(/(\d{15})(\d)/g,"$1$2-");
  v=v.replace(/(\d{9})(\d)/g,"$1:$2");
  v=v.replace(/(\d{4})(\d)/g,"$1h a $2");
  v=v.replace(/(\d{2})(\d)/g,"$1:$2");
  return v;
}
</script>
</body>
</html>
