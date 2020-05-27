<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_setor=$_POST['id_setor'];

$up = mysql_query("DELETE FROM Setor WHERE id_setor ='$id_setor'");
echo'<script type="text/javascript">alert("SETOR EXCLUIDO COM SUCESSO!"); </script>';
header('location:setor.php')
?>