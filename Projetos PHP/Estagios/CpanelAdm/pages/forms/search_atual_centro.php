<?php
require('../../../conn.php');
mysql_select_db('estagios');
$text = $_GET['term'];

//$conn=mysql_pconnect('dbcom.ufc.br:32306','estagios_usr','v2TA?hn!Hv56');
$query = mysql_query("SELECT NM_CENTRO FROM centros WHERE NM_CENTRO  LIKE '%$text%' ORDER BY NM_CENTRO ASC LIMIT 15");

//$query = "SELECT nome FROM empresas WHERE nome LIKE '%$text%' ORDER BY nome ASC";

$json = '[';
$first = true;
while($result = @mysql_fetch_object($query))
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$result->NM_CENTRO .'"}';
}
$json .= ']';
echo utf8_encode($json);
?>

