<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_agente = utf8_decode($_POST['cd_agente']);
$nm_agente = utf8_decode($_POST['nm_agente']);
$nm_agente = mb_strtoupper($nm_agente);
$dt_ini = utf8_decode($_POST['dt_ini']);
$dt_fim = utf8_decode($_POST['dt_fim']);
$obs = utf8_decode($_POST['obs']);
$obs = mb_strtoupper($obs);

$up = mysql_query("UPDATE agentes SET NM_AGENTE='$nm_agente', DT_INI='$dt_ini',DT_FIM='$dt_fim',TX_OBS='$obs' WHERE CD_AGENTE='$id_agente'");
echo'<script type="text/javascript">alert("Atualizado com sucesso!");</script>';
header("location:agente.php");
?>