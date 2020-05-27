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
    <!-- Content Header (Page header) -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">
          <div class="box box-primary collapsed-box">
            <div class="box-header">
              <h3 class="box-title">Gerar PDF de um Termo</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> VISUALIZAR</i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding-bottom:10px;">
              <form action="preencher_termo.php" method="POST">
                <div class="col-md-2"></div>
                <div class="col-sm-6" style="float:left;">
                  <input type="number" class="form-control" name="id_termo_compromisso" placeholder="ID DO TERMO DE COMPROMISSO" required>
                </div>
                  <?php 
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $dia = strftime('%d', strtotime('today'));
                    $mes = strftime('%B', strtotime('today'));
                    $ano = strftime('%Y', strtotime('today'));
                    $hora = date('H:i:s');
                  ?>
                  <input type="hidden" name="dia" <?php echo 'value='.$dia.'' ?>>
                  <input type="hidden" name="mes" <?php echo 'value='.$mes.'' ?>>
                  <input type="hidden" name="ano" <?php echo 'value='.$ano.'' ?>>
                  <input type="hidden" name="hora" <?php echo 'value='.$hora.'' ?>>
                  <button id="solicitar" type="submit" class="btn btn-primary">GERAR</button>
                  </form>
              </div>
            </div>
          </div>
        <div class="col-md-12">

    
          <!--Termo de compromisso que os alunos tem a possibilidade de ver seus termos e cadastrar outros termos-->
        <?php 
        require ('conn.php');
        mysql_select_db('estagios');

        // CONSULTA DOS TERMOS DE COMPROMISSO
        $sql = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula'");
        $noticias = mysql_fetch_object($sql);
        $resultado = mysql_num_rows($sql);


        if ($resultado == 0){
          echo '<div class="alert alert-danger alert-dismissable"><strong>ATENÇÃO!</strong> VOCÊ NÃO POSSUI NENHUM TERMO VIGENTE!</div>';
        } else if($resultado != 0){

          echo'<br>
                <div class="box box-primary collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title">Seus Termos de Compromisso</h3>
                     <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> VISUALIZAR</i></button>
                </div>
                  </div>';

                  $sql0 = mysql_query("SELECT * FROM alunos WHERE matricula like '$matricula' ");
                  $noticias0 = @mysql_fetch_object($sql0);

                  // BUSCAR O ID DO CURSO
                  session_start();

                  $busca_curso = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$noticias0->nome' or matricula LIKE '$noticias0->matricula'");
                  $x = @mysql_fetch_array($busca_curso);
                  $_SESSION['curso'] = $x['id_curso'];

                  //////////////////////////////////////////////////////////////////////////

                  $sql2 = mysql_query("SELECT variavel FROM termo_compromisso WHERE id_termo_compromisso LIKE '$noticias->id_termo_compromisso'");
                  $fta=mysql_fetch_array($sql2);
                  $result=$fta['variavel'];

             echo'<div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tr>
                        <th>ID_TCE</th>
                        <th>ID_CURSO</th>
                        <th>VALOR_BOLSA</th>
                        <th>CONCEDENTE/EMPRESA</th>
                        <th>SETOR_UFC</th> 
                        <th>DATA_INICIO</th>
                        <th>DATA_TERMINO</th> 
                        <th>RESCISÃO_TCE</th>
                        <th>CARGA_HORARIA</th>
                        <th>HORA_ENTRADA</th>
                        <th>HORA_SAIDA</th>
                        <th>VARIAVEL</th>
                        <th>TIPO_TERMO</th>
                        <th>CLASSIFICACAO_TERMO</th>
                        <th>RELATORIO</th>
                        <th>DATA_RELATORIO 01</th>
                        <th>DATA_RELATORIO 02</th>
                        <th>DATA_RELATORIO 03</th>
                        <th>DATA_RELATORIO 04</th>
                        <th>AGENTE</th>
                        <th>PROF.ORIENTADOR</th>
                        <th>SIAPE</th>
                        <th>OBSERVAÇÃO</th>
                        <th>ARQUIVO</th>
                        <th>STATUS</th>
                      </tr>';
                      $sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula'");
                      while($noticias3=@mysql_fetch_array($sql2)){ 
                          
                        $empresa = $noticias3['nome'];
                        $sql_empresa = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$empresa' ORDER BY nome ASC");
                        $noticias_empresa = @mysql_fetch_array($sql_empresa);

                        $setor = $noticias3['id_setor'];
                        $sql_setor = mysql_query("SELECT * FROM Setor WHERE id_setor LIKE '$setor' ORDER BY nome_setor ASC");
                        $noticias_setor = @mysql_fetch_array($sql_setor);


                        $agente = $noticias3['agente'];
                        $sq4 = mysql_query("SELECT * FROM agentes WHERE CD_AGENTE LIKE '$agente'");
                        $noticias4 = @mysql_fetch_array($sq4);


            echo utf8_encode('<tr>
                        <td>'.$noticias3['id_termo_compromisso'].'</td>
                        <td>'.$_SESSION['curso'].'</td>
                        <td>'.$noticias3['valor'].'</td>
                        <td>'.$noticias_empresa['nome'].'</td>
                        <td>'.$noticias_setor['nome_setor'].'</td>
                        <td><label style="color:#00a258;">'.$noticias3['dt_inicio'].'</label></td>
                        <td><label  style="color:#00a258;">'.$noticias3['dt_fim'].'</label></td>
                        <td><label  style="color:#dd4b39;">'.$noticias3['rescisao'].'</label></td>
                        <td>'.$noticias3['carga_horaria'].'</td>
                        <td>'.$noticias3['hora_inicio'].'</td>
                        <td>'.$noticias3['hora_fim'].'</td>
                        <td><label  style="color:#00a258;">'.$noticias3['variavel'].'</label></td>
                        <td>'.$noticias3['tipo_termo'].'</td>
                        <td>'.$noticias3['classificacao_termo'].'</td>
                        <td><label  style="color:#00a258;">'.$noticias3['relatorio'].'</label></td>
                        <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_1'].'</label></td>
                        <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_2'].'</label></td>
                        <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_3'].'</label></td>
                        <td><label  style="color:#00a258;">'.$noticias3['data_relatorio_4'].'</label></td>
                        <td>'.$noticias4['NM_AGENTE'].'</td>
                        <td>'.$noticias3['prof_orientador'].'</td>
                        <td>'.$noticias3['siape'].'</td>
                        <td>'.$noticias3['obs'].'</td>');
              
               
                if ( $noticias3['arquivo']==null) {
                  echo '<td>Sem Arquivo</td>'; 
                }
                if ( $noticias3['arquivo']!=null) {
                  echo '<td><a href="termos_pdf/'.$noticias3['arquivo'].'" target="_blank" >Abrir</a></td>'; 
                }
                  echo '<td>'.$noticias3['status'].'</td>
                        <td><input type="hidden" class="form-control" onclick="salvar();" name="id_tce" placeholder="R$ 000.00" value="'.$noticias3['id_termo_compromisso'].'"></td>
                      </tr>';}
              echo '</table>
                  </div>
                </div>
              </div>
            </div>
           ';}


        // INCLUIR TERMO DE COMPROMISSO

        echo '
          <div class="row">
              <div class="col-xs-12"><br>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Cadastrar Termo de Compromisso</h3>
                  </div>
                  <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
          <tr>
            <th>VALOR_BOLSA</th>
            <th>CONCEDENTE/EMPRESA</th>
            <th>SETOR_UFC</th> 
            <th>DATA_INICIO</th>
            <th>DATA_TERMINO</th> 
            <th>RESCISÃO_DO_TCE</th>
            <th>CARGA_HORARIA</th>
            <th>HORA_ENTRADA</th>
            <th>HORA_SAIDA</th>
            <th>HORARIO_VARIADO</th>
            <th>TIPO_DE_TERMO</th>
            <th>CLASSIFICAÇÃO_DO_TERMO</th>
            <th>RELATORIO_SEMESTRAL</th>
            <th>DATA_RELATORIO 01</th>
            <th>DATA_RELATORIO 02</th>
            <th>DATA_RELATORIO 03</th>
            <th>DATA_RELATORIO 04</th>
            <th>AGENTE_DE_INTEGRAÇÂO</th>
            <th>PROF.ORIENTADOR</th>
            <th>SIAPE</th>
            <th>ARQUIVO</th>
            <th>OBSERVAÇÃO</th>
          </tr>
          <tr>
          <form action="acao_tce.php" method="POST">
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar1" class="form-control" name="valor_n" placeholder="R$ 000.00" onkeypress="mascara( this, mvalor );" maxlength="14" required></td>
            </div>
            <td>
            <div class="col-xs-6">
      <input type="text" id="empresa" OnKeypress="completar();" name="concedente_n" style="width: 450px;" class="form-control" required>
     
    ';
                      echo '</div>
                              </td>  
                              <td>
                              <div class="form-group">
                                 <select class="form-control select2" id="desabilitarsetor" name="setor_n" style="width: 100%;">
                                    <option selected="selected"></option>';
                                   
                                    $sql10 = mysql_query("SELECT * FROM Setor ORDER BY nome_setor ASC");
                                    
                                    while($resultado10 = @mysql_fetch_object($sql10)){
                                       echo utf8_encode('<option value="'.$resultado10->id_setor.'">'.$resultado10->nome_setor.'</option>');
                                    }
                      
                            echo '</select> 
                            </div>
                            </td>

            <div class="col-xs-6">
              <td><input type="text" id="desabilitar3" class="form-control" name="dt_ini_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar4" class="form-control" name="dt_fim_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" required></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar5" class="form-control" name="rescisao_n" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
            </div>
            <div class="col-xs-2">
              <td><input type="text" id="desabilitar9" class="form-control" name="carga_hrr_n" placeholder="00 hs" required></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar6" class="form-control" name="hr_ini_n" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5" ></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar7" class="form-control" name="hr_fim_n" placeholder="00:00" id="hora" OnKeypress="mascara(this, mhora)" size="5" maxlength="5"></td>
            </div>
            <td>
              <div class="form-group">
                <select class="form-control select2" id="desabilitar8" name="variavel_n" style="width: 100%;" required>
                  <option selected="selected"></option>
                  <option>SIM</option>
                  <option>NÃO</option>
                </select>
              </div>
            </td>
            <div class="col-xs-6">
              <td>
                <div class="form-group">
                  <select class="form-control select2" id="desabilitar10" name="tp_termo_n" style="width: 100%;" required>
                    <option selected="selected"></option>
                    <option>T.A</option>
                    <option>T.C</option>
                  </select>
                </div>
              </td>
            </div>
            <td>
              <div class="form-group">
                <select class="form-control select2" id="desabilitar11"  name="cl_termo_n" style="width: 100%;" required>
                  <option selected="selected"></option>
                  <option>OBRIGATORIO</option>
                  <option>NÃO OBRIGATORIO</option>
                </select>
              </div>
            </td>
            <td> 
              <div class="form-group">
                <select class="form-control select2" id="desabilitar12" name="relatorio_n" style="width: 100%;" required>
                  <option selected="selected"></option>
                  <option>SIM</option>
                  <option>NÃO</option>
                </select>
              </div>
            </td>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_1" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_2" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_3" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
            </div>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar15" class="form-control" name="data_relatorio_4" placeholder="00-00-0000" id="data" onkeypress="mascara(this, mdata);" size="14" maxlength="10" ></td>
            </div>
            <td>
              <div class="form-group">
                <select class="form-control select2" id="desabilitar13" name="agente_n" style="width: 100%;" required>
                  <option selected="selected"></option> ';
                  $sql5 = mysql_query("SELECT * FROM agentes");
                  while($resultado5=mysql_fetch_object($sql5)){
echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');}
          echo '</select>
              </div>
            </td>
            <div class="col-xs-6">
              <td><input type="text" id="desabilitar14" class="form-control" name="prof_n" placeholder="Prof. Orientador" required></td>
            </div>
            <div class="col-xs-6">
              <td><input type="number" id="desabilitar16" class="form-control" name="siape" placeholder="SIAPE" style="width:150px;" required></td>
              <td><input name="pdf" id="desabilitar17" class="realupload" type="file" id="arquivo_file" accept=”image/*”/></td>
              <td><input type="text" style="width:450px" id="desabilitar18" class="form-control" name="obs" placeholder="Observacao"></td>
            </div>
            <input type="hidden" class="form-control" name="id_aluno" value="'.$matricula.'">
          </tr>  
        </table>
      </div><br>';
          $sql6 = mysql_query("SELECT * FROM termo_compromisso where matricula_aluno like '$noticias->matricula'  ORDER BY id_termo_compromisso ASC ");  
          $resultado6=mysql_fetch_object($sql6);
               
         /* if ( $resultado6->obs==null) {
            echo '<a id="btn_adc" onclick="adc();" style="cursor:pointer;" class="btn btn-primary pull-right" >Adicionar</a> '; 
          }
          if ( $resultado6->obs!=null) {
            echo '<a id="btn_adc" style="cursor:no-drop;" class="btn btn-danger pull-right" >Adicionar</a> '; 
          } */
     echo'<div class="row">
      <div class="col-md-12">
              <div class="col-xs-12">
              <button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="cdt" value="cadastrar"> Cadastrar </button>
              </div>
      </div>
      </div></br>';

          echo '</form>';
               
        ?>
          
        </div>

      <div class="col-md-6">
                                <div class="box box-primary collapsed-box" id="atu" style="display: block;">
                                  <div class="box-header with-border">
                                      <h3 class="box-title">Atualizar TCE que você cadastrou</h3>
                                      <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> VISUALIZAR</i>
                                        </button>
                                      </div>
                                  </div>
                                  <div class="box-body">
                                      <div class="form-group" id="btn3" style="display: block;">
                                        <form action="busca_tce_atualizar.php" method="POST">
                                             <td>
                    <div class="form-group">
                      <select class="form-control select2" id="tce_atu" name="tce_atu" style="width: 100%;" required>
                      <?php

                                      $consulta2 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula'");
                                      $result2 = mysql_num_rows($consulta2);

                                      while ($sql2 = mysql_fetch_array($consulta2)) {
                                        $id_termo_compromisso = $sql2['id_termo_compromisso'];

                                        echo utf8_encode('<option value="'.$id_termo_compromisso.'">'.$id_termo_compromisso.'</option>');
                                      }

                                 ?>
                      </select>
                    </div>
                  </td>
                  <div class="col-md-8"></div>
                  <div class="col-md-4">
                  <button type="submit" class="btn btn-block btn-primary" name="btn_atu" style="float: right; display:block;">Atualizar</button>
                  </div>
                    </form>
                    </div>
                    </div>
                   	</div>
               		</div>


               		

                      <div class="col-md-6">
                          <div class="box box-primary collapsed-box" id="atu" style="display: block;">
                            <div class="box-header with-border">
                                <h3 class="box-title">Excluir TCE que você cadastrou</h3>
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> VISUALIZAR</i>
                                  </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group" id="btn3" style="display: block;">
                                  <form action="busca_tce_atualizar.php" method="POST">
                                       <td>
              <div class="form-group">
                <select class="form-control select2" id="desabilitar8" name="variavel_n" style="width: 100%;" required>
                  <option selected="selected"></option>
                  
                </select>
              </div>
            </td>
                                              <div class="col-md-8"></div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-block btn-primary" name="btn_atu" style="float: right; display:block;">Atualizar</button>
                                                </div>
                                    </form>
                                  </div>
                              </div>
                            </div>
                        </div>
    </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
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
