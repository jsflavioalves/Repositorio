<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_centro=$_POST['id_centro'];
$nome_centro= utf8_decode($_POST['nome_centro']);
$nome_centro = mb_strtoupper($nome_centro);

$up = mysql_query("UPDATE centros SET NM_CENTRO='$nome_centro' WHERE CD_CENTRO ='$id_centro'");
header("location:centros.php");
?>