<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_grupo=$_POST['id_grupo'];
$nome_grupo= utf8_decode($_POST['nome_grupo']);
$nome_grupo = mb_strtoupper($nome_grupo);

$up = mysql_query("UPDATE grupo_vagas SET descricao_grupo='$nome_grupo' WHERE id_grupo ='$id_grupo'");
header("location:grupo.php");
?>