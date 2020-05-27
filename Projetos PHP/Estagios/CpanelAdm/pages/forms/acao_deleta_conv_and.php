<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btna'])){

$nome = utf8_decode($_POST['nome1']);

$cosul = mysql_query("SELECT * FROM convenios_andamento WHERE interessado like '$nome'");

$result = mysql_fetch_array($cosul);
$id_convenios_andamento = $result["id_convenios_andamento"];

$up = mysql_query("DELETE FROM convenios_andamento WHERE id_convenios_andamento like '$id_convenios_andamento'");

}
header("location:convenios_andamento.php");
?>