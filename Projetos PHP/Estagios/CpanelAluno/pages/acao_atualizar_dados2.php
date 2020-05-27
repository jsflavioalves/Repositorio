<?php
require('conn.php');
mysql_select_db('estagios');
$id_aluno = $_POST['matricula'];
$email = utf8_decode($_POST['editar_email']);
$email = mb_strtoupper($email);
$rg = utf8_decode($_POST['editar_rg']);
$nomemae = utf8_decode($_POST['editar_nome_mae']);
$telefone = utf8_decode($_POST['editar_telefone']);
$endereco = utf8_decode(strtoupper($_POST['editar_endereco']));
$cidade = utf8_decode(strtoupper($_POST['editar_cidade']));
$uf = utf8_decode(strtoupper($_POST['editar_uf']));

//ATUALIZACAO DOS DADOS DO ALUNO QUANDO TEM TODOS OS DADOS
$up = mysql_query("UPDATE alunos SET rg='$rg', nome_mae='$nomemae', telefone = '$telefone', email = '$email', endereco = '$endereco', cidade = '$cidade', uf = '$uf' WHERE id_aluno LIKE '$id_aluno'");
header("location:profile.php");
?>