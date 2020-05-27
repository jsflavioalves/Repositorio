<?php

require('../../../conn.php');
//mysqli_select_db('estagios');

$matricula_aluno = $_POST['id_aluno'];
//$id_termo = $_POST['id_tce'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$hora = $_POST['hora'];


$val = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5  = md5($val);
$chave 	= strtoupper(substr($md5, 0, 20));

$busca_aluno=mysqli_query($conn,"SELECT*FROM alunos where matricula like '$matricula_aluno'");
$sql_aluno=mysqli_fetch_array($busca_aluno);
$id_aluno= utf8_encode($sql_aluno['id_aluno']);
$nome= utf8_encode($sql_aluno['nome']);
$cpf = $sql_aluno['cpf'];
$curso= utf8_encode($sql_aluno['curso']);
$matricula= utf8_encode($sql_aluno['matricula']);

$busca_termo=mysqli_query($conn,"SELECT*FROM termo_compromisso where matricula_aluno like '$matricula_aluno'");

$inserir = mysqli_query($conn,"INSERT INTO declaracao VALUES ('','$id_aluno','0','$chave','$dia de $mes de $ano','$hora')");

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
$pdf->Cell(0,5,utf8_decode('NÚCLEO DE TECNOLOGIA DE ENSINO A DISTÂNCIA - NUTEDS'),0,1,'C');
$pdf->Ln(100);
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,5,utf8_decode('DECLARAÇÃO'),0,1,'C');
$pdf->Ln(50);
$pdf->SetFont('arial','',14);
$pdf->MultiCell(520, 22, utf8_decode('              Declaramos, para os devidos fins de direito, que, '.$nome.', CPF Nº '.$cpf.', enquanto estudante do curso de '.$curso.', matrícula '.$matricula.', celebrou Termo de Compromisso de Estágio:'), 0, 'J');
$pdf->Ln(15);

while ($sql_termo=mysqli_fetch_array($busca_termo)) {
	$id_empresa= utf8_encode($sql_termo['nome']);
	$dt_inicio= utf8_encode($sql_termo['dt_inicio']);
	$dt_fim= utf8_encode($sql_termo['dt_fim']);
	$rescisao= utf8_encode($sql_termo['rescisao']);
	$carga_horaria= utf8_encode($sql_termo['carga_horaria']);
	$classificacao_termo= utf8_encode($sql_termo['classificacao_termo']);

	$busca_empresa=mysqli_query($conn,"SELECT*FROM empresas where CD_EMPRESA like '$id_empresa'");
	$sql_empresa=mysqli_fetch_array($busca_empresa);
	$nome_empresa= utf8_encode($sql_empresa['nome']);

	if($rescisao == ''){
		$pdf->MultiCell(520, 22, utf8_decode('- '.$classificacao_termo.' junto à  concedente '.$nome_empresa.' para realização de atividades pelo período compreendido entre '.$dt_inicio.' a '.$dt_fim.', com carga horária de '.$carga_horaria.' horas semanais.'), 0, 'J');
	} else if($rescisao != ''){
		$pdf->MultiCell(520, 22, utf8_decode('- '.$classificacao_termo.' junto à  concedente '.$nome_empresa.' para realização de atividades pelo período compreendido entre '.$dt_inicio.' a '.$rescisao.', com carga horária de '.$carga_horaria.' horas semanais.'), 0, 'J');
	}
	
}
$pdf->Ln(10);
$pdf->Write(20,utf8_decode('Em conformidade com a Lei 11.788 de 25 de Setembro de 2008 e resolução nº 32/CEPE de 30 de Outubro de 2009.'));
$pdf->Ln(50);
$pdf->SetFont('arial','',14);
$meses = array(
    '01'=>'Janeiro',
    '02'=>'Fevereiro',
    '03'=>'MarÃ§o',
    '04'=>'Abril',
    '05'=>'Maio',
    '06'=>'Junho',
    '07'=>'Julho',
    '08'=>'Agosto',
    '09'=>'Setembro',
    '10'=>'Outubro',
    '11'=>'Novembro',
    '12'=>'Dezembro'
);
$pdf->Cell(520, 22, utf8_decode('Fortaleza, '.$dia.' de '.$meses[date('m')].' de '.$ano), 0, 0, 'R');
$pdf->Ln(110);
$pdf->SetFont('arial','',14);
$pdf->Cell(520, 20,utf8_decode('Prof. Dr. Luis Roberto'), 0, 0, 'C');
$pdf->Ln(15);
$pdf->Cell(520, 20,utf8_decode('Diretor do Nuteds'), 0, 0, 'C');
$pdf->Ln(15);
$pdf->SetFont('arial','B',14);
$pdf->Cell(520, 20,utf8_decode('Código de Validação: '.$chave), 0, 0, 'C');



$pdf->Output(utf8_decode("DECLARAÃ‡ÃƒO - .pdf"),"I");

?>