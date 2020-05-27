<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btna'])){

$nome = utf8_decode($_POST['nome1']);

$cosul = mysql_query("SELECT * FROM convenios_arquivados WHERE interessado like '$nome'");

$result = mysql_fetch_array($cosul);
$id_convenios_arquivados = $result["id_convenios_arquivados"];

$up = mysql_query("DELETE FROM convenios_arquivados WHERE id_convenios_arquivados like '$id_convenios_arquivados'");

}
header("location:convenios_arquivados.php");
?>