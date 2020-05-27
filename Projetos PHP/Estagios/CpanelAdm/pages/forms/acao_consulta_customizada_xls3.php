<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$dt_inicio = $_POST['dt_inicio'];
$opt = $_POST['opt'];
$id_curso = $_POST['escolha_curso'];

if($opt == "relacao_alunos"){
	
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação Empresas - Alunos '.$dt_inicio.'.xls';
	// Criamos uma tabela HTML com o formato da planilha
	$html .= '<table border="1">';

	$z = 0;
while($z <= 3){
	$ano = $dt_inicio-$z;
	
	$html .= '<tr></tr>';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação Empresas - Alunos - '.$ano.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:380px; text-align:center;"><b>Empresa</b></td>';
	$html .= '<td style="width:520px; text-align:center;"><b>Alunos</b></td>';
	$html .= '</tr>';

	$busca1 = mysql_query("SELECT aluno.nome as nome_aluno, aluno.matricula as matricula_aluno,emp.cd_empresa as CD_EMPRESA, emp.nome as nome_empresa,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN empresas emp  ON (tc.nome=emp.cd_empresa) LEFT JOIN alunos aluno ON (tc.matricula_aluno=aluno.matricula) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' GROUP BY emp.nome ORDER BY emp.nome ");
  $contar = mysql_num_rows($busca1);
	
	$nome_empresa_dif = "x";
	$total = 0;
  	while($array = mysql_fetch_array($busca1)){
    		$nome_empresa = utf8_encode($array['nome_empresa']);
        	$num = $array['CD_EMPRESA'];
        	$nro_alunos = $array['nro_alunos'];
    		$total = $total + $nro_alunos;

          if($nome_empresa_dif != $nome_empresa){

          	$consulta2 = mysql_query("SELECT*FROM termo_compromisso WHERE nome LIKE '$num' AND SUBSTRING(dt_inicio, 7, 4) = '$ano'");
            $contar2 = mysql_num_rows($consulta2);
            $html .= '<td rowspan="'.($contar2+1).'" style="text-align:center;"><b style="color:blue;">'.$nome_empresa.'</b></td>';

          		if($nome_empresa ==  ""){
          			$html .= '<tr>';
          			$html .= '<td style="text-align:center;">Outros: </td>';
          			$html .= '<td style="text-align:center;">'.$nro_alunos.'</td>';
          			$html .= '</tr>';
          		}else{
          			
          			while($array2 = mysql_fetch_array($consulta2)){
          				$matricula_aluno = $array2['matricula_aluno'];
          				$consulta3 = mysql_query("SELECT*FROM alunos WHERE matricula LIKE '$matricula_aluno'");
          				$array3 = mysql_fetch_array($consulta3);
          				$nome_aluno = utf8_encode($array3['nome']);
          			$html .= '<tr>';
	                $html .= '<td><b>Aluno: </b> '.$nome_aluno.' <br> <b>Matricula:</b> '.$matricula_aluno.'</td>';
          			$html .= '</tr>';
          			}

          			$html .= '<tr>';
          			$html .= '<td style="padding-left:4px;" colspan="2">Quantidade por Concedente: '.$nro_alunos.'</td>';
          			$html .= '</tr>';

          		}
          }else{
			}
			$nome_empresa_dif = $nome_empresa2;
  	}
		$html .= '<tr></tr>';
		$html .= '<td><b>TOTAL<b></td>';
		$html .= '<td style="text-align:center;"><p style="color: red;"><b>'.$total.'</b></P></td>';
		
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

///////////////////////////////////////////////////////////////////////////////////////////////////////
} else if($opt == "emp_curso"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação Empresas - Cursos '.$dt_inicio.'.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr></tr>';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação Empresas - Curso '.$dt_inicio.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:580px; text-align:center;"><b>Empresa</b></td>';
	$html .= '<td style="width:100px; text-align:center;"><b>Quantidade</b></td>';
	$html .= '</tr>';

	$busca11 = mysql_query("SELECT emp.nome as nome_empresa, cur.curso as nome_curso,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.cd_empresa) LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' GROUP BY emp.nome,cur.curso ORDER BY emp.nome,cur.curso");
	
	$nome_empresa_dif = "";
	while($array11 = mysql_fetch_array($busca11)){
		$nome_empresa = $array11['nome_empresa'];
		$nome_curso = $array11['nome_curso'];
		$quantidade_alunos = $array11['nro_alunos'];
		$total = $total + $quantidade_alunos;

		if($nome_empresa == ""){
			$html .= '<tr>';
			$html .= '<td style="padding-left:4px;">Outras Empresas: </td>';
			$html .= '<td style="text-align:center;">'.$quantidade_alunos.'</td>';
			$html .= '</tr>';
		}else if($nome_curso == ""){
			$html .= '<tr>';
			$html .= '<td style="padding-left:30px; color:red;">Outros Cursos: </td>';
			$html .= '<td style="text-align:center;">'.$quantidade_alunos.'</td>';
			$html .= '</tr>'; 
		}else{
			if($nome_empresa_dif != $nome_empresa){
				$html .= '<tr>';
				$html .= '<td style="padding-left:4px;"><b>'.utf8_encode($nome_empresa).'</b></td>';
				$html .= '</tr>';	
			}
			$html .= '<tr>';
			$html .= '<td style="padding-left:20px; color:blue;">Curso: '.utf8_encode($nome_curso).' </td>';
			$html .= '<td style="text-align:center;">'.$quantidade_alunos.'</td>';
			$html .= '</tr>';	
		}

		$nome_empresa_dif = $nome_empresa;
	}	
	$html .= '<tr></tr>';
	$html .= '<td><b>Total Geral<b></td>';
	$html .= '<td><p style="color: red; text-align:center;">'.$total.'</P></td>';
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
		
} else if($opt == "curso_emp"){
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'Relatório - Relação Curso - Empresa - '.$dt_inicio.'.xls';
		
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="2" style="color:green;"><center><b>Relatório - Relação Curso - Empresa - '.$dt_inicio.'</b></center></td>';
	$html .= '</tr>';
	$html .= '<tr>';
	$html .= '<td style="width:580px; text-align:center;"><b>Empresa</b></td>';
	$html .= '<td style="width:200px; text-align:center;"<b>Quantidade por Curso</b></td>';
	$html .= '</tr>';

	$busca12 = mysql_query("SELECT cur.curso as nome_curso, emp.nome as nome_empresa,Count(tc.matricula_aluno) AS nro_alunos FROM termo_compromisso tc LEFT JOIN cursos cur ON (tc.id_curso=cur.id_curso) LEFT JOIN empresas emp ON (tc.nome=emp.cd_empresa) WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' GROUP BY cur.curso,emp.nome ORDER BY cur.curso,emp.nome");

	$sub_total = 0;
	$total = 0;
	$nome_curso_dif = "x";
	while ($array12 = mysql_fetch_array($busca12)) {
		$nome_empresa = utf8_encode($array12['nome_empresa']);
		$nome_curso = utf8_encode($array12['nome_curso']);
		$quantidade_alunos = $array12['nro_alunos'];
		$total = $total + $quantidade_alunos;
		//BLOCO DOS CURSOS
		if($nome_curso_dif != $nome_curso){
			if($nome_curso == ""){
				$html .= '<tr>';
				$html .= '<td style="padding-left:4px;"><p style="color: blue;">Outros Cursos:</p> </td>';
				$html .= '</tr>';
			}else{
				$html .= '<tr>';
				$html .= '<td style="padding-left:20px;"><b><p style="color: blue;">'.$nome_curso.'</p></b></td>';
				$html .= '<td></td>';
				$html .= '</tr>';
			}
		}else{

		}
		//BLOCO DAS EMPRESAS
		if($nome_empresa == ""){
			$html .= '<tr>';
			$html .= '<td style="padding-left:4px;">Outras Empresas </td>';
			$html .= '<td style="text-align:center;">'.$quantidade_alunos.'</td>';
			$html .= '</tr>';
		}else{

			$html .= '<tr>';
			$html .= '<td style="padding-left:4px;">'.$nome_empresa.' </td>';
			$html .= '<td style="text-align:center;">'.$quantidade_alunos.'</td>';
			$html .= '</tr>';
		}

		$nome_curso_dif = $nome_curso;
		
	}	
	$html .= '<tr></tr>';
	$html .= '<td style="padding-left:4px;"><b>Total Geral<b></td>';
	$html .= '<td><p style="color: red; text-align:center;">'.$total.'</P></td>';
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
