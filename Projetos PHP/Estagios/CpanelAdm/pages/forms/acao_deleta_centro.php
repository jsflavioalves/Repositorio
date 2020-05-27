<?php
require('../../../conn.php');
mysql_select_db('estagios');
$CD_CENTRO=$_POST['CD_CENTRO'];

$up = mysql_query("DELETE FROM centros WHERE CD_CENTRO ='$CD_CENTRO'");
echo'<script type="text/javascript">alert("CURSSO EXCLUIDO COM SUCESSO!"); </script>';
header('location:centros.php')
?>