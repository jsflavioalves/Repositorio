<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btna'])){

$nome = utf8_decode($_POST['nome1']);

$cosul = mysql_query("SELECT * FROM convenios_pendentes WHERE interessado like '$nome'");

$result = mysql_fetch_array($cosul);
$id_convenios_pendentes = $result["id_convenios_pendentes"];
$arquivoapaga = $result['arquivo'];
}

if($arquivoapaga != ""){
	@unlink("convenio_pendentes/$arquivoapaga");
}

$up = mysql_query("DELETE FROM convenios_pendentes WHERE id_convenios_pendentes like '$id_convenios_pendentes'");


header("location:convenios_pendentes.php");
?>