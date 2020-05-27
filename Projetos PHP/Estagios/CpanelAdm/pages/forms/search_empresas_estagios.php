<?php
require('../../../conn.php');
mysql_select_db('estagios');
$text = $_GET['term'];


$query = mysql_query("SELECT nome FROM empresas WHERE nome LIKE '%$text%' ORDER BY nome ASC LIMIT 8");

$json = '[';
$first = true;
while($result = @mysql_fetch_object($query))
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$result->nome.'"}';
}
$json .= ']';
echo utf8_encode($json);
?>

