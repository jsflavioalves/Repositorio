<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_user = $_POST['id_user'];
$editar_nome = $_POST['editar_nome'];
$editar_login = utf8_decode($_POST['editar_login']);

$up = mysql_query("UPDATE usuarios_agencia SET nome = '$editar_nome', login = '$editar_login' WHERE id_user = '$id_user'");
header("location:profile.php");
?>