<?php
require('conn.php');
mysql_select_db('estagios');
$id_aluno = $_POST['matricula'];
$cpf = utf8_decode($_POST['editar_cpf']);
$rg = utf8_decode($_POST['editar_rg']);
$matricula = utf8_decode($_POST['editar_matricula']);
$nome_mae = utf8_decode(strtoupper($_POST['editar_nome_mae']));
$curso = utf8_decode(strtoupper($_POST['editar_curso']));
$telefone = utf8_decode($_POST['editar_telefone']));
$email = utf8_decode($_POST['editar_email']);
$email = mb_strtoupper($email);
$endereco = utf8_decode(strtoupper($_POST['editar_endereco']));
$cidade = utf8_decode(strtoupper($_POST['editar_cidade']));
$uf = utf8_decode(strtoupper($_POST['editar_uf']));

//ATUALIZAÇÃO DOS DADOS DOS ALUNOS QUANDO ESTA FALTANNDO DADOS
$up = mysql_query("UPDATE alunos SET cpf = '$cpf', rg = '$rg', matricula = '$matricula', nome_mae = '$nome_mae', curso = '$curso', telefone = '$telefone', email = '$email', endereco = '$endereco', cidade = '$cidade', uf = '$uf' WHERE id_aluno = '$id_aluno'");
header("location:profile.php");
?>