<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_setor=$_POST['id_setor'];
$nome_setor= utf8_decode($_POST['nome_setor']);
$nome_setor = mb_strtoupper($nome_setor);

$up = mysql_query("UPDATE Setor SET nome_setor='$nome_setor' WHERE id_setor ='$id_setor'");
header("location:setor.php");
?>