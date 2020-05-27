<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

$ano = date('Y');
$sql1 = mysql_query("SELECT t_emp.nome AS tipo_emp, Count( tc.cd_empresa ) AS quant_empresa FROM termo_convenio tc LEFT JOIN empresas emp ON ( tc.cd_empresa = emp.cd_empresa ) LEFT JOIN tipo_empresa t_emp ON ( emp.CD_TIPO = t_emp.id_tipo_empresa ) WHERE SUBSTRING( dt_inicio, 7, 4 ) = '$ano' GROUP BY t_emp.nome ORDER BY t_emp.nome");

$i = 1;
while($array = mysql_fetch_array($sql1)){
	$qtd = $array['quant_empresa'];
      $tipo = $array['tipo_emp'];
      if($tipo == ""){
            $tipo = "OUTROS";
      }

	$valor[$i] = $qtd;
      $nome[$i] = $tipo; 

      $i++;
}     

	$data = array(
                  array($nome[1] , $valor[1]),
                  array($nome[2] , $valor[2]),
                  array($nome[3] , $valor[3]),
                  array($nome[4] , $valor[4]),
                  array($nome[5] , $valor[5]),
                  array($nome[6] , $valor[6]),
                  array($nome[7] , $valor[7]),
                  array($nome[8] , $valor[8]),
                  array($nome[9] , $valor[9]),
                  array($nome[10] , $valor[10]),
                  array($nome[11] , $valor[11]),
                  array($nome[12] , $valor[12]),
                  array($nome[13] , $valor[13]),
             );  
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(1000 , 900);    
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode("NÚMERO DE CONVÊNIOS \n POR TIPO DE CONCEDENTE - ".$ano));
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("pie");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType('text-data-single');
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
$plot->SetDataColors(array('SkyBlue', 'red', 'green', 'black', 'orange', 'blue', 'purple', 'yellow', 'brown', 'gray', 'pink', 'gold', 'white'));

$plot->SetShading(1);
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel(utf8_decode("Fonte: Banco de Dados da Agecia de Estágios da UFC"));
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(3);
$plot->SetAxisFontSize(3);
// -----------------------------------------------
foreach ($data as $row)
  $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(30, 30);
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>