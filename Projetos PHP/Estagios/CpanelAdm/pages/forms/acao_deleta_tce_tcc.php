<?php
require('../../../conn.php');
mysql_select_db('estagios');

$cd_tce_del=$_POST['tce_aluno_tcc_del'];
$cd_tcc_del=$_POST['codigo_tcc'];

$down = mysql_query("DELETE FROM termo_compromisso WHERE cd_tcc LIKE '$cd_tcc_del' and id_termo_compromisso LIKE '$cd_tce_del'");
$up2 = mysql_query("DELETE FROM horario_variado WHERE id_termo='$cd_tce_del'");

header("location:acoes_tcc.php");

?>