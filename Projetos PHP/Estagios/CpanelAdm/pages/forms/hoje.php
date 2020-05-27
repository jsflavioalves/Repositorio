<?php  
require('../../../conn.php');
mysql_select_db('estagios');

$id_errado = "177";
$id_correto = "134";

$busca = mysql_query("SELECT * FROM termo_compromisso WHERE id_curso LIKE '$id_errado'");
while($array = mysql_fetch_array($busca)){
  $up = mysql_query("UPDATE termo_compromisso SET id_curso='$id_correto' WHERE id_curso LIKE '$id_errado'");
}
  echo "OK!";

?>  