<?php
// requisição da classe PHPlot
require_once 'phplot.php';
require('../../../conn.php');
mysql_select_db('estagios');

$ano = date('Y');
$x = 1;
while($x <= 12){
      if($x <= 9){
            $sql1 = mysql_query("SELECT * FROM termo_convenio WHERE dt_inicio LIKE '%0$x-$ano%' OR dt_inicio LIKE '%0$x/$ano%'");
            $conta = mysql_num_rows($sql1);
      } else if($x > 9){
            $sql1 = mysql_query("SELECT * FROM termo_convenio WHERE dt_inicio LIKE '%$x-$ano%' OR dt_inicio LIKE '%$x/$ano%'");
            $conta = mysql_num_rows($sql1);
      }

	$valor[$x] = $conta;
      $x++;

}
	$data = array(
                  array("JAN" , $valor[1]),
                  array("FEV" , $valor[2]),
                  array("MAR" , $valor[3]),
                  array("ABR" , $valor[4]),
                  array("MAI" , $valor[5]),
                  array("JUN" , $valor[6]),
                  array("JUL" , $valor[7]),
                  array("AGO" , $valor[8]),
                  array("SET" , $valor[9]),
                  array("OUT" , $valor[10]),
                  array("NOV" , $valor[11]),
                  array("DEZ" , $valor[12])
             );  

# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);   
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(utf8_decode('TERMOS EMITIDOS PELA AGÊNCIA - '.$ano));
# Precisão de uma casa decimal
$plot->SetPrecisionY(0);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("linepoints");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);

// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel(utf8_decode("Fonte: Banco de Dados da Agência de Estágios da UFC"));
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);

// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------

// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>