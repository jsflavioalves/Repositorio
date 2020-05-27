<?php 

require('../conn.php');
mysql_select_db('estagios');
require('fpdf/fpdf.php');

$matricula_aluno = $_POST['matricula_aluno'];
$id_termo = $_POST['id_termo'];
$siape = $_POST['siape'];
$CD_EMPRESA = $_POST['CD_EMPRESA'];
$nome_prof = $_POST['nome_prof'];

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$pdf = new FPDF('L','pt','A4');
$pdf->AddPage();
$pdf->SetTitle('LISTA DE ALUNOS ORIENTADOS POR '. utf8_decode($nome_prof));

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
$pdf->Cell(0,5,'LISTA DE ALUNOS ORIENTADOS POR '.utf8_decode($nome_prof),0,1,'C');
$pdf->Ln(20);

$pdf->setFillColor(131, 131, 131);

$pdf->SetFont('times','B',12);
$pdf->Cell(280,15,utf8_decode('Nome do Aluno'),1,0,'C',1);
$pdf->Cell(80,15,utf8_decode('Data Inicio'),1,0,'C',1);
$pdf->Cell(80,15,utf8_decode('Data Fim'),1,0,'C',1);
$pdf->Cell(350,15,utf8_decode('Empresa'),1,1,'C',1);


$pdf->SetFont('times','',12);
$pdf->setFillColor(255, 255, 255);

$consulta = mysql_query("SELECT * FROM termo_compromisso WHERE siape LIKE '$siape'");

while ($sql = mysql_fetch_array($consulta)) {
$id_termo = $sql['id_termo_compromisso'];
$matricula_aluno = $sql['matricula_aluno'];
$nome = $sql['nome'];
$dt_inicio = $sql['dt_inicio'];
$dt_fim = $sql['dt_fim'];

$consulta1 = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
$sql1 = mysql_fetch_array($consulta1);
$aluno = utf8_encode($sql1['nome']);

$consulta2 = mysql_query("SELECT * FROM empresas WHERE CD_EMPRESA LIKE '$nome'");
$sql2 = mysql_fetch_array($consulta2);
$empresa = utf8_encode($sql2['nome']);

$pdf->Cell(280,15,ucfirst($sql1['nome']),1,0,'C',1);
$pdf->Cell(80,15,utf8_decode($sql['dt_inicio']),1,0,'C',1);
$pdf->Cell(80,15,utf8_decode($sql['dt_inicio']),1,0,'C',1);
$pdf->Cell(350,15,ucfirst($sql2['nome']),1,1,'C',1);

}
$pdf->Ln(60);
$pdf->SetFont('arial','',14);
$pdf->Write(20,utf8_decode('Fortaleza, '.$dia.' de '.$mes.' de '.$ano));
$pdf->Ln(60);
$pdf->SetFont('arial','',14);
$pdf->Write(20,utf8_decode('Prof. Rogério Teixeira Masih'));
$pdf->Ln(15);
$pdf->Write(20,utf8_decode('Coordenador da Agência de Estágios'));
$pdf->Ln(15);

$pdf->output("LISTA DE ALUNOS ORIENTADOS POR ".$nome_prof.".pdf","I");

 ?>