<?php

require('../../../conn.php');
mysql_select_db('estagios');

session_start();
$matricula_aluno = $_SESSION['y'];
$id_termo = $_SESSION['x'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$texto = utf8_decode($_POST['texto']);

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

$busca_id_aluno = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
$array = mysql_fetch_array($busca_id_aluno);
$id_aluno = $array['id_aluno'];

$inserir = mysql_query("INSERT INTO declaracao VALUES ('','$id_aluno','$id_termo','$chave','$dia de $mes de $ano','$hora')");

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
$pdf->Ln(50);
$pdf->SetFont('arial','',14);

$pdf->MultiCell(520, 22,"          ".$texto, 0, 'J');

$pdf->Ln(60);
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