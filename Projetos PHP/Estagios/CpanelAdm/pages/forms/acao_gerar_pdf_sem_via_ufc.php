<?php 

require('../../../conn.php');
mysql_select_db('estagios');
require('fpdf/fpdf.php');
$dt_inicio = $_POST['ano'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$pdf = new FPDF('L','pt','A4');
$pdf->AddPage();
$pdf->SetTitle('TERMOS FALTAM VIA UFC');

$pdf->SetFont('times','B',18);
$pdf->Image('brasao.png',400,30,35,45);
$pdf->Ln(5);
$pdf->SetFont('arial','B',12);
$pdf->Ln(50);
$pdf->Cell(0,5,utf8_decode('UNIVERSIDADE FEDERAL DO CEARÁ'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('PRÓ-REITORIA DE EXTENSÃO'),0,1,'C');
$pdf->Ln(13);
$pdf->Cell(0,5,utf8_decode('COORDENADORIA DA AGÊNCIA DE ESTÁGIOS DA UFC'),0,1,'C');
$pdf->Ln(60);
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,5,utf8_decode('TERMOS DE COMPROMISSO QUE FALTAM VIA UFC'),0,1,'C');
$pdf->Ln(20);

$pdf->setFillColor(131, 131, 131);

$pdf->SetFont('times','B',12);
$pdf->Cell(80,15,utf8_decode('ID TERMO'),1,0,'C',1);
$pdf->Cell(80,15,utf8_decode('CD TCC'),1,0,'C',1);
$pdf->Cell(100,15,utf8_decode('MATRÍCULA'),1,0,'C',1);
$pdf->Cell(320,15,utf8_decode('NOME'),1,0,'C',1);
$pdf->Cell(100,15,utf8_decode('DT INICIO'),1,0,'C',1);
$pdf->Cell(100,15,utf8_decode('DT FIM'),1,1,'C',1);


$pdf->SetFont('times','',12);
$pdf->setFillColor(255, 255, 255);

$busca = mysql_query("SELECT * FROM termo_compromisso WHERE SUBSTRING(dt_inicio, 7, 4) = '$dt_inicio' AND obs = 'FALTA VIA UFC'");
$quantidade = mysql_num_rows($busca);	
while($array = mysql_fetch_array($busca)){
  $id_termo_compromisso = $array['id_termo_compromisso'];
  $cd_tcc = $array['cd_tcc'];
  $matricula = $array['matricula_aluno'];
  $dt_inicio = $array['dt_inicio'];
  $dt_fim = $array['dt_fim'];

  $consulta_aluno = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula'");
  while($array1 = mysql_fetch_array($consulta_aluno)){
  	$nomealuno = $array1['nome'];
  }

$pdf->Cell(80,15,ucfirst($array['id_termo_compromisso']),1,0,'C');
$pdf->Cell(80,15,ucfirst($array['cd_tcc']),1,0,'C');
$pdf->Cell(100,15,ucfirst($array['matricula_aluno']),1,0,'C');
$pdf->Cell(320,15,$nomealuno,1,0,'C');
$pdf->Cell(100,15,ucfirst($array['dt_inicio']),1,0,'C');
$pdf->Cell(100,15,ucfirst($array['dt_fim']),1,1,'C');


}
$pdf->setFillColor(131, 131, 131);
$pdf->SetFont('times','B',12);
$pdf->Cell(680,15,"TOTAL",1,0,'C', 1);
$pdf->Cell(100,15,$quantidade,1,0,'C', 1);

$pdf->output("TERMOS_SEM_VIA_UFC.pdf","I");

 ?>