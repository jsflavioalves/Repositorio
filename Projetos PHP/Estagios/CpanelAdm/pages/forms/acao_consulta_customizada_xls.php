<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];
$opt = $_POST['opt'];

if($opt == "agente"){
$z = 0;

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Agente - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

while($z <= 9){
	$ano = $dt_inicio-$z;
		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Agente de Integração - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:450px; text-align:center;"><b>Agente</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Termos</b></td>';
		$html .= '</tr>';

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
			$html .= '<tr>';
			$html .= '<td>OUTROS:</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.$nome_agente.'</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}
	}
			$html .= '<td>Total de Termos - Agente</td>';
			$html .= '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
    $z++;
}
		
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "tipo_termo"){

$z = 0;

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Tipo de Termo - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Tipo de Termo - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:200px; text-align:center;"><b>Tipo de Termo</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Termos</b></td>';
		$html .= '</tr>';
	
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

    		$html .= '<tr>';
			$html .= '<td>Termo Aditivo</td>';
			$html .= '<td style="text-align:center;">'.$conta2.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td>Termo de Compromisso</td>';
			$html .= '<td style="text-align:center;">'.$conta3.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td>OUTROS:</td>';
			$html .= '<td style="text-align:center;">'.$conta4.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';
	$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "mes"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório por Mês - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;
		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Mês - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:200px; text-align:center;"><b>Mês</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta2.'</td>';
			$html .= '</tr>';
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
		$total_geral = $total1+$total2;

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color: red;">'.$total_geral.'</td>';
			$html .= '</tr>';
// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;
}else if($opt == "curso"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Curso - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Curso - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:450px; text-align:center;"><b>Curso</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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
			$html .= '<tr>';
			$html .= '<td>Outros</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.utf8_encode($array['nome_curso']).'</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}
	}

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';
		$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "cursoObNob"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Curso - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Curso - Estágio Obrigatório e Não Obrigatório '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:450px; text-align:center;"><b>Centro</b></td>';
		$html .= '<td style="width:450px; text-align:center;"><b>Curso</b></td>';
		$html .= '<td style="width:450px; text-align:center;"><b>Classificacao_termo</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT tc.id_curso as id_curso, cur.curso as nome_curso,tc.classificacao_termo, Count(tc.id_curso) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY cur.curso, tc.classificacao_termo ORDER BY cur.curso");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT cent.nm_centro AS nm_centro, tc.id_curso AS id_curso, cur.curso AS nome_curso, tc.classificacao_termo, Count( tc.id_curso ) AS nro_alunos FROM termo_compromisso tc
            LEFT JOIN cursos cur ON ( tc.id_curso = cur.id_curso ) LEFT JOIN centros cent ON ( cent.cd_centro = cur.id_centro ) WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$ano' GROUP BY cent.cd_centro, cur.curso, tc.classificacao_termo ORDER BY cent.nm_centro, cur.curso");
		}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_centro = $array['nm_centro'];
		$nome_curso = $array['nome_curso'];	
		$id_curso = $array['id_curso'];
		$class_termo = $array['classificacao_termo'];
		$nro_alunos = $array['nro_alunos'];
		$total = $total + $nro_alunos;
			
		if($array['id_curso'] == 0){
			$html .= '<tr>';
			$html .= '<td>Centro- Outros</td>';
			$html .= '<td>Outros</td>';
			$html .= '<td>'.utf8_encode($array['classificacao_termo']).'</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.utf8_encode($array['nm_centro']).'</td>';
			$html .= '<td>'.utf8_encode($array['nome_curso']).'</td>';
			$html .= '<td>'.utf8_encode($array['classificacao_termo']).'</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}
	}

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';
		$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "centro"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Centro - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Centro - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:450px; text-align:center;"><b>Centro</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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
			$html .= '<tr>';
			$html .= '<td>Outros</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.$nome_centro.'</td>';
			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
			$html .= '</tr>';
		}
	}
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';
		$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "total_bolsa"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Total Bolsa - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

// FALTA FORMATAR O NÚMERO
$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Total Bolsa - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:250px; text-align:center;"><b>Classificação Termo</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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
			$html .= '<tr>';
			$html .= '<td>Obrigatório</td>';
			$html .= '<td style="text-align:center;">R$ '.$total_obrigatorio.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td>Não Obrigatório</td>';
			$html .= '<td style="text-align:center;">R$ '.$total_n_obrigatorio.'</td>';
			$html .= '</tr>';

			$total_geral = $total_obrigatorio+$total_n_obrigatorio;

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;"><b>R$ '.$total_geral.'</b></td>';
			$html .= '</tr>';

	$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "erro_bolsa"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Erro Bolsa - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Erro Bolsa - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:100px; text-align:center;"><b>Matícula</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Valor Bolsa R$ </b></td>';
		$html .= '</tr>';

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
		
			$html .= '<tr>';
			$html .= '<td style="text-align:center;">'.$matricula_aluno.'</td>';
			$html .= '<td style="text-align:center;">'.$valor.'</td>';
			$html .= '</tr>';
		//echo "ALUNO: ".$nome_aluno."<br>";
	}
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			$html .= '</tr>'; 
			$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "classificacao"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = ' Relatório - Classificação de Termos Obrigatórios - Não Obrigatórios - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Classificação de Termo- '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:250px; text-align:center;"><b>Classificação Termo </b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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

			$html .= '<tr>';
			$html .= '<td>Obrigatório</td>';
			$html .= '<td style="text-align:center;">'.$conta9.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td>Não Obrigatório</td>';
			$html .= '<td style="text-align:center;">'.$conta10.'</td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Tolal</b></td>';
			$html .= '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			$html .= '</tr>';
	$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "classificacao_mes"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Classificação de Termo - Mês - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

// WHILE PRINCIPAL - REPETIÇÃO DE ANOS 
$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Classificação de Termo - Mês - '.$ano.'</b></center></td>';
		$html .= '</tr>';

// BLOCO DO OBRIGATÓRIO
			$html .= '<tr>';
			$html .= '<td colspan="2"><center><b>Obrigatório</b></center></td>';
			$html .= '</tr>';

			$html .= '<tr>';
			$html .= '<td style="width:250px; text-align:center;"><b>Classificação Termo </b></td>';
			$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
			$html .= '</tr>';
	$x = 1;
	$total1 = 0;
	$total2 = 0;
	while($x <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($x <= 9){
			$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
			$conta = mysql_num_rows($sql1);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';	
			$x++;
			$total1 = $total1+$conta;
		} else if($x > 9){
			$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo LIKE 'OBRIGATORIO' AND dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
			$conta2 = mysql_num_rows($sql2);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta2.'</td>';
			$html .= '</tr>';
			$x++;
			$total2 = $total2+$conta2;
		}

	}	
			$total_obrigatorio = $total1+$total2;
		
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b> Total Obrigatório</b></td>';
			$html .= '<td style="text-align:center; color:blue;">'.$total_obrigatorio.'</td>';
			$html .= '</tr>';		

	// BLOCO DO NÃO OBRIGATÓRIO

			$html .= '<tr>';
			$html .= '<td colspan="2"><center><b> Não Obrigatório </b></center></td>';
			$html .= '</tr>';

			$html .= '<tr>';
			$html .= '<td style="width:250px; text-align:center;"><b>Classificação Termo </b></td>';
			$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
			$html .= '</tr>';

	$y = 1;
	$total3 = 0;
	$total4 = 0;
	while($y <= 12){
		$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

		if($y <= 9){
			$sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%0$y-$ano%' OR dt_inicio LIKE '%0$y/$ano%'");
			$conta3 = mysql_num_rows($sql3);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$y].'</td>';
			$html .= '<td style="text-align:center;">'.$conta3.'</td>';
			$html .= '</tr>';
			$y++;
			$total3 = $total3+$conta3;
		} else if($y > 9){
			$sql4 = mysql_query("SELECT * FROM termo_compromisso WHERE classificacao_termo != 'OBRIGATORIO' AND dt_inicio LIKE '%$y-$ano%' OR dt_inicio LIKE '%$y/$ano%'");
			$conta4 = mysql_num_rows($sql4);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$y].'</td>';
			$html .= '<td style="text-align:center;">'.$conta4.'</td>';
			$html .= '</tr>';
			$y++;
			$total4 = $total4+$conta4;
		}
		
	}
		$total_nao_obrigatorio = $total3+$total4;
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total Não Obrigatório</b></td>';
			$html .= '<td style="text-align:center; color:blue;">'.$total_nao_obrigatorio.'</td>';
			$html .= '</tr>';

		$total_geral = $total_obrigatorio+$total_nao_obrigatorio;
			$html .= '<tr>';
			$html .= '<td><b>Total Geral</b></td>';
			$html .= '<td style="text-align:center; color:red;"><b>'.$total_geral.'</b></td>';
			$html .= '</tr>';
			

// FIM DO WHILE PRINCIPAL - REPETIÇÃO DE ANOS
	$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "empresa"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Empresa - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;


		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Empresa - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:580px; text-align:center;"><b>Empresa </b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';


	if($dt_fim != ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND SUBSTRING(dt_fim, 7, 4) = '$dt_fim' GROUP BY emp.nome ORDER BY emp.nome");
	} else if($dt_fim == ""){
		$busca1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY emp.nome");
	}
	$total = 0;
	while($array = mysql_fetch_array($busca1)){
		$nome_empresa = utf8_encode($array['nome_empresa']);
		$qtd = $array['qtd'];
		$total = $total+$qtd;

		if($nome_empresa == NULL){
			$html .= '<tr>';
			$html .= '<td>Outros</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.$nome_empresa.'</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}
	}
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';	
		$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "tipo_empresa"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Tipo de Empresa - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;


		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Tipo de Emsa  - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:250px; text-align:center;"><b>Tipo de Empresa</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';


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
			$html .= '<tr>';
			$html .= '<td>Outros </td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.$tipo_empresa.'</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
		}
	}
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</b></td>';
			$html .= '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
			$html .= '</tr>';
		$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;

}else if($opt == "top_10_empresas"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Classificação Empresas - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Empresas - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:80px; text-align:center;"><b>Classificação</b></td>';
		$html .= '<td style="width:580px; text-align:center;"><b>Nome da Empresa </b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>'.$a.'º LUGAR:</b></td>';

		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){

			$html .= '<td>Outros</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';

			}else{

			$html .= '<td>'.$nome_empresa.'</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			

			}
			$html .= '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;

}else if($opt == "top_10_emp_nao_obrig"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Classificação Empresas - Não Obrigatórios - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html .= '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;


		
		$html .= '<tr>';
		$html .= '<td colspan="3" style="color:green;"><center><b>Raletório - Classificação Empresas - Não Obrigatórios - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:80px; text-align:center;"><b>Classificação</b></td>';
		$html .= '<td style="width:580px; text-align:center;"><b>Nome da Empresa </b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>'.$a.'º LUGAR:</b></td>';
			
		
		if($nome_emp_dif != $nome_empresa){
			if($nome_empresa == NULL){
				$html .= '<td>Outros</td>';
				$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
				$html .= '<td>'.$nome_empresa.'</td>';
				$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			}
			$html .= '</tr>';
		}else{
		}
		$nome_emp_dif = $nome_empresa;
		$a++;
	}
	$z++;
}

		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;

}else if($opt == "top_10_cursos"){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Relatório - Classificação Cursos - '.$dt_inicio.'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html .= '';
		$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		
		$html .= '<tr>';
		$html .= '<td colspan="3" style="color:green;"><center><b>Relatório - Classificação Cursos - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:80px; text-align:center;"><b>Classificação</b></td>';
		$html .= '<td style="width:580px; text-align:center;"><b>Curso</b></td>';
		$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
		$html .= '</tr>';

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

			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>'.$a.'º LUGAR:</b></td>';

		if($nome_curso_dif != $nome_curso){
			if($nome_curso == NULL){
				$html .= '<td>Outros</td>';
				$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			}else{
				$html .= '<td>'.$nome_curso.'</td>';
				$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			}
			$html .= '</tr>';
		}else{
		}
		$nome_curso_dif = $nome_curso;
		$a++;
	}
	$z++;
}
		$html .= '</table>';
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;
}else if($opt == "aluno_externo"){

// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório - Aluno Externo - '.$dt_inicio.'.xls';

// Criamos uma tabela HTML com o formato da planilha
$html .= '<table border="1">';

$z = 0;
while($z <= 9){
	$ano = $dt_inicio-$z;

		$html .= '<tr></tr>';
		$html .= '<tr>';
		$html .= '<td colspan="3" style="color:green;"><center><b>Relatório - Alunos Externos - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:130px; text-align:center;"><b>Matricula</b></td>';
		$html .= '<td style="width:450px; text-align:center;"><b>Nome Aluno</b></td>';
		$html .= '<td style="width:450px; text-align:center;"><b>Instituição de Origem</b></td>';
		$html .= '</tr>';

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
		$html .= '<tr>';
		$html .= '<td style="text-align:center;">'.$matricula.'</td>';
		$html .= '<td style="padding-left: 4px;">'.$nome_aluno.'</td>';
		$html .= '<td style="padding-left: 4px;">'.$origem.'</td>';
		$html .= '</tr>';
	}
		$html .= '<tr>';
		$html .= '<td style="padding-left: 4px; text-align: center;"><b>TOTAL</b></td>';
		$html .= '<td colspan="2" style="color: red; text-align: center;"><b>'.$total.'</b></td>';
		$html .= '</tr>';
	$z++;
}
		

		$html .= '</table>';
		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;
} else if($opt == "tcc"){

	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Termo de Compromissso Coletivo - '.$dt_inicio.'.xls';
	
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Termos de Compromisso - TCC - '.$dt_inicio.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:150px; text-align:center;"><b>N° TCC</b></td>';
	$html .= '<td style="width:450px; text-align:center;"><b>TCE / ALUNO</b></td>';

	$html .= '</tr>';

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
		$html .= '<tr>';
		$html .= '<td colspan="2" style="text-align:center;"><b style="color:blue;">'.$nome_empresa2.'</b></td>';
		$html .= '</tr>';

			$cd_tcc = $array2['cd_tcc'];

			$consulta2=mysql_query("SELECT * FROM termo_compromisso WHERE cd_tcc LIKE '$cd_tcc'"); 
			$contar2 = mysql_num_rows($consulta2);
			$total = $total + $contar2;
			
		$html .= '<th rowspan="'.($contar2+1).'" style="padding-left: 4px; text-align:center;">'.$cd_tcc.'</th>';
	
			while($array3 = mysql_fetch_array($consulta2)){
				$cd_tce = $array3['id_termo_compromisso'];
				$matricula_aluno = $array3['matricula_aluno'];
				$html .= '<tr>';
				$html .= '<td style="text-align:center;"><b> TCE:</b> '.$cd_tce.' <b>----------------- ALUNO:</b> '.$matricula_aluno.'</td>';
				$html .= '</tr>';
			}
				$html .= '<tr>';
				$html .= '<td colspan="2" style="text-align:center;"><b> SUB-TOTAL: </b> '.$contar2.'</td>';
				$html .= '</tr>';
	}else{
	}
	$nome_empresa_dif = $nome_empresa2;
	}
	


		$html .= '<tr></tr>';
		$html .= '<td style="text-align:center;"><b>TOTAL<b></td>';
		$html .= '<td style="text-align:center;"><b style="color: red;">'.$total.'</b></td>';
		$html .= '</table>';

		// Configurações header para forçar o download
		header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo utf8_decode($html);
		exit;
}
?>
