<?php
require('fpdf/fpdf.php');
require('conn.php');
mysql_select_db('estagios');

$id_agendamento = $_POST['id_agendamento'];
$matricula_aluno = $_POST['matricula_aluno'];
$nome_aluno = $_POST['nome_aluno'];
$data = $_POST['data'];
$hora = $_POST['hora'];

/*
$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));
*/

$pdf = new FPDF('P','pt','A4');
$pdf->AddPage(); 

$pdf->SetTitle(utf8_decode('COMPROVANTE'));

$pdf->Image('brasao.png',280,30,35,45);

$pdf->Ln(5);

$pdf->SetFont('arial','B',12);
$pdf->Ln(50);
$pdf->Cell(0,5,utf8_decode('UNIVERSIDADE FEDERAL DO CEARÁ'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('PRÓ-REITORIA DE EXTENSÃO'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('COORDENADORIA DA AGÊNCIA DE ESTÁGIOS DA UFC'),0,1,'C');
$pdf->Ln(80);
$pdf->Cell(0,5,utf8_decode('COMPROVANTE DE AGENDAMENTO'),0,1,'C');
$pdf->Ln(50);

$pdf->SetFont('arial','B',10);

$pdf->Cell(90,15,utf8_decode('AGENDAMENTO'),1,0,'C');
$pdf->Cell(80,15,utf8_decode('MATRÍCULA'),1,0,'C');
$pdf->Cell(240,15,utf8_decode('NOME ALUNO'),1,0,'C');
$pdf->Cell(70,15,utf8_decode('DATA'),1,0,'C');
$pdf->Cell(50,15,utf8_decode('HORA'),1,1,'C');

$pdf->SetFont('arial','',10);

$pdf->Cell(90,15,$id_agendamento,1,0,'C');
$pdf->Cell(80,15,$matricula_aluno,1,0,'C');
$pdf->Cell(240,15,utf8_decode($nome_aluno),1,0,'C');
$pdf->Cell(70,15,$data,1,0,'C');
$pdf->Cell(50,15,$hora,1,1,'C');

$pdf->SetFont('arial','',8);
$pdf->Ln(60);
$pdf->Cell(170,15,utf8_decode('Informações Adicionais:'),0,1,'L');
$pdf->Cell(170,15,utf8_decode('Favor comparecer 10 (dez) minutos de antecedência do horário agendado.'),0,1,'L');

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y', strtotime('today'));

$pdf->Ln(60);
$pdf->SetFont('arial','B',12);
$pdf->Cell(520, 22, utf8_decode('Fortaleza, '.$data.''), 0, 0, 'R');
$pdf->Ln(170);

/*
$pdf->SetFont('arial','B',14);
$pdf->Cell(520, 20,utf8_decode('Código de Validação: '.$chave), 0, 0, 'C');
*/


$pdf->Output(utf8_decode("comprovante_agendamento.pdf"),"I");

?>