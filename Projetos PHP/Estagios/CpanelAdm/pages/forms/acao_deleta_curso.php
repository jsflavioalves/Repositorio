<?php
require('../../../conn.php');
mysql_select_db('estagios');
$CD_CURSO=$_POST['CD_CURSO'];

$up = mysql_query("DELETE FROM cursos WHERE id_curso='$CD_CURSO'");
echo'<script type="text/javascript">alert("CURSSO EXCLUIDO COM SUCESSO!"); </script>';
header('location:cursos.php')
?>