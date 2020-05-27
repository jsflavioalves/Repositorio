<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");


$dt_inicio = $_POST['data'];
$opt = $_POST['opt'];

if($opt == "setor"){	


		// Definimos o nome do arquivo que será exportado
   		 $arquivo = 'Relatório - Ano - '.$dt_inicio.'.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html .= '<table border="1">';
$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;

		$html .=  '<table border="1">';
		$html .=  '<tr>';
		$html .=  '<td colspan="2" style="color:green;"><center><b>Relatório de Estágios na UFC - Setor - '.$ano.'</b></center></td>';
		$html .=  '</tr>';
		$html .=  '<tr>';
		$html .=  '<td style="width:450px; text-align:center;"><b>Setor</b></td>';
    	$html .=  '<td style="width:150px; text-align:center;"><b>Matrícula</b></td>';
		$html .=  '</tr>';


$busca1 = mysql_query("SELECT setor.nome_setor AS nome_setor, tc.matricula_aluno  AS matricula_aluno,  Count( tc.id_setor ) AS quant FROM termo_compromisso tc LEFT JOIN Setor setor ON ( tc.id_setor=setor.id_setor ) WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$ano' GROUP BY tc.matricula_aluno ORDER BY setor.nome_setor ASC");

	$nome_setor_dif = "x";

	$total = 0;

	while($array1 = mysql_fetch_array($busca1)){

		$nome_setor = utf8_encode($array1['nome_setor']);
    	$matricula_aluno =$array1['matricula_aluno'];
		$quantidade = $array1['quant'];
		$total = $total + $quantidade;


  	if($nome_setor !=  ""){
      $html .=  '<tr>';
      $html .=  '<td style="text-align:center;">'.$nome_setor.'</td>';
      $html .=  '<td style="text-align:center;">'.$matricula_aluno.'</td>';
      $html .=  '</tr>';
    
    }else if($nome_setor == ""){
    	$total = $total - $quantidade;		
    }
    
	}
			$html .=  '<tr>';
			$html .=  '<td style="text-align:center;"><b>Total</></td>';
			$html .=  '<td style="text-align:center; color:red;">'.$total.'</td>';
			$html .=  '</tr>';
			$html .=  '<tr></tr>';
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
