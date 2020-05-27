<?php
require('conn.php');
mysql_select_db('estagios');

$id_aluno = $_POST['id_aluno'];
$id_termo = $_POST['id_termo'];
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
$dt_inicio= utf8_encode($sql_termo['dt_inicio']);
$dt_fim= utf8_encode($sql_termo['dt_fim']);
$rescisao= utf8_encode($sql_termo['rescisao']);
$carga_horaria= utf8_encode($sql_termo['carga_horaria']);
$classificacao_termo= utf8_encode($sql_termo['classificacao_termo']);

$busca_aluno=mysql_query("SELECT*FROM alunos where id_aluno like '$id_aluno'");
$sql_aluno=mysql_fetch_array($busca_aluno);
$nome= utf8_encode($sql_aluno['nome']);
$cpf = $sql_aluno['cpf'];
$curso= utf8_encode($sql_aluno['curso']);
$matricula= utf8_encode($sql_aluno['matricula']);

$busca_empresa=mysql_query("SELECT*FROM empresas where CD_EMPRESA like '$id_empresa'");
$sql_empresa=mysql_fetch_array($busca_empresa);
$nome_empresa= utf8_encode($sql_empresa['nome']);

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
$pdf->Ln(60);
$pdf->SetFont('arial','',14);
if ($rescisao == '') {
	$pdf->MultiCell(520, 22, utf8_decode('      Declaramos, para os devidos fins de direito, que, '.$nome.', CPF Nº '.$cpf.', enquanto estudante do curso de '.$curso.', matrícula '.$matricula.', celebrou Termo de Compromisso de Estágio do tipo '.$classificacao_termo.' junto à concedente '.$nome_empresa.' para realização de atividades pelo período compreendido entre '.$dt_inicio.' e '.$dt_fim.', com carga horária de '.$carga_horaria.' horas semanais.'), 0, 'J');
}
if ($rescisao != '') {
	$pdf->MultiCell(520, 22, utf8_decode('      Declaramos, para os devidos fins de direito, que, '.$nome.', CPF Nº '.$cpf.', enquanto estudante do curso de '.$curso.', matrícula '.$matricula.', celebrou Termo de Compromisso de Estágio do tipo '.$classificacao_termo.' junto à concedente '.$nome_empresa.' para realização de atividades pelo período compreendido entre '.$dt_inicio.' e '.$rescisao.', com carga horária de '.$carga_horaria.' horas semanais.'), 0, 'J');
}

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