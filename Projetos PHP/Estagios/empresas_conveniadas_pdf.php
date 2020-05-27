<?php 

require('conn.php');
mysql_select_db('estagios');
require('fpdf/fpdf.php');

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$pdf = new FPDF('L','pt','A4');
$pdf->AddPage();
$pdf->SetTitle(utf8_decode('LISTA DE EMPRESAS CONVENIADAS'));

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
$pdf->Cell(0,5,utf8_decode('LISTA DE EMPRESAS CONVENIADAS'),0,1,'C');
$pdf->Ln(20);

$pdf->setFillColor(131, 131, 131);

$pdf->SetFont('times','B',12);
$pdf->Cell(500,15,utf8_decode('Nome da Empresa'),1,0,'C',1);
$pdf->Cell(140,15,utf8_decode('Data Inicio'),1,0,'C',1);
$pdf->Cell(140,15,utf8_decode('Data Fim'),1,1,'C',1);


$pdf->SetFont('times','',12);
$pdf->setFillColor(255, 255, 255);

$consulta = mysql_query("SELECT * FROM empresas GROUP BY nome ASC");

while ($sql = mysql_fetch_array($consulta)) {
$nome = $sql['nome'];
$agt_int = $sql['AGENTE_INTEGRADOR'];
$CD_EMPRESA = $sql['CD_EMPRESA'];

$sql1 = mysql_query("SELECT * FROM termo_convenio WHERE CD_EMPRESA LIKE '$CD_EMPRESA' ORDER BY CD_CONVENIO DESC");

$noticias1 = mysql_fetch_array($sql1);
$dt_inicio=$noticias1['dt_inicio'];
$data_fim=$noticias1['dt_fim'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%m', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));

//DIVIDE A DATA FINAL DE ESTÁGIO EM DIA MÊS E ANO
$dia_final = substr($data_fim, 0, 2);
$mes_final = substr($data_fim, 3, 2);
$ano_final = substr($data_fim, 6, 4);

if ($agt_int!=null) {
  $pdf->Cell(500,15,ucfirst($sql['nome']),1,0,'L',1); 
  $pdf->Cell(280,15,$sql['AGENTE_INTEGRADOR'],1,1,'C',1);
}
if ($ano < $ano_final) {
  $pdf->Cell(500,15,ucfirst($sql['nome']),1,0,'L',1); 
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_inicio']),1,0,'C',1);
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_fim']),1,1,'C',1);      
} 
if ($ano_final == $ano and $mes > $mes_final) {     
  $pdf->Cell(500,15,ucfirst($sql['nome']),1,0,'L',1); 
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_inicio']),1,0,'C',1);
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_fim']),1,1,'C',1);   
} 
if ($ano == $ano_final and $mes == $mes_final and $dia > $dia_final) {
  $pdf->Cell(500,15,ucfirst($sql['nome']),1,0,'L',1); 
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_inicio']),1,0,'C',1);
  $pdf->Cell(140,15,utf8_decode($noticias1['dt_fim']),1,1,'C',1);      
}
}

$pdf->output("LISTA DE ALUNOS ORIENTADOS POR ".$nome_prof.".pdf","I");

 ?>