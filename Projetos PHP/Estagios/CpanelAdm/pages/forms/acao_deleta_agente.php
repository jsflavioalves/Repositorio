<?php
require('../../../conn.php');
mysql_select_db('estagios');
$CD_AGENTE=$_POST['CD_AGENTE'];

$up = mysql_query("DELETE FROM agentes WHERE CD_AGENTE='$CD_AGENTE'");
header("location:agente.php");
?>