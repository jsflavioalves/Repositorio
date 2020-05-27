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

   <link type="text/css" href="css/jquery-ui-1.8.5.custom.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script type="text/javascript" src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

  <link type="text/css" href="jquery-ui-1.8.5.custom.css" rel="stylesheet" />
  <script src="jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
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
      		<div class="col-md-1"></div>
        	<div class="col-md-10">
          		<section class="content">
          			<center>
  
<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];
$opt = $_POST['opt'];

if($opt == "agente"){
$z = 0;

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

while($z <= 3){
	$ano = $dt_inicio-$z;
		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Agente de Integração - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:450px;"><b><center>Agente</center></b></td>';
		echo '<td style="width:200px;"><b><center>Quantidade de Termos</center></b></td>';
		echo '</tr>';

	if ($dt_fim != "") {
		$busca1 = mysql_query("SELECT ag.NM_AGENTE as nome_agente,Count(tc.agente) AS nro_alunos FROM termo_compromisso tc LEFT JOIN agentes ag ON (tc.agente=ag.CD_AGENTE) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim'  GROUP BY ag.NM_AGENTE ORDER BY ag.NM_AGENTE");
	}

	elseif ($dt_fim == "") {
		$busca1 = mysql_query("SELECT ag.NM_AGENTE as nome_agente,Count(tc.agente) AS nro_alunos FROM termo_compromisso tc LEFT JOIN agentes ag ON (tc.agente=ag.CD_AGENTE) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY ag.NM_AGENTE ORDER BY ag.NM_AGENTE");
	}
	
    $total = 0;
	while($array1 = mysql_fetch_array($busca1)){
		$nome_agente = utf8_encode($array1['nome_agente']);
		$qtd = $array1['nro_alunos'];
		$total = $total + $qtd;
			
		if($nome_agente == ""){
			//$agente_nome = "OUTROS";	
			echo '<tr>';
			echo '<td>OUTROS:</td>';
			echo '<td><center>'.$qtd.'</center></td>';
			echo '</tr>';
		}else{
			echo '<tr>';
			echo '<td>'.$nome_agente.'</td>';
			echo '<td><center>'.$qtd.'</center></td>';
			echo '</tr>';
		}
	}		echo '<tr></tr>';
			echo '<td><b>Total de Termos - Agente</b></td>';
			echo '<td style="color:red;"><center>'.$total.'</center></td>';
    $z++;
}
		
		echo '</table>';

}else if($opt == "tipo_termo"){

$z = 0;

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Tipo de Termo - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:300px; text-align:center;"><b>Tipo de Termo</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade de Termos</b></td>';
		echo '</tr>';
	
	if ($dt_fim != "") {
		$busca2 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) >= '$ano' AND SUBSTRING(dt_fim, 7, 4) <= '$dt_fim' AND tipo_termo LIKE 'T.A'");
	}
	
	elseif ($dt_fim == "") {
		$busca2 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano'  AND tipo_termo = 'T.A'");
	}
	
	$conta2 = mysql_num_rows($busca2);

    if ($dt_fim != "") {
		$busca3 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) >= '$ano' AND SUBSTRING(dt_fim, 7, 4) <= '$dt_fim' AND tipo_termo LIKE 'T.C'");
	}
	
	elseif ($dt_fim == "") {
		$busca3 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND tipo_termo = 'T.C'");
		$busca4 = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND tipo_termo != 'T.C' AND tipo_termo != 'T.A'");
     }

	$conta3 = mysql_num_rows($busca3);
	$conta4 = mysql_num_rows($busca4);
    $total = $conta2 + $conta3 + $conta4;

    		echo '<tr>';
			echo '<td>Termo Aditivo</td>';
			echo '<td style="text-align:center;">'.$conta2.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Termo de Compromisso</td>';
			echo '<td style="text-align:center;">'.$conta3.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>OUTROS:</td>';
			echo '<td style="text-align:center;">'.$conta4.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;">'.$total.'</td>';
			echo '</tr>';
	$z++;
}
		echo '</table>';
		
}else if($opt == "mes"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Mês - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Mês</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

// BLOCO DO OBRIGATÓRIO
	$x = 1;
	$total1 = 0;
	$total2 = 0;
	$total_geral = 0;
	while($x <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($x <= 9){
			$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
			$conta = mysql_num_rows($sql1);
			echo '<tr>';
			echo '<td >'.$meses[$x].'</td>';
			echo '<td style=" text-align:center;">'.$conta.'</td>';
			echo '</tr>';
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			echo '<tr>';
			echo '<td>'.$meses[$x].'</td>';
			echo '<td style="text-align:center;">'.$conta2.'</td>';
			echo '</tr>';
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
		$total_geral = $total1+$total2;

			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;">'.$total_geral.'</td>';
			echo '</tr>';
// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}

		echo '</table>';

}else if($opt == "curso"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Curso - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:450px; text-align:center;"><b>Curso</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT tc.id_curso as id_curso, cur.curso as nome_curso,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cur.curso ORDER BY cur.curso");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT tc.id_curso as id_curso, cur.curso as nome_curso,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cur.curso ORDER BY cur.curso");
	}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_curso = $array['nome_curso'];	
		$id_curso = $array['id_curso'];
		$nro_alunos = $array['nro_alunos'];
		$total = $total + $nro_alunos;
			
		if($array['id_curso'] == 0){
			echo '<tr>';
			echo '<td>Outros</td>';
			echo '<td style="text-align:center;">'.$nro_alunos.'</td>';
			echo '</tr>';
		}else{
			echo '<tr>';
			echo '<td>'.utf8_encode($array['nome_curso']).'</td>';
			echo '<td style="text-align:center;">'.$nro_alunos.'</td>';
			echo '</tr>';
		}
	}

			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;">'.$total.'</td>';
			echo '</tr>';
		$z++;
}

		echo '</table>';

}else if($opt == "centro"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Centro - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:450px; text-align:center;"><b>Centro</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca6 = mysql_query("SELECT cent.NM_CENTRO as nome_centro, cur.id_curso as id_centro,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN centros cent ON (cur.id_centro=cent.CD_CENTRO) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND
			SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	} else if($dt_fim == ""){
		$busca6 = mysql_query("SELECT cent.NM_CENTRO as nome_centro, cur.id_curso as id_centro,Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN centros cent ON (cur.id_centro=cent.CD_CENTRO) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	}
	$total = 0;
	while($array6 = mysql_fetch_array($busca6)){
		$nome_centro = utf8_encode($array6['nome_centro']);
		$nro_alunos = $array6['nro_alunos'];
		$total = $total + $nro_alunos;

		if($array6['nome_centro'] == NULL){
			echo '<tr>';
			echo '<td>Outros</td>';
			echo '<td style="text-align:center;">'.$nro_alunos.'</td>';
			echo '</tr>';
		}else{
			echo '<tr>';
			echo '<td>'.$nome_centro.'</td>';
			echo '<td style="text-align:center;">'.$nro_alunos.'</td>';
			echo '</tr>';
		}
	}
			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;">'.$total.'</td>';
			echo '</tr>';
		$z++;
}
		echo '</table>';

}else if($opt == "total_bolsa"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

// FALTA FORMATAR O NÚMERO
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Total Bolsa - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Classificação Termo</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca9 = mysql_query("SELECT classificacao_termo AS classificacao_termo, SUM(valor) FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' GROUP BY classificacao_termo ");
  	}else if($dt_fim == ""){
  		$busca9 = mysql_query("SELECT classificacao_termo AS classificacao_termo, SUM(valor) AS soma_valores FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' GROUP BY classificacao_termo  ");
  	}

  	$total_obrigatorio = 0;
  	$total_n_obrigatorio = 0;
  	$total_geral = 0;
	while($array = mysql_fetch_array($busca9)){
		$classificacao_termo = utf8_encode($array['classificacao_termo']);
		$valor = $array['soma_valores'];

		if($classificacao_termo == ""){
			$classificacao_termo = "OBRIGATORIO";
		}
		if($classificacao_termo == "OBRIGATORIO" || $classificacao_termo == "OBRIGATÓRIO"){
			$total_obrigatorio = $total_obrigatorio+$valor;
		} else if($classificacao_termo == "NÃO OBRIGATORIO" || $classificacao_termo == "NAO OBRIGATORIO" || $classificacao_termo == "NÃO OBRIGATÓRIO"){
			$total_n_obrigatorio = $total_n_obrigatorio+$valor;
		}

	}
			echo '<tr>';
			echo '<td>Obrigatório</td>';
			echo '<td style="text-align:center;">R$ '.$total_obrigatorio.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Não Obrigatório</td>';
			echo '<td style="text-align:center;">R$ '.$total_n_obrigatorio.'</td>';
			echo '</tr>';

			$total_geral = $total_obrigatorio+$total_n_obrigatorio;

			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;">R$ '.$total_geral.'</td>';
			echo '</tr>';

	$z++;
}
		echo '</table>';

}else if($opt == "erro_bolsa"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Erro Bolsa - '.$dt_inicio.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Matrícula</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Valor Bolsa R$ </b></td>';
		echo '</tr>';

	$x = 100.00;
	$busca = mysql_query("SELECT tc.matricula_aluno as matricula_aluno, tc.valor as valor_bolsa FROM termo_compromisso tc WHERE tc.valor<$x AND SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' ORDER BY tc.valor DESC");
	$total = mysql_num_rows($busca);
	
	while($array = mysql_fetch_array($busca)){
		//$nome_aluno = utf8_encode($array['nome_aluno']);
		$matricula_aluno = $array['matricula_aluno'];
		$valor = $array['valor_bolsa'];

		/*if($nome_aluno == ""){	
			$nome_aluno = "SEM NOME";
		}*/
		if($matricula_aluno == ""){
			$matricula_aluno = "SEM MATRÍCULA";
		}
		
			echo '<tr>';
			echo '<td style="text-align:center;">'.$matricula_aluno.'</td>';
			echo '<td style="text-align:center;">'.$valor.'</td>';
			echo '</tr>';
		//echo "ALUNO: ".$nome_aluno."<br>";
	}
			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;"><b>'.$total.'</td>';
			echo '</tr>'; 
			echo '</table>';
		
}else if($opt == "classificacao"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Classificação de Termo- '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Classificação Termo </b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade </b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca9 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' AND classificacao_termo LIKE 'OBRIGATORIO' ");
  		$busca10 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND dt_fim LIKE '%$dt_fim%' AND classificacao_termo != 'OBRIGATORIO' ");
  	}else if($dt_fim == ""){
  		$busca9 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND classificacao_termo LIKE 'OBRIGATORIO' ");
  		$busca10 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND classificacao_termo != 'OBRIGATORIO' ");
  	}
  	$conta9 = mysql_num_rows($busca9);
	$conta10 = mysql_num_rows($busca10);
	$total = $conta9+$conta10;

			echo '<tr>';
			echo '<td>Obrigatório</td>';
			echo '<td style="text-align:center;">'.$conta9.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>Não Obrigatório</td>';
			echo '<td style="text-align:center;">'.$conta10.'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td><b>Tolal</b></td>';
			echo '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			echo '</tr>';
	$z++;
}
		echo '</table>';
	
}else if($opt == "classificacao_mes"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

// WHILE PRINCIPAL - REPETIÇÃO DE ANOS 
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Classificação de Termo - Mês - '.$ano.'</b></center></td>';
		echo '</tr>';

// BLOCO DO OBRIGATÓRIO
			echo '<tr>';
			echo '<td colspan="2"><center><b>Obrigatório</b></center></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td style="width:200px; text-align:center;"><b>Classificação Termo</b> </td>';
			echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
			echo '</tr>';
	$x = 1;
	$total1 = 0;
	$total2 = 0;
	while($x <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($x <= 9){
			$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
			$conta = mysql_num_rows($sql1);
			echo '<tr>';
			echo '<td>'.$meses[$x].'</td>';
			echo '<td style="text-align:center;">'.$conta.'</td>';
			echo '</tr>';	
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			echo '<tr>';
			echo '<td>'.$meses[$x].'</td>';
			echo '<td style="text-align:center;">'.$conta2.'</td>';
			echo '</tr>';
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
			$total_obrigatorio = $total1+$total2;
		
			echo '<tr>';
			echo '<td><b> Total Obrigatório</b></td>';
			echo '<td style="text-align:center;">'.$total_obrigatorio.'</td>';
			echo '</tr>';		

	// BLOCO DO NÃO OBRIGATÓRIO

			echo '<tr>';
			echo '<td colspan="2"><center><b> Não Obrigatório </b></center></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td style="width:200px; text-align:center;"><b>Classificação Termo </b></td>';
			echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
			echo '</tr>';

	$y = 1;
	$total3 = 0;
	$total4 = 0;
	while($y <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($y <= 9){
			$sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%0$y-$ano%' OR dt_inicio LIKE '%0$y/$ano%'");
			$conta3 = mysql_num_rows($sql3);
			echo '<tr>';
			echo '<td>'.$meses[$y].'</td>';
			echo '<td style="text-align:center;">'.$conta3.'</td>';
			echo '</tr>';
			$y++;
			$total3 = $total3+$conta3;
		} else if($y > 9){
			$sql4 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%$y-$ano%' OR dt_inicio LIKE '%$y/$ano%'");
			$conta4 = mysql_num_rows($sql4);
			echo '<tr>';
			echo '<td>'.$meses[$y].'</td>';
			echo '<td style="text-align:center;">'.$conta4.'</td>';
			echo '</tr>';
			$y++;
			$total4 = $total4+$conta4;
		}
		
	}
		$total_nao_obrigatorio = $total3+$total4;
			echo '<tr>';
			echo '<td><b>Total Não Obrigatório</b></td>';
			echo '<td style="text-align:center;">'.$total_nao_obrigatorio.'</td>';
			echo '</tr>';

		$total_geral = $total_obrigatorio+$total_nao_obrigatorio;
			echo '<tr>';
			echo '<td><b>Total Geral</b></td>';
			echo '<td style="text-align:center; color:red;"><b>'.$total_geral.'</b></td>';
			echo '</tr>';
			echo '<tr></tr>';

// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}
		echo '</table>';
}else if($opt == "empresa"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;


		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Empresa - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:450px; text-align:center;"><b>Empresa </b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Email </b></td>';
		echo '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';


	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY emp.nome ORDER BY emp.nome");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, emp.email as email, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY emp.nome");
	}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$email = utf8_encode($array['email']);
		$qtd = $array['qtd'];
		$total = $total+$qtd;

		if($nome_empresa == NULL){
			echo '<tr>';
			echo '<td>Outros</td>';
			echo '<td>'.$email.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			echo '</tr>';
		}else{
			echo '<tr>';
			echo '<td>'.$nome_empresa.'</td>';
			echo '<td>'.$email.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			echo '</tr>';
		}
	}
			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			echo '</tr>';	
		$z++;
}
		echo '</table>';

}else if($opt == "tipo_empresa"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Tipo de Empresa  - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Tipo de Empresa</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';


	if($dt_fim != ""){
		$busca6 = mysql_query("SELECT tipo.nome as tipo_empresa,Count(tipo.id_tipo_empresa) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) LEFT JOIN tipo_empresa tipo ON (emp.CD_TIPO=tipo.id_tipo_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND
			SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY tipo.nome ORDER BY tipo.nome");
	} else if($dt_fim == ""){
		$busca6 = mysql_query("SELECT tipo.nome as tipo_empresa,Count(tipo.id_tipo_empresa) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) LEFT JOIN tipo_empresa tipo ON (emp.CD_TIPO=tipo.id_tipo_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY tipo.nome ORDER BY tipo.nome");
	}
	
	$total = 0;
	while($array = mysql_fetch_array($busca6)){
		$tipo_empresa = utf8_encode($array['tipo_empresa']);
		$qtd = $array['qtd'];
		$total = $total+$qtd;

		if($tipo_empresa == NULL){
			echo '<tr>';
			echo '<td>Outros </td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			echo '</tr>';
		}else{
			echo '<tr>';
			echo '<td>'.$tipo_empresa.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			echo '</tr>';
		}
	}
			echo '<tr>';
			echo '<td><b>Total</b></td>';
			echo '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			echo '</tr>';
		$z++;
}
		echo '</table>';

}else if($opt == "top_10_empresas"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Empresas - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:150px; text-align:center;"><b>Classificação</b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Nome da Empresa </b></td>';
		echo '<td style="width:150px; text-align:center;"><b>Quantidade </b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
			echo '<td>Outros</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
			echo '<td>'.$nome_empresa.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}
			echo '</tr>';
		}else{

		}

		$nome_emp_dif = $nome_empresa;
		$a++;
	}

	$z++;
}
} else if ($opt == "obrig_e_remunerado"){
	/*** FALTA TERMINAR A IMPLEMENTAÇÃO ***/
	    echo '<table border="1">';

	    echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="2" style="color:green;"><center><b>Relatório - Termos Obrigatórios com Bolsa  - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:200px; text-align:center;"><b>Termos Obrigatórios com Bolsa</b></td>';
		echo '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';
		/* $busca10 = mysql_query("SELECT classificacao_termo AS classificacao_termo, COUNT( matricula_aluno ) AS alunosqtd FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%' AND classificacao_termo LIKE '%obrig%'
        AND valor >0 GROUP BY classificacao_termo  "); */
		
	}


		echo '</table>';
//PARTE DO GRÁFICO
	echo '<table border="1">';

	echo '<br><br>';
	echo '<img src="acao_grafico_top10_empresas.php">';

	echo '<tr></tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>Nº</b></td>';
	echo '<td style="width:350px; text-align:center;"><b>Nome da Empresa</b></td>';
	echo '</tr>';

	$ano_atual = date('Y');
	$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano_atual' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
			echo '<td style="text-align:center;">Outros</td>';
			}else{
			echo '<td style="text-align:center;">'.$nome_empresa.'</td>';
			}
			echo '</tr>';
		}else{

		}

		$nome_emp_dif = $nome_empresa;
		$a++;
	}

	echo '</table>';

// FIM GRÁFICO

}else if($opt == "top_10_emp_obrig"){

		// Criamos uma tabela HTML com o formato da planilha
		
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;


		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Empresas - TCE Obrigatórios - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:150px; text-align:center;"><b>Classificação</b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Nome da Empresa </b></td>';
		echo '<td style="width:150px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' AND classificacao_termo LIKE 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND classificacao_termo LIKE 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$classificacao_termo = $array['classificacao_termo'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == ""){
			echo '<td>Outras</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
			echo '<td>'.$nome_empresa.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	$z++;
}
		echo '</table>';
//PARTE DO GRÁFICO
	echo '<table border="1">';

	echo '<br><br>';
	echo '<img src="acao_grafico_top10_empresas_obrigatorio.php">';

	echo '<tr></tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>Nº</b></td>';
	echo '<td style="width:350px; text-align:center;"><b>Nome da Empresa</b></td>';
	echo '</tr>';

	$ano_atual = date('Y');
	$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano_atual' AND classificacao_termo LIKE 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$classificacao_termo = $array['classificacao_termo'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
				echo '<td style="text-align:center;">Outros</td>';
			}else{
				echo '<td style="text-align:center;">'.$nome_empresa.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}

	echo '</table>';

// FIM GRÁFICO

}else if($opt == "top_10_emp_nao_obrig"){

		// Criamos uma tabela HTML com o formato da planilha
		
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;


		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Empresas - TCE Não Obrigatórios - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:150px; text-align:center;"><b>Classificação</b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Nome da Empresa </b></td>';
		echo '<td style="width:150px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' AND classificacao_termo LIKE 'N' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND classificacao_termo != 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$classificacao_termo = $array['classificacao_termo'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
			echo '<td>Outros</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
			echo '<td>'.$nome_empresa.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	$z++;
}
		echo '</table>';
//PARTE DO GRÁFICO
	echo '<table border="1">';

	echo '<br><br>';
	echo '<img src="acao_grafico_top10_empresas_nobrigatorio.php">';

	echo '<tr></tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>Nº</b></td>';
	echo '<td style="width:350px; text-align:center;"><b>Nome da Empresa</b></td>';
	echo '</tr>';

	$ano_atual = date('Y');
	$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano_atual' AND classificacao_termo != 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");

	$nome_emp_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$classificacao_termo = $array['classificacao_termo'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
				echo '<td style="text-align:center;">Outros</td>';
			}else{
				echo '<td style="text-align:center;">'.$nome_empresa.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}

	echo '</table>';

// FIM GRÁFICO

}else if($opt == "top_10_cursos"){

		// Criamos uma tabela HTML com o formato da planilha
		echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Cursos - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:150px; text-align:center;"><b>Classificação</b></td>';
		echo '<td style="width:350px; text-align:center;"><b>Curso</b></td>';
		echo '<td style="width:150px; text-align:center;"><b>Quantidade</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT cur.curso AS nome_curso, Count(tc.id_curso) AS qtd FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cur.curso ORDER BY qtd DESC LIMIT 0,10");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT cur.curso AS nome_curso, Count(tc.id_curso) AS qtd FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY cur.curso ORDER BY qtd DESC LIMIT 0,10");
	}

	$nome_curso_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_curso = utf8_encode($array['nome_curso']);
		$qtd = $array['qtd'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_curso_dif != $nome_curso){
			if($nome_curso == NULL){
			echo '<td>Outros</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
			echo '<td>'.$nome_curso.'</td>';
			echo '<td style="text-align:center;">'.$qtd.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_curso_dif = $nome_curso;
		$a++;
	}
	$z++;
}
		echo '</table>';

//PARTE DO GRÁFICO
	echo '<table border="1">';

	echo '<br><br>';
	echo '<img src="acao_grafico_top10_cursos.php">';

	echo '<tr></tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>Nº</b></td>';
	echo '<td style="width:350px; text-align:center;"><b>Nome do Curso</b></td>';
	echo '</tr>';

	$ano_atual = date('Y');
	$busca1 = mysql_query("SELECT cur.curso AS nome_curso, Count(tc.id_curso) AS qtd FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano_atual' GROUP BY cur.curso ORDER BY qtd DESC LIMIT 0,10");

	$nome_curso_dif = "x";
	$a = 1;
	while($array = mysql_fetch_array($busca1) AND $a <= 10){
		$nome_curso = utf8_encode($array['nome_curso']);
		$qtd = $array['qtd'];
			echo '<tr>';
			echo '<td style="text-align:center;">'.$a.'º LUGAR:</td>';
		if($nome_curso_dif != $nome_curso){
			if($nome_curso == NULL){
			echo '<td style="text-align:center;">Outros</td>';
			}else{
			echo '<td style="text-align:center;">'.$nome_curso.'</td>';
			}
			echo '</tr>';
		}else{
		}
		$nome_curso_dif = $nome_curso;
		$a++;
	}

	echo '</table>';

// FIM GRÁFICO

} else if($opt == "aluno_externo"){

// Criamos uma tabela HTML com o formato da planilha
echo '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		echo '<tr></tr>';
		echo '<tr>';
		echo '<td colspan="3" style="color:green;"><center><b>Relatório - Alunos Externos - '.$ano.'</b></center></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td style="width:130px; text-align:center;"><b>Matricula</b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Nome Aluno</b></td>';
		echo '<td style="width:450px; text-align:center;"><b>Instituição de Origem</b></td>';
		echo '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT aluno.nome AS nome_aluno, aluno.instituicao as instituicao, aluno.matricula AS matricula FROM termo_compromisso tc LEFT JOIN alunos aluno ON (tc.matricula_aluno=aluno.matricula) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' AND aluno.origem LIKE 'EXTERNO' GROUP BY aluno.nome ORDER BY aluno.nome");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT aluno.nome AS nome_aluno, aluno.instituicao as instituicao, aluno.matricula AS matricula FROM termo_compromisso tc LEFT JOIN alunos aluno ON (tc.matricula_aluno=aluno.matricula) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND aluno.origem LIKE 'EXTERNO' GROUP BY aluno.nome ORDER BY aluno.nome");
	}
	$total = mysql_num_rows($busca1);
	while($array = mysql_fetch_array($busca1)){
		$nome_aluno = utf8_encode($array['nome_aluno']);
		$origem = utf8_encode($array['instituicao']);
		$matricula = $array['matricula'];
		echo '<tr>';
		echo '<td style="text-align:center;">'.$matricula.'</td>';
		echo '<td style="padding-left: 4px;">'.$nome_aluno.'</td>';
		echo '<td style="padding-left: 4px;">'.$origem.'</td>';
		echo '</tr>';
	}
		echo '<tr>';
		echo '<td style="padding-left: 4px; text-align: center;"><b>TOTAL</b></td>';
		echo '<td colspan="2" style="color: red; text-align: center;"><b>'.$total.'</b></td>';
		echo '</tr>';
	$z++;
}
		

		echo '</table>';

} else if($opt == "tcc"){
	
	// Criamos uma tabela HTML com o formato da planilha
	echo '<table border="1">';
	echo '<tr>';
	echo '<td colspan="2" style="color:green;"><center><b>Relatório - Termos de Compromisso - TCC - '.$dt_inicio.'</b></center></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="width:150px; text-align:center;"><b>N° TCC</b></td>';
	echo '<td style="width:450px; text-align:center;"><b>TCE / ALUNO</b></td>';

	echo '</tr>';

	if($dt_fim != ""){
		$consulta = mysql_query("SELECT emp.nome as nome_empresa, tcc.cd_tcc as cd_tcc, tce.id_termo_compromisso as cd_tce, aluno.matricula as matricula_aluno FROM termo_c_coletivo tcc LEFT JOIN termo_compromisso tce ON (tcc.cd_tcc=tce.cd_tcc) LEFT JOIN empresas emp ON (tcc.cd_emp=emp.CD_EMPRESA) LEFT JOIN alunos aluno ON (tce.matricula_aluno=aluno.matricula) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' ORDER BY emp.nome");
	} else if($dt_fim == ""){
		$consulta = mysql_query("SELECT emp.nome as nome_empresa, tcc.cd_tcc as cd_tcc, tce.id_termo_compromisso as cd_tce, aluno.matricula as matricula_aluno FROM termo_c_coletivo tcc LEFT JOIN termo_compromisso tce ON (tcc.cd_tcc=tce.cd_tcc) LEFT JOIN empresas emp ON (tcc.cd_emp=emp.CD_EMPRESA) LEFT JOIN alunos aluno ON (tce.matricula_aluno=aluno.matricula) WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' ORDER BY emp.nome");
	}
	
	
	$nome_empresa_dif = "x";
	$total = 0;
	while($array2 = mysql_fetch_array($consulta)){
		$sub_total = $array2['qtd'];
		
		$nome_empresa2 = utf8_encode($array2['nome_empresa']);
		if($nome_empresa_dif != $nome_empresa2){
		echo '<tr>';
		echo '<td colspan="2" style="text-align:center;"><b style="color:blue;">'.$nome_empresa2.'</b></td>';
		echo '</tr>';

			$cd_tcc = $array2['cd_tcc'];

			$consulta2=mysql_query("SELECT * FROM termo_compromisso WHERE cd_tcc LIKE '$cd_tcc'"); 
			$contar2 = mysql_num_rows($consulta2);
			$total = $total + $contar2;
			
		echo '<th rowspan="'.($contar2+1).'" style="padding-left: 4px; text-align:center;">'.$cd_tcc.'</th>';
	
			while($array3 = mysql_fetch_array($consulta2)){
				$cd_tce = $array3['id_termo_compromisso'];
				$matricula_aluno = $array3['matricula_aluno'];
				echo '<tr>';
				echo '<td style="text-align:center;"><b> TCE:</b> '.$cd_tce.' <b>----------------- ALUNO:</b> '.$matricula_aluno.'</td>';
				echo '</tr>';
			}
				echo '<tr>';
				echo '<td colspan="2" style="text-align:center;"><b> SUB-TOTAL: </b> '.$contar2.'</td>';
				echo '</tr>';
	}else{
	}
	$nome_empresa_dif = $nome_empresa2;
	}
	


		echo '<tr></tr>';
		echo '<td style="text-align:center;"><b>TOTAL<b></td>';
		echo '<td style="text-align:center;"><b style="color: red;">'.$total.'</b></td>';
		echo '</table>';
}
?>
						</center>
		  			</section>
				</div>
       		</div>
      	</div>
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

<script src="../../dist/js/funcs_cursos.js"></script>
</body>
</html>