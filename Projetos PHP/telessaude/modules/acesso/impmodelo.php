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
 
// $indice = $_POST['indice'];
$cdcurso = $_POST['selcurso']; 
$textcertif = $_POST['myeditor'];
$textcertiftras = $_POST['myeditortras'];
$pasta = './templatecert/';
$arqtemplatefrente='';
$arqtemplatetras='';
$arqtemplatefrente = $_SESSION['pdf'];
$arqtemplatetras = $_SESSION['pdftras'];

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

$sqlProcCurso = "SELECT ds_codigo,ds_descricao,dt_inicio, dt_fim, nr_ch FROM tb_curso WHERE ds_codigo = '". $cdcurso. "'";
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

$sqlInsDec = "INSERT INTO tb_certificados_imp VALUES ('$nm_usuario','$cpf','$curso','$dia de $mes de $ano','$hora','$chave')";
$consinserir = query($sqlInsDec);
$inserir = $consinserir -> fetch();

/* Cadastra os textos da frente e tras do certificado */
$textofrente = htmlentities(addslashes($textcertif));
$textotras = htmlentities(addslashes($textcertiftras));
// quando for ler do banco para html usar $html = html_entity_decode($campo[‘html’]);
$sqlTex = 'SELECT curso FROM tb_textocertif WHERE "curso"='."'".$curso."'";
$cons = query($sqlTex);
$consulta = $cons -> fetch();

if ($cons){
    $sqlUpdateTex = 'UPDATE tb_textocertif SET "TeorCertificadoFrente"='."'".$textofrente."'".',"TeorCertificadoTras"='."'".$textotras."'". 'WHERE "curso"='."'".$cdcurso."'";
    $consUpdate = query($sqlUpdateTex);
    $atualiza = $consUpdate -> fetch();}
    
if($consulta['curso']==''){
        $sqlInsTex = "INSERT INTO tb_textocertif VALUES ('$textofrente','$cdcurso','$textotras')";
        $consinserir2 = query($sqlInsTex);
        $inserir2 = $consinserir2 -> fetch();}
        

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

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//$pdf->setImageScale(1.53);
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set image scale factor
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

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

//$html = '<img src="Prancheta5.jpg">';
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

// $pdf->Image('Prancheta5.jpg', 0,  0, 2000, 800, 'JPG', '', '', false,300,'C',false, false, 0, true, false, true, false);
//$pdf->Image('Prancheta5.jpg', 0,  10, 1700, 900, 'JPG');
//if($arqtemplatefrente!='') $pdf->Image($pasta.$arqtemplatefrente, 0, 10, 1700, 900, 'JPG');
//else $pdf->Image('Prancheta5.jpg', 0, 10, 1700, 900, 'JPG');

$html='</p></p></p></p>';
//$html = $html.'<p>'.'Usuario='.$nm_usuario.'CPF='.$cpf.' curso='.$curso.' DTINICIO='.$dt_inicio.'</p>';

//$html = $html.$textcertif . "<page> outra pagina</page>";
//substr_replace('$textcertif', $curso, 0);
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
//$html = $html . '<img src="Prancheta5.jpg">';
//$html = $head.'<img id="imagem" src="Prancheta5.jpg"/> <div id="texto">'.$html.'</div>';
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
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

//if($arqtemplatetras!='') $pdf->Image($pasta.$arqtemplatetras, 0, 10, 1700, 900, 'JPG');
//else $pdf->Image('Prancheta 4.jpg', 0, 10, 1700, 900, 'JPG');

$htmltras = $textcertiftras;
//$pdf->writeHTMLCell(0, 0, '', '', $htmltras, 0, 1, 0, true, 'C', true);
$pdf->writeHTML($htmltras, true, false, true, false, '');

$pdf->Output(utf8_decode("Certificado - .pdf"),"I");


?>