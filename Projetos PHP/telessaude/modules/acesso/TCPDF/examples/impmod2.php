<?php

defined('EXEC') or die();
$transacao = 'impmodelo';
$ufDefault = 'CE';


if($auth->isRead($transacao) && !$auth->isAdmin()){
   Util::info(Config::AUTH_MESSAGE);
   return true;
 }

 function dataready($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 } 
 


require_once('tcpdf_include.php');


// $pdf = new FPDF('L','pt','A4');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// P = PORTRAIT E L = LANDSCAPE
$pdf->AddPage(); 

// $pdf->SetTitle(utf8_decode('CERTIFICADO'));

// $pdf->Image('brasao.png',180,20);
//$pdf->Image('Prancheta5.jpg',0,0);

//$pdf->Ln(5);

//$pdf->SetFont('arial','B',12);
//$pdf->Ln(50);
//$pdf->Ln(15);
//$pdf->Cell(0,5,utf8_decode('UNIVERSIDADE FEDERAL DO CEARÃ�'),0,1,'C');
//$pdf->Ln(13);
//$pdf->Cell(0,5,utf8_decode('FACULDADE DE MEDICINA'),0,1,'C');
//$pdf->Ln(13);
//$pdf->Cell(0,5,utf8_decode('NUTEDS -  NÃºcleo de Tecnologias e EducaÃ§Ã£o a DistÃ¢ncia em SaÃºde da UFC'),0,1,'C');
//$pdf->Ln(100);
//$pdf->SetFont('arial','B',14);
//$pdf->Cell(0,5,utf8_decode('CERTIFICADO'),0,1,'C');
//$pdf->Ln(50);
//$pdf->SetFont('arial','',14);

//$pdf->MultiCell(810, 25, utf8_decode('    Certificamos que, '.$nm_usuario.', CPF NÂº '.$cpf.', concluiu  o  curso de '.$curso.',       promovido pelo NÃºcleo de Tecnologias e EducaÃ§Ã£o a DistÃ¢ncia em SaÃºde da Faculdade de Medicina da Universidade Federal   do CearÃ¡ (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional TelessaÃºde Brasil Redes,com aproveitamento         SATISFATÃ“RIO, '.' no perÃ­odo compreendido entre '.$dt_inicio.' a '.$dt_fim.', com   carga horÃ¡ria de '.$carga_horaria.' horas semanais.'), 0, 'J');

//$pdf->Ln(1);
//$pdf->MultiCell(820, 25, utf8_decode('  concluiu  o  curso de '.$curso.","), 0, 'C');
//$pdf->Ln(1);
// $pdf->MultiCell(820, 25, utf8_decode('  promovido pelo NÃºcleo de Tecnologias e EducaÃ§Ã£o a DistÃ¢ncia em SaÃºde da Faculdade de Medicina da Universidade Federal     do CearÃ¡ (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional TelessaÃºde Brasil Redes,com aproveitamento           SATISFATÃ“RIO, '), 0, 'C');
//$pdf->MultiCell(820, 25, $textcertif, 0, 'C');

//$pdf->Ln(1);
//$pdf->MultiCell(820, 25, utf8_decode('  no período compreendido entre '.$dt_inicio.' a '.$dt_fim.', com   carga horária de '.$carga_horaria.' horas semanais.'), 0, 'C');

//$pdf->Ln(20);
//$pdf->SetFont('arial','',14);
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
//$pdf->Cell(750, 32, utf8_decode('Fortaleza, '.$dia.' de '.$meses[date('m')].' de '.$ano), 0, 0, 'R');

//$pdf->Ln(50);
//$pdf->SetFont('arial','',14);

//$pdf->Ln(15);

//$pdf->Ln(5);
//$pdf->SetFont('arial','B',14);
//$pdf->Cell(750, 30,utf8_decode('Código de Validação: '.$chave), 0, 0, 'C');
$pdf->Write(0, utf8_decode('Código de Validação: '.$chave), '', 0, 'C', true, 0, false, false, 0);


$pdf->Output(utf8_decode("Certificado - .pdf"),"I");

?>