<?php
require('conn.php');
mysql_select_db('estagios');

$id_professor2 = $_POST['id_professor2'];
$telefone2 = utf8_decode($_POST['editar_telefone']);
$email2 = utf8_decode($_POST['editar_email2']);
$email2 = mb_strtoupper($email2);


//ATUALIZAÇÃO DOS DADOS DO PROFESSOR
$up = mysql_query("UPDATE professor_orientador SET fone = '$telefone2', email = '$email2' WHERE id_professor = '$id_professor2'");

header("location:profile.php");
?>