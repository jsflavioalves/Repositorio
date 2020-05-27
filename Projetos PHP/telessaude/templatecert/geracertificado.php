<?php

defined('EXEC') or die();
$transacao = 'geracertificado';
$ufDefault = 'CE';


if($auth->isRead($transacao) && !$auth->isAdmin()){
   Util::info(Config::AUTH_MESSAGE);
   return true;
 }

 $indice = $_POST['indice'];
$cdcurso = $_POST['curso'];

// $nm_usuario = $_POST['nm_usuario'];
$cpf = $_POST['cpf'];
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dia = strftime('%d', strtotime('today'));
$mes = strftime('%B', strtotime('today'));
$ano = strftime('%Y', strtotime('today'));
$hora = date('H:i:s');

$val  = "123456789ABCDEFGHIJKLMNOPQRSTUVXZ".time().date("GisYmd");
$md5   	 = md5($val);
$chave 	 = strtoupper(substr($md5, 0, 20));

$sqlProcNome = "SELECT nm_usuario,nm_login FROM tb_usuario WHERE nm_login ='". $cpf. "'";
$query1 = query($sqlProcNome);
$row1 = $query1->fetch();
$nm_usuario = $row1['nm_usuario'];

$sqlProcCurso = "SELECT ds_codigo,ds_descricao,dt_inicio, dt_fim, nr_ch FROM tb_curso WHERE ds_codigo ='". $cdcurso. "'";
$query2 = query($sqlProcCurso);
$row2 = $query2->fetch();
$curso = $row2['ds_descricao'];
$dt_inicio = date("d/m/Y", strtotime($row2['dt_inicio']));
$dt_fim = date("d/m/Y", strtotime($row2['dt_fim']));
$carga_horaria = $row2['nr_ch'];

//$busca_termo=mysql_query("SELECT*FROM termo_compromisso where id_termo_compromisso like '$id_termo'");
//$sql_termo=mysql_fetch_array($busca_termo);
//$id_empresa= utf8_encode($sql_termo['nome']);
//$rescisao= utf8_encode($sql_termo['rescisao']);
//$dt_inicio= utf8_encode($sql_termo['dt_inicio']);
//$dt_fim= utf8_encode($sql_termo['dt_fim']);
// if ($dt_fim > date("d-m-Y")) echo $dt_fim. 'ok'. date("d-m-Y") ;
//$carga_horaria= utf8_encode($sql_termo['carga_horaria']);
//$classificacao_termo= utf8_encode($sql_termo['classificacao_termo']);

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

$sqlInsDec = "INSERT INTO tb_declaracao VALUES ('$nm_usuario','$cpf','$curso','$dia de $mes de $ano','$hora','$chave')";
$consinserir = query($sqlInsDec);
$inserir = $consinserir -> fetch();

ob_clean();
require('fpdf/fpdf.php');


$pdf = new FPDF('L','pt','A4');
// P = PORTRAIT E L = LANDSCAPE
$pdf->AddPage(); 

// $pdf->SetTitle(utf8_decode('CERTIFICADO'));

// $pdf->Image('brasao.png',180,20);
$pdf->Image('Prancheta5.jpg',0,0);

$pdf->Ln(5);

$pdf->SetFont('arial','B',12);
//$pdf->Ln(50);
$pdf->Ln(15);
//$pdf->Cell(0,5,utf8_decode('UNIVERSIDADE FEDERAL DO CEARÁ'),0,1,'C');
$pdf->Ln(13);
//$pdf->Cell(0,5,utf8_decode('FACULDADE DE MEDICINA'),0,1,'C');
$pdf->Ln(13);
//$pdf->Cell(0,5,utf8_decode('NUTEDS -  Núcleo de Tecnologias e Educação a Distância em Saúde da UFC'),0,1,'C');
$pdf->Ln(100);
$pdf->SetFont('arial','B',14);
//$pdf->Cell(0,5,utf8_decode('CERTIFICADO'),0,1,'C');
$pdf->Ln(50);
$pdf->SetFont('arial','',14);

//$pdf->MultiCell(810, 25, utf8_decode('    Certificamos que, '.$nm_usuario.', CPF Nº '.$cpf.', concluiu  o  curso de '.$curso.',       promovido pelo Núcleo de Tecnologias e Educação a Distância em Saúde da Faculdade de Medicina da Universidade Federal   do Ceará (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional Telessaúde Brasil Redes,com aproveitamento         SATISFATÓRIO, '.' no período compreendido entre '.$dt_inicio.' a '.$dt_fim.', com   carga horária de '.$carga_horaria.' horas semanais.'), 0, 'J');
$pdf->MultiCell(820, 25, utf8_decode('  Certificamos que, '.$nm_usuario.', CPF Nº '.$cpf.','), 0, 'C');
$pdf->Ln(1);
$pdf->MultiCell(820, 25, utf8_decode('  concluiu  o  curso de '.$curso.","), 0, 'C');
$pdf->Ln(1);
$pdf->MultiCell(820, 25, utf8_decode('  promovido pelo Núcleo de Tecnologias e Educação a Distância em Saúde da Faculdade de Medicina da Universidade Federal     do Ceará (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional Telessaúde Brasil Redes,com aproveitamento           SATISFATÓRIO, '), 0, 'C');
$pdf->Ln(1);
$pdf->MultiCell(820, 25, utf8_decode('  no período compreendido entre '.$dt_inicio.' a '.$dt_fim.', com   carga horária de '.$carga_horaria.' horas semanais.'), 0, 'C');

$pdf->Ln(20);
$pdf->SetFont('arial','',14);
$meses = array(
    '01'=>'Janeiro',
    '02'=>'Fevereiro',
    '03'=>'Março',
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
$pdf->Cell(750, 32, utf8_decode('Fortaleza, '.$dia.' de '.$meses[date('m')].' de '.$ano), 0, 0, 'R');
// $pdf->Ln(170);
$pdf->Ln(50);
$pdf->SetFont('arial','',14);
//$pdf->Cell(520, 20,utf8_decode('Prof. Dr. Luís Roberto de Oliveira'), 0, 0, 'C');
$pdf->Ln(15);
//$pdf->Cell(520, 20,utf8_decode('Diretor Geral do Nuteds'), 0, 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('arial','B',14);
$pdf->Cell(750, 30,utf8_decode('Código de Validação: '.$chave), 0, 0, 'C');



$pdf->Output(utf8_decode("Certificado - .pdf"),"I");

?>