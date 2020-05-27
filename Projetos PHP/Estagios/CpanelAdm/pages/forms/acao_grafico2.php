<?php
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

//CONSULTA DE EMPRESAS DO TIPO PRIVADA
$pri=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '3'");
$result_pri=mysql_num_rows($pri);

//CONSULTA DE EMPRESAS DO TIPO PUBLICA
$pub=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '4'");
$result_pub=mysql_num_rows($pub);

//CONSULTA DE EMPRESAS DO TIPO ONG/OSCIP
$ong=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '1'");
$result_ong=mysql_num_rows($ong);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$ai=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '5'");
$result_ai=mysql_num_rows($ai);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$fe=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '6'");
$result_fe=mysql_num_rows($fe);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$es=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '7'");
$result_es=mysql_num_rows($es);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$mu=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '8'");
$result_mu=mysql_num_rows($mu);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$ei=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '9'");
$result_ei=mysql_num_rows($ei);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$oi=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '10'");
$result_oi=mysql_num_rows($oi);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$sp=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '11'");
$result_sp=mysql_num_rows($sp);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$pl=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '12'");
$result_pl=mysql_num_rows($pl);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$ou=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '13'");
$result_ou=mysql_num_rows($ou);

//CONSULTA DE EMPRESAS DO TIPO MISTA
$mista=mysql_query("SELECT*FROM empresas WHERE CD_TIPO LIKE '2'");
$result_mista=mysql_num_rows($mista);


$data = array(array(utf8_decode('Privada'), $result_pri),array(utf8_decode('Pública'), $result_pub),array(utf8_decode('ONG/OSCIP'), $result_ong),array(utf8_decode('Mista'), $result_mista),array(utf8_decode('Agente de Integração'), $result_ai),array(utf8_decode('Federal'), $result_fe),array(utf8_decode('Estadual'), $result_es),array(utf8_decode('Municipal'), $result_mu),array(utf8_decode('Empresas/Industriais'), $result_ei),array(utf8_decode('Org. Internacionais'), $result_oi),array(utf8_decode('Sindical/Patronal'), $result_sp),array(utf8_decode('Profissional Liberal'), $result_pl),array(utf8_decode('Outras'), $result_ou));

$plot = new PHPlot(800 , 650);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);

# Set enough different colors;
$plot->SetDataColors(array('SkyBlue', 'red', 'green', 'black', 'orange', 'blue', 'purple', 'yellow', 'brown', 'gray', 'pink', 'gold', 'white'));

$plot->SetShading(1);

# Main plot title:
$plot->SetTitle(utf8_decode("NÚMERO DE TERMOS DE CONVÊNIOS \n POR TIPO DE CONCEDENTE"));

# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();
?>