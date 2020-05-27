<?php
require('../../../conn.php');
mysql_select_db('estagios');
$text = $_GET['term'];

$query = mysql_query("SELECT * FROM termo_c_coletivo WHERE dt_cadastro LIKE '%$text%' ORDER BY dt_cadastro ASC LIMIT 10");

$json = '[';
$first = true;
while($result = @mysql_fetch_object($query))
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$result->dt_cadastro.'"}';
}
$json .= ']';
echo utf8_encode($json);
?>

