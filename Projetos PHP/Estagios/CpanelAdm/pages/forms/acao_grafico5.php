<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');
$nome = utf8_decode('NÃO OBRIGATÓRIO');

// $ano1 = date('Y');
$ano1 = 2019;
$ano2 = $ano1-1;
$ano3 = $ano1-2;
$ano4 = $ano1-3;
$ano5 = $ano1-4;

$sql1 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano1%' AND classificacao_termo LIKE '%$nome%'");
$result1 = mysql_num_rows($sql1);
$sql2 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano2%' AND classificacao_termo LIKE '%$nome%'");
$result2 = mysql_num_rows($sql2);
$sql3 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano3%' AND classificacao_termo LIKE '%$nome%'");
$result3 = mysql_num_rows($sql3);
$sql4 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano4%' AND classificacao_termo LIKE '%$nome%'");
$result4 = mysql_num_rows($sql4);
$sql5 = mysql_query("SELECT * FROM termo_compromisso WHERE dt_inicio LIKE '%$ano5%' AND classificacao_termo LIKE '%$nome%'");
$result5 = mysql_num_rows($sql5);
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
             array($ano5 , $result5),
             array($ano4 , $result4),
             array($ano3 , $result3),
             array($ano2 , $result2), 
             array($ano1 , $result1)
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('TERMOS NÃO OBRIGATÓRIOS DA AGENCIA NOS ULTIMOS 5 ANOS'));
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