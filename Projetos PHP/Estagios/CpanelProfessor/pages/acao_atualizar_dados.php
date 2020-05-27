<?php
require('conn.php');
mysql_select_db('estagios');
$id_professor = $_POST['id_professor'];
$cpf = utf8_decode($_POST['editar_cpf']);
$siape = utf8_decode($_POST['editar_siape']);
$telefone = utf8_decode($_POST['editar_telefone']);
$nome = utf8_decode($_POST['editar_nome']);
$nome = mb_strtoupper($nome);
$lotacao = utf8_decode($_POST['editar_lotacao']);
$lotacao = mb_strtoupper($lotacao);
$email = utf8_decode($_POST['editar_email']);
$email = mb_strtoupper($email);

//ATUALIZAÇÃO DOS DADOS DO PROFESSOR QUANDO ESTA FALTANNDO DADOS
$up = mysql_query("UPDATE professor_orientador SET siape = '$siape', nome = '$nome', fone = '$telefone', lotacao = '$lotacao', email = '$email', cpf = '$cpf' WHERE id_professor = '$id_professor'");
header("location:profile.php");
?>