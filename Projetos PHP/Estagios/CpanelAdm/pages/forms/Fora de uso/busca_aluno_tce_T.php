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

  <!-- CONFLITOS DE PLUGINS
  <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script> -->

  <script>
    function siim() {
      var mudar = document.getElementById("nome").style.display = 'none';
      var mudar = document.getElementById("dasinp").style.display = 'block';
      var mudar = document.getElementById("input1").disabled = true;
      var mudar = document.getElementById("busca").style.display = 'none';
      var mudar = document.getElementById("conteudo").style.display = 'block';
      var mudar = document.getElementById("td").style.display = 'block';
      var mudar = document.getElementById("btn_adc").style.display = 'block';
      var mudar = document.getElementById("dasinp1").style.display = 'block';


    }

    function completar(){
      $(document).ready(function()
    {
      $('#desabilitar2').autocomplete(
      {
        source: "search.php",
        minLength: 1
      });

    });
    }
    function completar_con_aluno(){
      $(document).ready(function()
    {
      $('#aluno').autocomplete(
      {
        source: "search_consulta_aluno.php",
        minLength: 1
      });

    });
    }
    function adc_aluno(){
      var up = document.getElementById("adc_aluno").style.display = 'block';
       var up = document.getElementById("adc_aluno_externo").style.display = 'none';
    }
    function des_aluno(){
      var up = document.getElementById("adc_aluno").style.display = 'none';
      var up = document.getElementById("adc_aluno_externo").style.display = 'none';
    }
    function adc_aluno_ex(){
      var up = document.getElementById("adc_aluno_externo").style.display = 'block';
       var up = document.getElementById("adc_aluno").style.display = 'none';
    }
    function des_aluno_ex(){
      var up = document.getElementById("adc_aluno_externo").style.display = 'none';
      var up = document.getElementById("adc_aluno").style.display = 'none';
    }
    function alterar(){
      var up = document.getElementById("btn_02").style.display = 'block';
      var up = document.getElementById("btn_03").style.display = 'block';
      var up = document.getElementById("btn_01").style.display = 'none';
      var up = document.getElementById("habilitar").disabled = false;
      var up = document.getElementById("habilitar1").disabled = false;
      var up = document.getElementById("habilitar2").disabled = false;
      var up = document.getElementById("habilitar3").disabled = false;
      var up = document.getElementById("habilitar5").disabled = false;
      var up = document.getElementById("habilitargrupo").disabled = false;
      var up = document.getElementById("obs").disabled = false;
      var up = document.getElementById("desabilitar1").disabled = true;
      var up = document.getElementById("desabilitar2").disabled = true;
      var up = document.getElementById("desabilitar3").disabled = true;
      var up = document.getElementById("desabilitar4").disabled = true;
      var up = document.getElementById("desabilitar5").disabled = true;
      var up = document.getElementById("desabilitar6").disabled = true;
      var up = document.getElementById("desabilitar7").disabled = true;
      var up = document.getElementById("desabilitar8").disabled = true;
      var up = document.getElementById("desabilitar9").disabled = true;
      var up = document.getElementById("desabilitar10").disabled = true;
      var up = document.getElementById("desabilitar11").disabled = true;
      var up = document.getElementById("desabilitar12").disabled = true;
      var up = document.getElementById("desabilitar13").disabled = true;
      var up = document.getElementById("desabilitar14").disabled = true;
      var up = document.getElementById("desabilitar15").disabled = true;
      var up = document.getElementById("desabilitar16").disabled = true;
      var up = document.getElementById("desabilitar17").disabled = true;
      var up = document.getElementById("desabilitar18").disabled = true;        
    }
    function cancelar(){
      var up = document.getElementById("btn_02").style.display = 'none';
      var up = document.getElementById("btn_03").style.display = 'none';
      var up = document.getElementById("btn_01").style.display = 'block';
      var up = document.getElementById("habilitar").disabled = true;
      var up = document.getElementById("habilitar1").disabled = true;
      var up = document.getElementById("habilitar2").disabled = true;
      var up = document.getElementById("habilitar3").disabled = true;
      var up = document.getElementById("habilitar4").disabled = true;
      var up = document.getElementById("habilitar5").disabled = true;
      var up = document.getElementById("habilitargrupo").disabled = true;
      var up = document.getElementById("obs").disabled = true;
      var up = document.getElementById("desabilitar1").disabled = false;
      var up = document.getElementById("desabilitar2").disabled = false;
      var up = document.getElementById("desabilitar3").disabled = false;
      var up = document.getElementById("desabilitar4").disabled = false;
      var up = document.getElementById("desabilitar5").disabled = false;
      var up = document.getElementById("desabilitar6").disabled = false;
      var up = document.getElementById("desabilitar7").disabled = false;
      var up = document.getElementById("desabilitar8").disabled = false;
      var up = document.getElementById("desabilitar9").disabled = false;
      var up = document.getElementById("desabilitar10").disabled = false;
      var up = document.getElementById("desabilitar11").disabled = false;
      var up = document.getElementById("desabilitar12").disabled = false;
      var up = document.getElementById("desabilitar13").disabled = false;
      var up = document.getElementById("desabilitar14").disabled = false;
      var up = document.getElementById("desabilitar15").disabled = false;
      var up = document.getElementById("desabilitar16").disabled = false;
      var up = document.getElementById("desabilitar17").disabled = false;
      var up = document.getElementById("desabilitar18").disabled = false;
      var up = document.getElementById("desabilitarsetor").disabled = false;


    }
    function adc(){
      var mudar = document.getElementById("btn_adc").style.display = 'none';  
      var mudar = document.getElementById("adc").style.display = 'block';  
      var mudar = document.getElementById("btn_cdt").style.display = 'block'; 
      var mudar = document.getElementById("btn_cancelar").style.display = 'block'; 
      var mudar = document.getElementById("maisde1").style.display = 'block'; 
    } 
    function valor(){
      var a = document.getElementById("valor").value;
    }
    function cancelar2(){
      var mudar = document.getElementById("btn_adc").style.display = 'block';  
      var mudar = document.getElementById("adc").style.display = 'none';  
      var mudar = document.getElementById("btn_cdt").style.display = 'none';
      var mudar = document.getElementById("btn_cancelar").style.display = 'none';
      var mudar = document.getElementById("maisde1").style.display = 'none';
    }
    function consu(){
      var mudar = document.getElementById("btn_adc").style.display = 'none';  
      var mudar = document.getElementById("adc").style.display = 'none';  
      var mudar = document.getElementById("btn_cdt").style.display = 'none';
      var mudar = document.getElementById("btn_cancelar").style.display = 'none';

      var mudar = document.getElementById("dados").style.display = 'none';  
      var mudar = document.getElementById("atu").style.display = 'none';
      var mudar = document.getElementById("del").style.display = 'none';
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
            <!--<div class="col-md-8">-->
              		<section class="content">
              			<div class="box box-primary collapsed-box">
			                <div class="box-header with-border">
			                    <h3 class="box-title" id="nome_empresa">Consultar Aluno</h3>
			                    <div class="box-tools pull-right">
				                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
				                    </button>
				                </div>
			                </div>
			                <div class="box-body">
			             	    <div class="form-group" id="btn" style="display: block;">
			                        <form action="busca_aluno_tce.php" method="POST">
			                	        <div class="form-group" id="pesquisa">
			                    	        <div class="input-icon right" id="busca">
			                        	        <div class="col-md-12">
			                             	       <input id="aluno" onkeypress="completar_con_aluno()" onkeyup="consu()" type="text" name="aluno" placeholder="Nome/Matrícula do Aluno" class="form-control" /><br>
			                                 
			                                    <div class="col-md-10"></div>
			                                    <div class="col-md-2">
			                                    	<button type="submit" class="btn btn-block btn-primary" name="btnaluno" style="float: right; display:block;">Consultar</button>
			                                    </div>
			                                	</div>
			                              	</div>
			                          	</div>
			                        </form>
			                    </div>
			                </div>
			            </div>
                <!-- SELECT2 EXAMPLE -->
                		<div class="box box-primary" id="dados" style="display: block;">
                  			<div class="form-group">
                   				<div class="box-header with-border">
                    				<div class="box-body">
                      					<h3 class="box-title">Dados do Aluno</h3>
  <?php
// Incluir aquivo de conexão
include("../../../conn.php");
mysql_select_db('estagios');
// Recebe o valor enviado
if(isset($_POST['btnaluno'])){

echo '<form action="acao_tce.php" enctype="multipart/form-data" method="POST">';

    //Recebe valor da input
    $valor = utf8_decode($_POST['aluno']);
 
    // Procura titulos no banco relacionados ao valor
    $sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$valor' or matricula LIKE '$valor' GROUP BY nome");

      //realiza uma contagem dos alunos
      $resulatdo = mysql_num_rows($sql);

        // Verifica se a contagem de '$resultado' é diferente de zero, se for exibe os formulários
        if($resulatdo != 0){
  
          //transforma o registro do aluno em objeto
          $noticias = @mysql_fetch_object($sql);
          
          //armazena o registro da coluna matricula na variavel $matricula
          $matricula = $noticias->matricula;

              $sql0 = mysql_query("SELECT * FROM alunos WHERE matricula like '$matricula' ");
              $noticias0 = @mysql_fetch_object($sql0);

              // Procura titulos na tabela termo_compromisso relacionados ao valor da matricula do aluno
              $sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula' ORDER BY id_termo_compromisso DESC");
              
              //transforma o registro do termo de compromisso do aluno em objeto
              $noticias1 = @mysql_fetch_object($sql1);

              //realiza uma contagem dos TCEs do aluno
              $resulatdo1 = mysql_num_rows($sql1);

                //Formulário com os dados do Aluno
                echo '<div id="dasinp" style="display:block">';
                echo utf8_encode('<br><div class="form-group">
                            
                            <div class="input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-user-plus"></i>
                              </div>
                              <input type="text" id="habilitar" onclick="alterar();" class="form-control" name="nm" value="'.$noticias0->nome.'" placeholder="Nome do Aluno" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" id="habilitar1" name="cpf" onclick="alterar();"  onkeypress="mascara( this, mcpf );" class="form-control" value="'.$noticias0->cpf.'" placeholder="cpf" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="habilitar2" name="rg"  onclick="alterar();" class="form-control" value="'.$noticias0->rg.'" placeholder="RG" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="email" id="habilitar3" name="email"  onclick="alterar();" class="form-control" value="'.$noticias0->email.'" placeholder="E-MAIL" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <input type="text" id="habilitar4" class="form-control" name="matricula" value="'.$noticias0->matricula.'"  placeholder="Nº matricula" disabled>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user-plus"></i>
                                </div>
                                <select class="form-control select2" id="habilitar5" name="curso" style="width: 100%;" disabled><option>'.$noticias0->curso.'</option>');

                                //Seleciona todos os dados da tabela curso em ordem alfabética crescente
                                $sql4 = mysql_query("SELECT * FROM cursos order by curso ASC");

                                //Estrutura de repetição: enquanto existirem registros na tabela curso referentes a consulta, estes serão impressos. Obs: São armazenados na variavel $resultado4
                                while($resultado4=mysql_fetch_object($sql4)){
                                  echo utf8_encode('<option>'.$resultado4->curso.'</option>');
                                }   
  
              echo utf8_encode('</select>
                              </div>
                            </div>
                             <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user-plus"></i>
                                </div>
                             <select class="form-control select2" id="habilitargrupo" name="grupo" style="width: 100%;" disabled>'); 

                                            $grupo1 = mysql_query("SELECT * FROM permissoes_grupo WHERE matricula_aluno LIKE '$noticias->matricula'");
                                            $grupo2 = mysql_fetch_object($grupo1);
                                            $noticias3 = $grupo2->grupo; 
                                              echo utf8_encode('<option value="'.$noticias3.'">'.$noticias3.'</option>'); 

                                      $consulta2 = mysql_query("SELECT * FROM grupo_vagas ORDER BY descricao_grupo ASC");
                                      $result2 = mysql_num_rows($consulta2);

                                      while ($sql2 = mysql_fetch_array($consulta2)) {
                                        $descricao_grupo = $sql2['descricao_grupo'];

                                        echo utf8_encode('<option value="'.$descricao_grupo.'">'.$descricao_grupo.'</option>');
                                      }
  
            echo utf8_encode('</select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-exclamation-triangle"></i>
                              </div>');
                     echo '<input type="textarea" id="obs" onclick="alterar();" class="form-control" name="obs" value="'.$noticias1->obs.'"  placeholder="Nenhuma Observação" disabled>';
          echo utf8_encode('</div>
                        </div>
                        <input type="hidden" name="cd_aluno" value="'.$noticias0->id_aluno.'">
                        <input type="hidden" name="mt_old" value="'.$noticias0->matricula.'">
                        <a id="btn_01" class="btn btn-primary pull-right" onclick="alterar();" style="display:block; margin-right:5px;"> ATUALIZAR DADOS </a>
                        <button type="submit" id="btn_02" class="btn btn-primary pull-right" name="atualizar" onclick="alterar();" style="display:none; margin-right:5px;"> SALVAR </button>
                        <a id="btn_03" class="btn btn-danger pull-right" onclick="cancelar();" style="display:none; margin-right:5px;"> CANCELAR </a>') ;
     
      //////////////////////////////////////////////////////////////////////////////////////////////
      // Verifica se a contagem de '$resultado1' é diferente de zero, se for exibe os formulários //

              if($resulatdo1 != 0){

                     echo'<br>
                          <div class="row">
                            <div class="col-xs-12"><br>
                              <div class="box box-primary">
                                <div class="box-header">
                                  <h3 class="box-title">Termos de Compromisso</h3>
                                </div>';

                                // Procura titulos na tabela termo_compromisso relacionados ao valor da matricula do aluno
                                $sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias0->matricula' ");

                                // BUSCAR O ID DO CURSO
                                session_start();

                                // Procura titulos na tabela alunos relacionados ao valor do nome ou da matricula do aluno
                                $busca_curso = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$noticias0->nome' AND matricula LIKE '$noticias0->matricula'");

                                    //Executa um array nos registros do aluno encontrado 
                                    $x = @mysql_fetch_array($busca_curso);

                                    //pega o nome do curso referente ao id_curso do anluno
                                    $_SESSION['curso'] = $x['id_curso'];

                                //////////////////////////////////////////////////////////////////////////

                                // Procura na coluna 'variavel' da tabela termo de compromisso todos os registros em que 'id_TCE' for igual a variavel $noticias->id_termo_compromisso
                                $sql2 = mysql_query("SELECT variavel FROM termo_compromisso WHERE id_termo_compromisso LIKE '$noticias0->id_termo_compromisso'");

                                    //Executa um array nos registros encontrado 
                                    $fta=mysql_fetch_array($sql2);
                                    
                                    //armazena o valor existente na coluna 'variavel'
                                    $result=$fta['variavel'];


                           //se existir algum TCE, referente a matricula do aluno, reistrado no banco de dados será impressa essa tabela 
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

                                     //Estrutura de repetição: enquanto existirem registros na tabela 'termo_compromisso' referentes a consulta, estes serão impressos. Obs: São armazenados na variavel $resultado3
                                     while($noticias3=@mysql_fetch_array($sql3)){ 

                                      //armazena o registro da coluna nome na variavel $empresa
                                      $empresa = $noticias3['nome'];

                                      // Procura tabela empresas todos os registros em que 'CD_EMPRESA' for igual a variavel $empresa em orde crescente e alfabética
                                      $sql_empresa = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$empresa' ORDER BY nome ASC");

                                      //armazena na variavel $noticias_empresa um array dos registros da consulta anterior
                                      $noticias_empresa = @mysql_fetch_array($sql_empresa);


                                      $setor = $noticias3['id_setor'];

                                      $sql_setor = mysql_query("SELECT * FROM Setor WHERE id_setor LIKE '$setor' ORDER BY nome_setor ASC");

                                      $noticias_setor = @mysql_fetch_array($sql_setor);


                                      //armazena o registro da coluna angente na variavel $agente
                                      $agente = $noticias3['agente'];

                                      // Procura tabela agente todos os registros em que 'CD_AGENTE' for igual a variavel $agente
                                      $sq4 = mysql_query("SELECT * FROM agentes WHERE CD_AGENTE LIKE '$agente'");

                                      //armazena na variavel $noticias4 um array dos registros da consulta anterior
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
                                                </tr>';
                                    }
                            echo '</table>
                                </div>
                              </div>
                            </div>
                          </div>
                          <scrip';
              }
              
              if($resulatdo1 == 0){

                         //se não existir TCE, referente a matricula do aluno, reistrado no banco de dados será impresso esse AVISO e o botão ADICIONAR      
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
                                            <th><label  style="color:#dd4b39;">O(A) ALUNO(A) ');echo utf8_encode($noticias0->nome); echo utf8_encode(' NÃO POSSUI TERMO DE COMPROMISSO!</label></th>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>');
              }  
                          

                          //Clique no botão Adicionar: Exibirá essa tabela com um formulário de cadastro de um novo TCE 
                          echo '<div id="adc" style="display:none;" class="box-body table-responsive no-padding">
                                  <div class="row">
                                    <div class="col-xs-12"><br>
                                      <div class="box box-primary">
                                        <div class="box-header">
                                          <h3 class="box-title">Adicionar Termos de Compromisso</h3>
                                        </div>
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
                                            <div class="col-xs-6">
                                              <td><input type="text" id="desabilitar1" class="form-control" name="valor_n" placeholder="R$ 000.00" onkeypress="mascara( this, mvalor );" maxlength="14" required></td>
                                            </div>
                                            <td>
                                            <div class="col-xs-6">
                                      <input type="text" id="desabilitar2" OnKeypress="completar();"  name="concedente_n" style="width: 450px;" class="form-control" required>
                                     ';

                                echo '</div>
                                        </td>  
                                        <td>
                                        <div class="form-group">
                                           <select class="form-control select2" id="desabilitarsetor" name="setor_n" style="width: 100%;">
                                              <option selected="selected"></option>';
                                             
                                              // Seleciona e lista todos da tabela 'SETOR' em ordem alfabética //
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
                                              <option selected="selected"></option>';
                                             
                                              // Seleciona Todos os Registros da tabela 'Agentes'
                                              $sql5 = mysql_query("SELECT * FROM agentes");
                                              
                                              //Estrutura de repetição: enquanto existirem registros na tabela 'agentes' referentes a consulta, estes serão impressos. Obs: São armazenados na variavel $resultado5
                                              while($resultado5=mysql_fetch_object($sql5)){
                                                 echo utf8_encode('<option value="'.$resultado5->CD_AGENTE.'">'.$resultado5->NM_AGENTE.'</option>');
                                              }
                                      
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
                                        <input type="hidden" class="form-control" name="id_aluno" value="'.$noticias0->matricula.'">
                                      </tr>  
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>';

                      // Procura tabela termo_compromisso todos os registros em que 'matricula_aluno' for igual a variavel '$noticias->matricula' em orde crescente e alfabética segundo o 'id_termo_compromisso'
                      $sql6 = mysql_query("SELECT * FROM termo_compromisso where matricula_aluno like '$noticias0->matricula'  ORDER BY id_termo_compromisso ASC ");  

                      //armazena na variavel $resultado6 um fetch_object dos registros da consulta anterior
                      $resultado6=mysql_fetch_object($sql6);

                      //Verifica se os registros da coluna 'obs' na tabela é egual a ZERO, se for executa a linha de código   
                      if ( $resultado6->obs==null) {
                        echo '<a id="btn_adc" onclick="adc();" style="cursor:pointer; display:block;" class="btn btn-primary pull-right" >Adicionar</a> '; 
                      }
                      //Verifica se os registros da coluna 'obs' na tabela é diferente de ZERO, se for executa a linha de código
                      if ( $resultado6->obs!=null) {
                        echo '<a id="btn_adc" style="cursor:no-drop; display:none;" class="btn btn-primary pull-right" style="display:none; margin-right:5px;">Adicionar</a> 
                        <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right" style=" margin-right:5px;">Cancelar</button></a>'; 
                      }
                      echo'
                    
                      <button type="submit" id="btn_cdt" class="btn btn-primary pull-right" name="cdt" value="cadastrar" style="display:none; margin-right:5px; margin-top:11px;"> Cadastrar </button>
                      <button type="submit" id="btn_sv" class="btn btn-primary pull-right" name="sv" value="salvar" style="display:none; margin-right:5px; margin-top:11px;"> Salvar </button>
                      <button type="button" id="btn_cancelar" class="btn btn-danger pull-right" onclick="cancelar2();" style="margin-right:5px; display:none; margin-top:11px;">Cancelar</button>';
echo '
</form>
';

                  echo' <form action="cadastro_de_tces.php" method="POST">
                          <div class="col-xs-5"></div>
                          <div class="col-xs-7" id="maisde1" style="display:none;">
                          <table class="table table-hover">
                            <tr>
                              <th class="pull-left">Adicionar mais de 01 Termo: </th>
                              <th><input type="text" class="form-control pull-left" name="qnt" placeholder="Quantidade de Termos"></th>
                              <th><input type="submit" name="btnqnt" class="btn btn-primary pull-left" value="Adicionar"></button></th>
                              <th><input type="hidden" name="aluno2" class="form-control" value="'.$valor.'"></th>
                            </tr>
                          </table>
                        </div>

                        </form>'; 
          }

          //Verifica se o resultado da primeira consulta e igoal a ZERO, se for executa a linha de código
          if ($resulatdo == 0){

              echo utf8_encode('
                         <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                         <p><font color="red">Nenhum Registro Encontrado.</font></p>
                         <a href="termo_compromisso.php"><button type="button" class="btn btn-danger pull-right">Cancelar</button></a>
                         </div>');
            
          } 

}

?>
  			                  		</div>
            		      		</div>
            				</div>
         	    		</div>
              <!-- /.box -->
            		</section>
        		</div>
		      	<div class="content">
		        	<section id="td" class="content" style="display:block;">      
		            	<div class="row">
			          		<div class="col-md-12">
			            		<div class="col-md-6">
			              			<div class="box box-primary collapsed-box" id="atu" style="display: block;">
			                			<div class="box-header with-border">
			                  				<h3 class="box-title">Atualizar TCE</h3>
			                  				<div class="box-tools pull-right">
			                    				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
			                    				</button>
			                  				</div>
			                			</div>
			               				<div class="box-body">
			                  				<div class="form-group" id="btn3" style="display: block;">
			                    				<form action="busca_tce_atualizar.php" method="POST">
			                      					<div class="form-group" id="pesquisa2">
			                        					<div class="input-icon right" id="busca">
			                        <!-- FUNÇÃO (search_atual_tce.php) E BUSCA (busca_tce_atualizar.php) -->
			                          						<div class="col-md-12">
			                            						<select class="form-control select2" name="tce_atu" style="width: 100%;" required>
                              <?php 
                                require('../../../conn.php');
                                if(isset($_POST['btnaluno'])){
                                  $valor1 = utf8_decode($_POST['aluno']);
                                   
                                  // Procura titulos no banco relacionados ao valor
                                  $sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$valor1' or matricula LIKE '$valor1'");

                                  $resulatdo = mysql_num_rows($sql);


                                   
                                  // Exibe todos os valores encontrados
                                  if($resulatdo != 0){
                                    $noticias2 = @mysql_fetch_object($sql);

                                    $consulta = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias2->matricula' ORDER BY id_termo_compromisso ASC");
                                                    
                                    echo $result = mysql_num_rows($consulta);

                                      while ($sql = mysql_fetch_array($consulta)) {
                                      $id_termo_compromisso = $sql['id_termo_compromisso'];

                                      echo utf8_encode('<option>'.$id_termo_compromisso.'</option>');
                                    }
                                  }
                                }
                              ?>
						                            			</select></br>
						                            			<div class="col-md-8"></div>
						                            				<div class="col-md-4">
						                              					<button type="submit" class="btn btn-block btn-primary" name="btn_atu" style="float: right; display:block;">Atualizar</button>
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
						              	<div class="box box-primary collapsed-box" id="del" style="display: block;">
						                	<div class="box-header with-border">
						                  		<h3 class="box-title">Excluir TCE</h3>
						                  		<div class="box-tools pull-right">
						                    		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
						                    		</button>
						                  		</div>
						                	</div>
							                <div class="box-body">
							                  	<div class="form-group" id="ok_conv" style="display: block;">
							                    	<div class="form-group" id="pesquisa1">
							                      		<div class="input-icon right" id="busca1"> 
							                        		<div class="form-group">
<?php
                          // Incluir aquivo de conexão
                          include("../../../conn.php");
                           mysql_select_db('estagios');
                          // Recebe o valor enviado
                           if(isset($_POST['btnaluno'])){
                          $valor1 = utf8_decode($_POST['aluno']);
                           
                          // Procura titulos no banco relacionados ao valor
                          $sql = mysql_query("SELECT * FROM alunos WHERE nome LIKE '$valor1' or matricula LIKE '$valor1'");

                          $resulatdo = mysql_num_rows($sql);


                           
                          // Exibe todos os valores encontrados
                          if($resulatdo != 0){
                            $noticias2 = @mysql_fetch_object($sql);
                            $sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias2->matricula'");
                            $res = mysql_num_rows($sql2);

                            if($res != 0 ){
                            $noticias = @mysql_fetch_object($sql2);

                            echo '<form action="deleta_tce.php" method="POST">
                                  <div id="dasinp2" onclick="conve2();" style="display:block">';
                            echo'     <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Nome do Aluno</label>
                                        </div>';
                            echo utf8_encode('<input type="text" name="nome_empresa" class="form-control" value="'.$noticias2->nome.'" disabled>');
                            echo '      <br>
                                        <table class="table table-hover">
                                          <tr>
                                            <th>Nº do TCE</th>
                                            <th>Nome da Concedente/Empresa</th>
                                            <th></th>
                                          </tr>';
                                           $sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias2->matricula'");
                                          while($noticias1 = mysql_fetch_array($sql2)){

                                              $nome_emp=$noticias1["nome"];

                                              $sql6 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$nome_emp' ORDER BY nome ASC ");
                                              $noticias6 = mysql_fetch_array($sql6);

                                                echo utf8_encode('  <tr>
                                                          <td><input type="text" class="form-control" value="'.$noticias1["id_termo_compromisso"].'" disabled></td>

                                                          <td><input type="text" class="form-control" value="'.$noticias6["nome"].'" disabled></td>
                                                        </tr>');
                                                }



                                    echo '</table>
                                          <table class="table table-hover">
                                            <tr>
                                              <h4>N° do TCE a ser Excluido</h4>';?>
                                              <select class="form-control select2" name="tce_del" style="width: 100%;" required>
                                              <?php 
                                                require('../../../conn.php');

                                                $consulta = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$noticias2->matricula' ORDER BY id_termo_compromisso ASC");
                                                
                                                echo $result = mysql_num_rows($consulta);

                                                    while ($sql = mysql_fetch_array($consulta)) {
                                                      $id_termo_compromisso = $sql['id_termo_compromisso'];

                                                      echo utf8_encode('<option>'.$id_termo_compromisso.'</option>');
                                                    }
                                               ?>
                                            </select>
                          <?php
                                echo '    </tr>
                                          </table>
                                            <div class="col-md-12">
                                            <button type="submit" class="btn btn-danger pull-right" name="btndeleta">Excluir</button>
                                            </div>
                                             </form>
                                      </div>';
                          }

                          if ($res == 0) {
                              echo utf8_encode('
                                         <div class="col-md-12">
                                        <div class="form-group">
                                          <br><label>Nome do Aluno:</label>
                                        </div>
                                            <input type="text" name="nome_empresa" class="form-control" value="'.$noticias2->nome.'" disabled>');
                                 echo '  <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                                         <p><font color="red">Nenhum TCE Registrado.</font></p>
                                         </div></div><br>';
                            } 
                          }if ($resulatdo == 0) {
                              echo '
                                         <div class="note2 note-danger2"><h4 class="box-heading2"><Strong><font color="red">AVISO! </font></Strong></h4>
                                            <p><font color="red">Nenhum TEC Registrado.</font></p>
                                         </div>';
                            } 
                          }
                          // Acentuação
                          @header("Content-Type: text/html; charset=ISO-8859-1",true);
                          ?>
															</div>
		                    							</div>
		                  							</div>
		                						</div>
		             	 					</div>
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
