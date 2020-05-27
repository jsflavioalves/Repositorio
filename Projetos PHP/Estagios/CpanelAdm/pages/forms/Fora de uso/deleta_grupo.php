<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_grupo=$_POST['id_grupo'];

$up = mysql_query("DELETE FROM grupo_vagas WHERE id_grupo ='$id_grupo'");

header('location:grupo.php')
?>