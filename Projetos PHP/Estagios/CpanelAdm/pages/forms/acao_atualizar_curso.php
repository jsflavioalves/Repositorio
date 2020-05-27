<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_curso=$_POST['id_curso'];
$nome_curso= utf8_decode($_POST['nome_curso']);
$nome_curso= mb_strtoupper($nome_curso);
$id_centro = utf8_decode($_POST['centro']);

$up = mysql_query("UPDATE cursos SET curso='$nome_curso', id_centro='$id_centro' WHERE id_curso ='$id_curso'");
header("location:cursos.php");
?>