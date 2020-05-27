<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$opt = $_POST['opt'];

if($opt == "emp_cnpj"){

	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação de Empresas sem CNPJ.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="1" style="color:green;"><center><b>Relatório - Relação Empresas sem CNPJ</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:580px; text-align:center;"><b>Empresas</b></td>';
	$html .= '</tr>';

	$x = "";
	$busca_empresas = mysql_query("SELECT * FROM empresas WHERE cnpj = '$x' ORDER BY nome ASC");
	$conta = mysql_num_rows($busca_empresas);
		while($array1 = mysql_fetch_array($busca_empresas)){
			$html .= '<tr>';
			$html .= '<td style="width:4px;">'.utf8_encode($array1['nome']).'</td>';
			$html .= '</tr>';
		}
		
		$html .= '<tr></tr>';
		$html .= '<td style="text-align:center;"><b>Total - <b><b style="color: red;">'.$conta.'<b></td>';
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

/////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "emp_duplicadas"){
	
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação de Empresas com o CNPJ Duplicado.xls';
			
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Empresas com o CNPJ Duplicado</b></center></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td style="width:150px; text-align:center;"><b>CNPJ Duplicado</b></td>';
		$html .= '<td style="width:580px; text-align:center;"><b>Empresas</b></td>';
		$html .= '</tr>';
		
		$busca1 = mysql_query("SELECT cnpj, Count(*) FROM empresas GROUP BY cnpj HAVING Count(*) > 1");
		$conta = mysql_num_rows($busca1);
	
		while($array = mysql_fetch_array($busca1)){
			$cnpj = $array['cnpj'];
			$qtd = $array['Count(*)'];

			if($cnpj == ""){
				$conta = $conta - $qtd;
			} else{			
			$busca_nome = mysql_query("SELECT * FROM empresas WHERE cnpj LIKE '$cnpj'");
			$contar = mysql_num_rows($busca_nome);

				$html .= '<tr>';
				$html .= '<th rowspan="'.($contar+1).'" style="text-align:center;"><b>'.$cnpj.'</b></th>';
				$html .= '</tr>';

				while ($array2 = mysql_fetch_array($busca_nome)) {	
					$nome_empresa = utf8_encode($array2['nome']);
					$html .= '<tr>';
					$html .= '<td style="padding-left:4px;">'.$nome_empresa.'</td>';
					$html .= '</tr>';
				}
			}
		}

		$html .= '<tr></tr>';
		$html .= '<td><b>Total<b></td>';
		$html .= '<td style="text-align:center; color:red;"><b>'.$conta.'</b></td>';
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

///////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "conv_duplicados"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação de Convênios Duplicados.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Convênios Duplicados</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:300px; text-align:center;"><b>N° Processo Duplicado</b></td>';
	$html .= '<td style="width:100px; text-align:center;"><b>Subtotal</b></td>';
	$html .= '</tr>';
	
	
	$busca1 = mysql_query("SELECT NR_PROCESSO, Count(*) FROM termo_convenio GROUP BY NR_PROCESSO HAVING Count(*) > 1");
	$conta = mysql_num_rows($busca1);
	$total = "0";
	
	while($array = mysql_fetch_array($busca1)){
	
		$processo = $array['NR_PROCESSO'];
		$qtd = $array['Count(*)'];
		$total = $total+$qtd;

		$busca_processo = mysql_query("SELECT * FROM termo_convenio WHERE NR_PROCESSO LIKE '$processo'");
		$conta = mysql_num_rows($busca_processo);				

			$html .= '<tr>';
			$html .= '<td style="text-align:center;">'.$processo.'</td>';
			$html .= '<td style="text-align:center;">'.$qtd.'</td>';
			$html .= '</tr>';
	}
	
		$html .= '<tr></tr>';
		$html .= '<td><b>Total<b></td>';
		$html .= '<td style="text-align:center; color:red;"><b>'.$total.'</b></td>';
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

//////////////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "alunos_duplicados"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação de Alunos Duplicados.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação de Alunos Duplicados</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:150px; text-align:center;"><b>Matrícula</b></td>';
	$html .= '<td style="width:450px; text-align:center;"><b>Aluno</b></td>';
	$html .= '</tr>';

	
	$consulta = mysql_query("SELECT matricula, Count(*) FROM alunos GROUP BY matricula HAVING Count(*) > 1");
	$conta = mysql_num_rows($consulta);
	
	while($array = mysql_fetch_array($consulta)){
		$matricula = $array['matricula'];
	
			$consulta2 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
			$contar = mysql_num_rows($consulta2);

				$html .= '<tr>';
				$html .= '<th rowspan="'.($contar+1).'" style="text-align:center;" ><b>'.$matricula.'</b></th>';
				$html .= '</tr>';

			while($array2 = mysql_fetch_array($consulta2)){
				if(utf8_encode($array2['nome'])  != ""){
					$html .= '<tr>';
					$html .= '<td style="padding-left:4px;">'.utf8_encode($array2['nome']).'</td>';
					$html .= '</tr>';	
				}else{
					$html .= '<tr>';
					$html .= '<td style="padding-left:4px; color:red;">Registro sem Nome</td>';
					$html .= '</tr>';
				}
			}

	}
		$html .= '<tr></tr>';
		$html .= '<td><b>Total<b></td>';
		$html .= '<td style="text-align:center;"><b style="color: red;">'.$conta.'</b></td>';
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