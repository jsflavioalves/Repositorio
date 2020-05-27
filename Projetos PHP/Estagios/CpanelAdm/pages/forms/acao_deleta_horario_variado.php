<?php
require('../../../conn.php');
mysql_select_db('estagios');
if(isset($_POST['btn_del2'])){

$id_termo = $_POST['id_tce_hv'];

$up = mysql_query("DELETE FROM horario_variado WHERE id_termo='$id_termo'");

header("location:termo_compromisso.php");
}
?>