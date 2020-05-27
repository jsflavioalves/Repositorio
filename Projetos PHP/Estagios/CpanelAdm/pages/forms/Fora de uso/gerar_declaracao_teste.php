<?php

require('../../../conn.php');
mysql_select_db('estagios');

$matricula_aluno = $_POST['id_aluno'];
$id_termo = $_POST['id_tce'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$hora = $_POST['hora'];

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

$busca_termo=mysql_query("SELECT*FROM termo_compromisso where id_termo_compromisso like '$id_termo'");
$sql_termo=mysql_fetch_array($busca_termo);
$id_empresa= utf8_encode($sql_termo['nome']);
$rescisao= utf8_encode($sql_termo['rescisao']);
$dt_inicio= utf8_encode($sql_termo['dt_inicio']);
$dt_fim= utf8_encode($sql_termo['dt_fim']);
// if ($dt_fim > date("d-m-Y")) echo $dt_fim. 'ok'. date("d-m-Y") ;
$carga_horaria= utf8_encode($sql_termo['carga_horaria']);
$classificacao_termo= utf8_encode($sql_termo['classificacao_termo']);

$busca_aluno=mysql_query("SELECT*FROM alunos where matricula like '%888%'");



$busca_empresa=mysql_query("SELECT*FROM empresas where CD_EMPRESA like '$id_empresa'");
$sql_empresa=mysql_fetch_array($busca_empresa);
$nome_empresa= utf8_encode($sql_empresa['nome']);

$inserir = mysql_query("INSERT INTO declaracao VALUES ('','$id_aluno','$id_termo','$chave','$dia de $mes de $ano','$hora')");



		// Definimos o nome do arquivo que será exportado
		$arquivo = 'msgcontatos.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">alunos</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td><b>Matricula</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>cpf</b></td>';
		$html .= '<td><b>curso</b></td>';
		$html .= '<td><b>id</b></td>';
		$html .= '</tr>';
		while($sql_aluno=mysql_fetch_array($busca_aluno)){

			$id_aluno= utf8_encode($sql_aluno['id_aluno']);
$nome= utf8_encode($sql_aluno['nome']);
$cpf = $sql_aluno['cpf'];
$curso= utf8_encode($sql_aluno['curso']);
$matricula= utf8_encode($sql_aluno['matricula']);

		$html .= '<tr>';
		$html .= '<td>'.$matricula.'</td>';
		$html .= '<td>'.$nome.'</td>';
		$html .= '<td>'.$cpf.'</td>';
		$html .= '<td>'.$curso.'</td>';
		$html .= '<td>'.$id_aluno.'</td>';
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
		exit;?>