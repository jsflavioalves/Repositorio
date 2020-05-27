<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

$ano = date('Y');
$sql1 = mysql_query("SELECT emp.nome AS nome_empresa, Count(tc.nome) AS qtd, classificacao_termo FROM termo_compromisso tc LEFT JOIN empresas emp ON (tc.nome=emp.CD_EMPRESA) WHERE SUBSTRING(dt_inicio, 7, 4) = '$ano' AND classificacao_termo != 'OBRIGATORIO' GROUP BY emp.nome ORDER BY qtd DESC LIMIT 0,10");

$i = 1;
while($array = mysql_fetch_array($sql1)){
	$qtd = $array['qtd'];
      
	$valor[$i] = $qtd;
	$i++;
} 
	$data = array(
             array("1" , $valor[1]),
             array("2" , $valor[2]),
             array("3" , $valor[3]),
             array("4" , $valor[4]),
             array("5" , $valor[5]),
             array("6" , $valor[6]),
             array("7" , $valor[7]),
             array("8" , $valor[8]),
             array("9" , $valor[9]),
             array("10" , $valor[10])
             );  

# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('TOP 10 NÃO OBRIGATÓRIO - '.$ano));
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel(utf8_decode("Fonte: Banco de Dados da Agecia de Estágios da UFC"));
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