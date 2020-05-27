<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$dt_fim = $_POST['dt_fim'];
$opt = $_POST['opt'];

if($opt == "tipo_empresa"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório Convênios - Tipo de Empresa - '.$dt_inicio.'.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '';
	$html .= '<table border="1">';

	$z = 0;
	while($z <= 3){
		$ano = $dt_inicio-$z;
		$html .= '<tr>';
		$html .= '<td colspan="2"><center><p style="color:green;"><b>Relatório Convênio - Tipo de Empresa - '.$ano.'</p></b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:200px; text-align:center;"><b>Tipo de Empresa</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Convênios</b></td>';
		$html .= '</tr>';

		if($dt_fim == ""){
			$busca1 = mysql_query("SELECT t_emp.nome AS tipo_emp, Count( tc.cd_empresa ) AS quant_empresa FROM termo_convenio tc LEFT JOIN empresas emp ON ( tc.cd_empresa = emp.cd_empresa ) LEFT JOIN tipo_empresa t_emp ON ( emp.CD_TIPO = t_emp.id_tipo_empresa ) WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$ano' GROUP BY t_emp.nome ORDER BY t_emp.nome");
		}else if ($dt_fim != ""){
			$busca1 = mysql_query("SELECT t_emp.nome AS tipo_emp, Count( tc.cd_empresa ) AS quant_empresa FROM termo_convenio tc LEFT JOIN empresas emp ON ( tc.cd_empresa = emp.cd_empresa ) LEFT JOIN tipo_empresa t_emp ON ( emp.CD_TIPO = t_emp.id_tipo_empresa ) WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$ano' AND SUBSTRING( dt_fim, 7, 4 ) = '$dt_fim' GROUP BY t_emp.nome ORDER BY t_emp.nome");
		}

		$total = 0;
		while($array1 = mysql_fetch_array($busca1)){
			$nome_tipo = $array1['tipo_emp'];
			$quantidade = $array1['quant_empresa'];
			$total = $total + $quantidade;
			if($nome_tipo ==  ""){
				$html .= '<tr>';
				$html .= '<td style="padding-left:4px;">Outros</td>';
				$html .= '<td style="text-align:center;">'.$quantidade.'</td>';
				$html .= '</tr>';
			}else{
				$html .= '<tr>';
				$html .= '<td style="padding-left:4px;">'.utf8_encode($nome_tipo).'</td>';
				$html .= '<td style="text-align:center;">'.$quantidade.'</td>';
				$html .= '</tr>';
			}
		}
			$html .= '<td style="padding-left:4px;"><b>Total</b></td>';
			$html .= '<td><p style="color: red; text-align:center;">'.$total.'</p></td>';
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
		
} else if($opt == "mes"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório Convênios - Mês - '.$dt_inicio.'.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '';
	$html .= '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
		$html .= '<tr>';
		$html .= '<td colspan="2"><center><p style="color:green;"><b>Relatório Convênios - Mês - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:200px; text-align:center;"><b>Mês</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Convênios</b></td>';
		$html .= '</tr>';

$x = 1;
$total = 0;
while($x <= 12){

	$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

	if($x <= 9){
		$sql1 = mysql_query("SELECT * FROM termo_convenio WHERE dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
		$conta = mysql_num_rows($sql1);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';
		$x++;
	} else if($x > 9){
		$sql1 = mysql_query("SELECT * FROM termo_convenio WHERE dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
		$conta = mysql_num_rows($sql1);
			$html .= '<tr>';
			$html .= '<td>'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';
		$x++;
	}

		$total = $total + $conta;

	}
		$html .= '<td style="padding-left:4px;"><b>Total</b></td>';
		$html .= '<td><p style="color: red; text-align:center;">'.$total.'</p></td>';
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
} else if($opt == "total"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório Total de Convênios - '.$dt_inicio.'.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório Total de Convênios - '.$dt_inicio.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:200px; text-align:center;"><b>Ano dos Convênios</b></td>';
	$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Convênios</b></td>';
	$html .= '</tr>';

 /* Desenvolvido J Flávio */
	$busca3 = mysql_query("SELECT * FROM termo_convenio WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio'");
	$conta3 = mysql_num_rows($busca3);
		$html .= '<tr>';
		$html .= '<td><center><b>'.$dt_inicio.'</b></center></td>';
		$html .= '<td style="text-align:center;">'.$conta3.'</td>';
		$html .= '</tr>';

	while($array3 = mysql_fetch_array($busca3)){
		$dt_inicio = $dt_inicio - 1;
		$busca3 = mysql_query("SELECT * FROM termo_convenio WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio'");
	    $conta3 = mysql_num_rows($busca3);
		    $html .= '<tr>';
			$html .= '<td><center><b>'.$dt_inicio.'</b></center></td>';
			$html .= '<td style="text-align:center;">'.$conta3.'</td>';
			$html .= '</tr>';
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

} else if($opt == "vigentes"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório Total de Convênios Virgentes '.$dt_inicio.'.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório Total de Convênios Virgentes - '.$dt_inicio.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:200px; text-align:center;"><b>Ano dos Convênios</b></td>';
	$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Convênios</b></td>';
	$html .= '</tr>';

	$x = 2005;
	$y = $x+2;
	$ano_atual = date('Y');
	
	while ($y < $ano_atual){	
		$busca = mysql_query("SELECT * FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$x'+0 or SUBSTRING( dt_inicio, 7, 4 ) = '$x'+1 or SUBSTRING( dt_inicio, 7, 4 ) = '$x'+2 or SUBSTRING( dt_inicio, 7, 4 ) = '$x'+3");
		$conta = mysql_num_rows($busca);
		$html .= '<tr>';
		$html .= '<td><center><b>'.($x+3).'</b></center></td>';
		$html .= '<td style="text-align:center;">'.$conta.'</td>';
		$html .= '</tr>';
		$x++;
		$y++;
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
}	
?>