<?php
require('../../../conn.php');
//mysql_select_db('estagios');
$text = $_GET['term'];

//$conn=mysql_pconnect('dbcom.ufc.br:32306','estagios_usr','v2TA?hn!Hv56');
$query = mysqli_query($conn,"SELECT nome, matricula FROM alunos WHERE nome LIKE '%$text%' or matricula like '%$text%' GROUP BY nome ORDER BY nome ASC LIMIT 25");

//$query = "SELECT nome FROM empresas WHERE nome LIKE '%$text%' ORDER BY nome ASC";

$json = '[';
$first = true;
while($result = @mysql_fetch_object($query)) 
/* if ($result = @mysql_fetch_object($query)) */
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$result->nome.'"}';
    confirm($json);
}
$json .= ']';
echo utf8_encode($json);
?>

