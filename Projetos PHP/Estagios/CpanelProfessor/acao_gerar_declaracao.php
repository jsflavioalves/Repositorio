<?php
require('../conn.php');
mysql_select_db('estagios');

$matricula_aluno = $_POST['matricula_aluno'];
$id_termo = $_POST['id_termo'];
$siape = $_POST['siape'];
$CD_EMPRESA = $_POST['CD_EMPRESA'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

$busca_termo=mysql_query("SELECT*FROM termo_compromisso where id_termo_compromisso like '$id_termo'");
$sql_termo=mysql_fetch_array($busca_termo);
$id_empresa= utf8_encode($sql_termo['nome']);
$dt_inicio= utf8_encode($sql_termo['dt_inicio']);
$dt_fim= utf8_encode($sql_termo['dt_fim']);
$carga_horaria= utf8_encode($sql_termo['carga_horaria']);
$classificacao_termo= utf8_encode($sql_termo['classificacao_termo']);

$busca_aluno=mysql_query("SELECT*FROM alunos where matricula like '$matricula_aluno'");
$sql_aluno=mysql_fetch_array($busca_aluno);
$nome= utf8_encode($sql_aluno['nome']);
$curso= utf8_encode($sql_aluno['curso']);
$matricula= utf8_encode($sql_aluno['matricula']);

$busca_empresa=mysql_query("SELECT*FROM empresas where CD_EMPRESA like '$CD_EMPRESA'");
$sql_empresa=mysql_fetch_array($busca_empresa);
$nome_empresa= utf8_encode($sql_empresa['nome']);

$busca_prof=mysql_query("SELECT*FROM termo_compromisso where siape like '$siape'");
$sql_prof=mysql_fetch_array($busca_prof);
$nome_prof= utf8_encode($sql_prof['prof_orientador']);
$lotacao= utf8_encode($sql_prof['lotacao']);

$inserir = mysql_query("INSERT INTO declaracao_prof VALUES ('','$siape','$id_termo','$chave','$dia de $mes de $ano','$hora')");

require('fpdf/fpdf.php');

$pdf = new FPDF('P','pt','A4');
$pdf->AddPage(); 

$pdf->SetTitle(utf8_decode('DECLARAÇÃO'));

$pdf->Image('brasao.png',280,30,35,45);

$pdf->Ln(5);

$pdf->SetFont('arial','B',12);
$pdf->Ln(50);
$pdf->Cell(0,5,utf8_decode('UNIVERSIDADE FEDERAL DO CEARÁ'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('PRÓ-REITORIA DE EXTENSÃO'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('COORDENADORIA DA AGÊNCIA DE ESTÁGIOS DA UFC'),0,1,'C');
$pdf->Ln(100);
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,5,utf8_decode('DECLARAÇÃO'),0,1,'C');
$pdf->Ln(60);
$pdf->SetFont('arial','',14);
$pdf->MultiCell(520, 22, utf8_decode('        Declaramos para os devidos fins que o (a) professsor (a) '.$nome_prof.', orientou o (a) aluno (a) '.$nome.' no estágio curricular '.$classificacao_termo.', na empresa '.$nome_empresa.', com carga horária de '.$carga_horaria.' horas semanais, no período compreendido entre '.$dt_inicio.' a '.$dt_fim.', em conformidade com a Lei 11.788 de 25 de Setembro de 2008 e resolução nº 32/CEPE de 30 de Outubro de 2009.'), 0, 'J');
$pdf->Ln(50);
$pdf->SetFont('arial','',14);
$pdf->Cell(520, 22, utf8_decode('Fortaleza, '.$dia.' de '.$mes.' de '.$ano), 0, 0, 'R');
$pdf->Ln(170);
$pdf->SetFont('arial','',14);
$pdf->Cell(520, 20,utf8_decode('Prof. Rogério Teixeira Masih'), 0, 0, 'C');
$pdf->Ln(15);
$pdf->Cell(520, 20,utf8_decode('Coordenador da Agência de Estágios'), 0, 0, 'C');
$pdf->Ln(15);
$pdf->SetFont('arial','B',14);
$pdf->Cell(520, 20,utf8_decode('Código de Validação: '.$chave), 0, 0, 'C');



$pdf->Output(utf8_decode("DECLARAÇÃO - .pdf"),"I");

?>