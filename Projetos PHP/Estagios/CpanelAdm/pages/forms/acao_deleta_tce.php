<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btndeleta'])){

$id_termo_compromisso=$_POST['tce_del'];

$up = mysql_query("DELETE FROM termo_compromisso WHERE id_termo_compromisso='$id_termo_compromisso'");
$up2 = mysql_query("DELETE FROM horario_variado WHERE id_termo='$id_termo_compromisso'");

header("location:termo_compromisso.php");
}
?>