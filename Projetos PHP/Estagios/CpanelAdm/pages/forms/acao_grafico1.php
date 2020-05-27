<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

// $ano = date('Y');
$ano = 2019;
$ano1 = $ano-1;
$ano2 = $ano-2;
$ano3 = $ano-3;
$ano4 = $ano-4;
$ano5 = $ano-5;
$ano6 = $ano-6;
$ano7 = $ano-7;

$tce9=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano7%'");
$result_tce9=mysql_num_rows($tce9);
$tce10=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano6%'");
$result_tce10=mysql_num_rows($tce10);
$tce11=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano5%'");
$result_tce11=mysql_num_rows($tce11);
$tce12=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano4%'");
$result_tce12=mysql_num_rows($tce12);
$tce13=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano3%'");
$result_tce13=mysql_num_rows($tce13);
$tce14=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano2%'");
$result_tce14=mysql_num_rows($tce14);
$tce15=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano1%'");
$result_tce15=mysql_num_rows($tce15);
$tce16=mysql_query("SELECT*FROM termo_compromisso WHERE dt_inicio LIKE '%$ano%'");
$result_tce16=mysql_num_rows($tce16);
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
             array($ano7 , $result_tce9 ),
             array($ano6 , $result_tce10 ),
             array($ano5 , $result_tce11 ),
             array($ano4 , $result_tce12 ), 
             array($ano3 , $result_tce13 ),
             array($ano2 , $result_tce14 ),
             array($ano1 , $result_tce15 ),
             array($ano , $result_tce16 )
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('TERMOS EMITIDOS PELA AGÊNCIA NOS ULTIMOS 8 ANOS'));
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