<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_preceptor=$_POST['id_preceptor'];

$up2 = mysql_query("DELETE FROM preceptores WHERE id_preceptor LIKE '$id_preceptor'");

echo'<script type="text/javascript">alert("PRECEPTOR EXCLUIDO COM SUCESSO!"); </script>';
header('location:preceptores.php')
?>