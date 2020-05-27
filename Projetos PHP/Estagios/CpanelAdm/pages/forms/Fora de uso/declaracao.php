<?php
require('../../../conn.php');
mysql_select_db('estagios');
$declaracao = $_POST['declaracao'];


require('fpdf/fpdf.php');

$editor1 = $_POST['editor1'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

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
$pdf->Ln(100);
$pdf->SetFont('arial','',14);
$pdf->Write(20,utf8_decode($editor1));
$pdf->Ln(50);
$pdf->SetFont('arial','',14);
$pdf->Write(20,utf8_decode('Fortaleza, '.$dia.' de '.$mes.' de '.$ano));
$pdf->Ln(170);
$pdf->SetFont('arial','',14);
$pdf->Write(20,utf8_decode('Prof. Rogério Teixeira Masih'));
$pdf->Ln(15);
$pdf->Write(20,utf8_decode('Coordenador da Agência de Estágios'));
$pdf->Ln(15);
$pdf->SetFont('arial','B',14);
$pdf->Write(20,utf8_decode('Código de Validação: '.$chave));



$pdf->Output(utf8_decode("DECLARAÇÃO - .pdf"),"I");

?>	