<?php
require('../../../conn.php');
mysql_select_db('estagios');
$text = $_GET['term'];
	
	//Seleciona Todos os Registros da Tabela Empresas Iguais ao Valor Digitado no Campo e que existem na tabela termo_convenio 
  	$sql2 = mysql_query("SELECT * FROM empresas JOIN termo_convenio tconv ON ( tconv.cd_empresa = empresas.cd_empresa ) WHERE nome LIKE '%$text%' or cnpj LIKE '%$text%' ORDER BY nome ASC LIMIT 18");

$json = '[';
$first = true;
while($result = @mysql_fetch_object($sql2))
{
	//Enquanto Existir registros correspondentes ao valor será impresso no while
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$result->nome.'"}';
}
$json .= ']';

//Exibe os Resultados no Campo em Auto Complete
echo utf8_encode($json);

?>

