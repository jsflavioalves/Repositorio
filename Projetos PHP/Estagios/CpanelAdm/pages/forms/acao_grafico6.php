<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

$tce10=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2009' or SUBSTRING( dt_inicio, 7, 4 ) = '2010' or SUBSTRING( dt_inicio, 7, 4 ) = '2011' or SUBSTRING( dt_inicio, 7, 4 ) = '2012'");
$result_tce10=mysql_num_rows($tce10);

$tce11=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2010' or SUBSTRING( dt_inicio, 7, 4 ) = '2011' or SUBSTRING( dt_inicio, 7, 4 ) = '2012' or SUBSTRING( dt_inicio, 7, 4 ) = '2013'");
$result_tce11=mysql_num_rows($tce11);

$tce12=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2011' or SUBSTRING( dt_inicio, 7, 4 ) = '2012' or SUBSTRING( dt_inicio, 7, 4 ) = '2013' or SUBSTRING( dt_inicio, 7, 4 ) = '2014'");
$result_tce12=mysql_num_rows($tce12);

$tce13=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2012' or SUBSTRING( dt_inicio, 7, 4 ) = '2013' or SUBSTRING( dt_inicio, 7, 4 ) = '2014' or SUBSTRING( dt_inicio, 7, 4 ) = '2015'");
$result_tce13=mysql_num_rows($tce13);

$tce14=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2013' or SUBSTRING( dt_inicio, 7, 4 ) = '2014' or SUBSTRING( dt_inicio, 7, 4 ) = '2015' or SUBSTRING( dt_inicio, 7, 4 ) = '2016'");
$result_tce14=mysql_num_rows($tce14);

$tce15=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2014' or SUBSTRING( dt_inicio, 7, 4 ) = '2015' or SUBSTRING( dt_inicio, 7, 4 ) = '2016' or SUBSTRING( dt_inicio, 7, 4 ) = '2017'");
$result_tce15=mysql_num_rows($tce15);

$tce16=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2015' OR SUBSTRING( dt_inicio, 7, 4 ) = '2016' OR SUBSTRING( dt_inicio, 7, 4 ) = '2017' OR SUBSTRING( dt_inicio, 7, 4 ) = '2018'");
$result_tce16=mysql_num_rows($tce16);

$tce17=mysql_query("SELECT*FROM termo_convenio WHERE SUBSTRING( dt_inicio, 7, 4 ) = '2016' OR SUBSTRING( dt_inicio, 7, 4 ) = '2017' OR SUBSTRING( dt_inicio, 7, 4 ) = '2018' OR SUBSTRING( dt_inicio, 7, 4 ) = '2019'");
$result_tce17=mysql_num_rows($tce17);
  
$data = array(
	         array('2012' , $result_tce10 ),
	         array('2013' , $result_tce11 ),
             array('2014' , $result_tce12 ), 
             array('2015' , $result_tce13 ),
             array('2016' , $result_tce14 ),
             array('2017' , $result_tce15 ),
             array('2018' , $result_tce16 ),
             array('2019' , $result_tce17 )
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('CONVENIOS VIGENTES NOS ULTIMOS 8 ANOS'));
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("linepoints");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel(utf8_decode("Fonte: Banco de Dados da Agência de Estágios da UFC"));
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>