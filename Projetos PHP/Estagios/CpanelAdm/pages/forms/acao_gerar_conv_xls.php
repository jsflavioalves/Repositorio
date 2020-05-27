<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$ano = $_POST['ano'];


	$busca2 = mysql_query("SELECT empresas.nome as nomeempresa, tconv.cd_convenio as CD_CONVENIO, tconv.nr_processo as NR_PROCESSO, tconv.dt_inicio as dt_inicio, tconv.dt_fim as dt_fim, tconv.tipo_convenio as tipo_convenio FROM termo_convenio tconv JOIN empresas ON ( tconv.cd_empresa = empresas.cd_empresa ) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY empresas.nome ORDER BY empresas.nome ASC");

		$busca2_cont = mysql_num_rows($busca2);


	if($busca2_cont != 0){

		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Convenios_do_ano_de_'.$ano.'.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="6"><center>Covênios do Ano de '.$ano.'.</center></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td><b>CD_Convênio</b></td>';
		$html .= '<td><b>Empresa</b></td>';
		$html .= '<td><b>NR_Processo</b></td>';
		$html .= '<td><b>Data Início</b></td>';
		$html .= '<td><b>Data Fim</b></td>';
		$html .= '<td><b>Tipo de Covênio</b></td>';
		$html .= '</tr>';
		while($sql_busca2=mysql_fetch_array($busca2)){

			$CD_CONVENIO= utf8_encode($sql_busca2['CD_CONVENIO']); 
			$nomeempresa = utf8_encode($sql_busca2['nomeempresa']);
			$NR_PROCESSO= utf8_encode($sql_busca2['NR_PROCESSO']);
			$dt_inicio = $sql_busca2['dt_inicio'];
			$dt_fim= utf8_encode($sql_busca2['dt_fim']);
			$tp_conv= utf8_encode($sql_busca2['tipo_convenio']);

		$html .= '<tr>';
		$html .= '<td>'.$CD_CONVENIO.'</td>';
		$html .= '<td>'.$nomeempresa.'</td>';
		$html .= '<td>'.$NR_PROCESSO.'</td>';
		$html .= '<td>'.$dt_inicio.'</td>';
		$html .= '<td>'.$dt_fim.'</td>';
		$html .= '<td>'.$tp_conv.'</td>';
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
	}
	if($busca2_cont == 0){
		header('location:busca_processo_xls.php');
	}
?>