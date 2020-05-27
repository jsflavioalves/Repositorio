<?php

defined('EXEC') or die();
$transacao = 'geracertificado';
$ufDefault = 'CE';


if($auth->isRead($transacao) && !$auth->isAdmin()){
   Util::info(Config::AUTH_MESSAGE);
   return true;
 }

// $indice = $_POST['indice'];
$cdcurso = $_POST['selcurso'];

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
//$textcertif = 'Certificamos que, {aluno} CPF No. {cpf}, concluiu o curso de {curso}, promovido pelo N&uacute;cleo de Tecnologias e Educa&ccedil;&atilde;o&nbsp;&agrave; Dist&acirc;ncia em Sa&uacute;de da Faculdade de Medicina da Universidade Federal do Cear&aacute; (NUTEDS/FAMED/UFC), em parceria com o Programa Nacional de Telessa&uacute;de Brasil Redes, com aproveitamento satisfat&oacute;rio, no per&iacute;odo compreendido entre {dt_inicio} a {dt_fim}, com carga hor&aacute;ria de {cargahoraria} horas semanais.';
//$textcertiftras = 'Conte&#250;do Program&#225;tico: Carga Hor&#225;ria: {cargahoraria} Data de Emiss&#227;o: {dataemissao}';

$sqlTex = 'SELECT * FROM tb_textocertif WHERE "curso"='."'".$cdcurso."'";
$cons = query($sqlTex);
$consulta = $cons -> fetch();
$textcertif = html_entity_decode(stripslashes($consulta['TeorCertificadoFrente']));
$textcertiftras =html_entity_decode(stripslashes($consulta['TeorCertificadoTras']));

//Importando a classe de SQL
Loader::import('com.atitudeweb.SQL');

$sqlDec = "SELECT * FROM tb_certificados_imp WHERE cpf='".$cpf."' AND curso='".$cdcurso."'";
$consCertif = query($sqlDec);
$consultacert = $consCertif -> fetch();
$count = $consCertif->rowCount();
if($count==0){
    $sqlInsDec = "INSERT INTO tb_certificados_imp VALUES ('$nm_usuario','$cpf','$cdcurso','$dia de $mes de $ano','$hora','$chave')";
    $consinserir = query($sqlInsDec);
    $inserir = $consinserir -> fetch();}
$count = $consCertif->rowCount();
if($count>0)$chave = $consultacert['CodValidacao'];

ob_clean();
require_once('TCPDF/tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = 'Prancheta5menor.jpg';
        //$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->Image($img_file, 0, 0, 300, 210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// $pdf = new FPDF('L','pt','A4');
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// P = PORTRAIT E L = LANDSCAPE

// $pdf->SetTitle(utf8_decode('CERTIFICADO'));
// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// remove default header/footer
//$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'TCPDF/lang/por.php')) {
    require_once(dirname(__FILE__).'TCPDF/lang/por.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('times', '', 14,'',true);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

$pdf->setCellPaddings(1, 1, 1, 1);

$pdf->setCellMargins(1, 1, 1, 1);

$pdf->SetFillColor(255, 255, 127);

$meses = array(
    '01'=>'Janeiro',
    '02'=>'Fevereiro',
    '03'=>'Marco',
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


$html='</p></p></p></p>';

$count = 0;
if(isset($nm_usuario))$textcertif = str_replace("{aluno}", $nm_usuario, $textcertif, $count);
if(isset($curso))$textcertif = str_replace("{curso}", $curso, $textcertif, $count);
if(isset($cpf))$textcertif = str_replace("{cpf}", $cpf, $textcertif, $count);
if(isset($dt_inicio))$textcertif = str_replace("{dt_inicio}", $dt_inicio, $textcertif, $count);
if(isset($dt_fim))$textcertif = str_replace("{dt_fim}", $dt_fim, $textcertif, $count);
if(isset($carga_horaria)){
    $textcertif = str_replace("{cargahoraria}", $carga_horaria, $textcertif, $count);
    $textcertiftras = str_replace("{cargahoraria}", $carga_horaria, $textcertiftras, $count);
}
$textcertiftras = str_replace("{dataemissao}", $dia. ' de '. $mes . ' de '. $ano, $textcertiftras, $count);

$html = $html.$textcertif;
$html = $html. '<p align="center">'.'Fortaleza, '.$dia.' de '.utf8_decode($meses[date('m')]).' de '.$ano.'</p>';
$html = $html. '<p align="center">'.utf8_decode('Prof. Dr. Luiz Roberto de Oliveira').'</p>';
$html = $html. '<p align="center">'.utf8_decode('C&oacute;digo de Valida&ccedil;&atilde;o:'). $chave.'</p>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = 'Prancheta 4.jpg';
$pdf->Image($img_file, 0, 0, 300, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


$htmltras = $textcertiftras;

$pdf->writeHTML($htmltras, true, false, true, false, '');

$pdf->Output(utf8_decode("Certificado - .pdf"),"I");

?>