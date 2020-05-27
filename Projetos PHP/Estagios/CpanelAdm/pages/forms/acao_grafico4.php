<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

$tce12=mysql_query("SELECT*FROM termo_convenio WHERE dt_inicio LIKE '%2015%'");
$result_tce12=mysql_num_rows($tce12);
$tce13=mysql_query("SELECT*FROM termo_convenio WHERE dt_inicio LIKE '%2016%'");
$result_tce13=mysql_num_rows($tce13);
$tce14=mysql_query("SELECT*FROM termo_convenio WHERE dt_inicio LIKE '%2017%'");
$result_tce14=mysql_num_rows($tce14);
$tce15=mysql_query("SELECT*FROM termo_convenio WHERE dt_inicio LIKE '%2018%'");
$result_tce15=mysql_num_rows($tce15);
$tce16=mysql_query("SELECT*FROM termo_convenio WHERE dt_inicio LIKE '%2019%'");
$result_tce16=mysql_num_rows($tce16);
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
             array('2015' , $result_tce12 ), 
             array('2016' , $result_tce13 ),
             array('2017' , $result_tce14 ),
             array('2018' , $result_tce15 ),
             array('2019' , $result_tce16 )
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('CONVENIOS FEITOS NOS ULTIMOS 5 ANOS'));
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