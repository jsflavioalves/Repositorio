
<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['data'];
$opt = $_POST['opt'];

if($opt == "centro"){	

    // Definimos o nome do arquivo que será exportado
    $arquivo = 'Relatório - Centro - '.$dt_inicio.' .xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html .= '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
		
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório Vagas de Estágio - Centro - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:450px; text-align:center;"><b>Centro</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Vagas</b></td>';
		$html .= '</tr>';


	$busca1 = mysql_query("SELECT cent.NM_CENTRO AS nome_centro, Count( vg.CD_CENTRO ) AS quant FROM vagas_estagios vg LEFT JOIN centros cent ON ( vg.CD_CENTRO = cent.CD_CENTRO ) WHERE SUBSTRING( data, 7, 4 ) = '$ano' GROUP BY cent.NM_CENTRO ORDER BY cent.NM_CENTRO");
	
	$total = 0;
	while($array1 = mysql_fetch_array($busca1)){
		$nome_centro = $array1['nome_centro'];
		$quantidade = $array1['quant'];
		$total = $total + $quantidade;
		if($nome_centro ==  ""){
			$html .= '<tr>';
			$html .= '<td style="text-align:center;">OUTROS</td>';
			$html .= '<td style="text-align:center;">'.$quantidade.'</td>';
			$html .= '</tr>';
		}else{
			$html .= '<tr>';
			$html .= '<td>'.utf8_encode($nome_centro).'</td>';
			$html .= '<td style="text-align:center;">'.$quantidade.'</td>';
			$html .= '</tr>';
		}
	}
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"><b>Total</></td>';
			$html .= '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .= '</tr>';
			$html .= '<tr></tr>';
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

} else if($opt == "ano"){

		// Definimos o nome do arquivo que será exportado
    $arquivo = 'Relatório - Ano - '.$dt_inicio.' .xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html .= '<table border="1">';

$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório Vagas de Estágio - Mês - '.$ano.'</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:200px; text-align:center;"><b>Mês</b></td>';
		$html .= '<td style="width:200px; text-align:center;"><b>Quantidade de Vagas</b></td>';
		$html .= '</tr>';

$x = 1;
$total = 0;
while($x <= 12){
	$meses = array(1 => "JANEIRO", 2 => "FEVEREIRO", 3 => "MARÇO", 4 => "ABRIL", 5 => "MAIO", 6 => "JUNHO", 7 => "JULHO", 8 => "AGOSTO", 9 => "SETEMBRO", 10 => "OUTUBRO", 11 => "NOVEMBRO", 12 => "DEZEMBRO");

	if($x <= 9){
		$sql1 = mysql_query("SELECT * FROM vagas_estagios WHERE data LIKE '%0$x-$ano%' OR data LIKE '%0$x/$ano%'");
		$conta = mysql_num_rows($sql1);
			$html .= '<tr>';
			$html .= '<td style="padding-left:4px;">'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';
		$x++;
	} else if($x > 9){
		$sql1 = mysql_query("SELECT * FROM vagas_estagios WHERE data LIKE '%$x-$ano%' OR data LIKE '%$x/$ano%'");
		$conta = mysql_num_rows($sql1);
			$html .= '<tr>';
			$html .= '<td style="padding-left:4px;">'.$meses[$x].'</td>';
			$html .= '<td style="text-align:center;">'.$conta.'</td>';
			$html .= '</tr>';	
		$x++;
	}

		$total = $total + $conta;

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
} 

?>
