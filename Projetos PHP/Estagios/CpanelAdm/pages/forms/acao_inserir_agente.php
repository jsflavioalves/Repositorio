<?php
require('../../../conn.php');
mysql_select_db('estagios');
$nm_agente = utf8_decode($_POST['nm_agente']);
$nm_agente = mb_strtoupper($nm_agente);
$dt_ini = utf8_decode($_POST['dt_ini']);
$dt_fim = utf8_decode($_POST['dt_fim']);
$obs = utf8_decode($_POST['obs']);
$obs = mb_strtoupper($obs);

$up = mysql_query("INSERT INTO agentes VALUES('','$nm_agente','$dt_ini','$dt_fim','$obs')");

header("location:agente.php");
?>