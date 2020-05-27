<?php
require('../../../conn.php');
mysql_select_db('estagios');

$id_professor=$_POST['id_professor'];
$nome= utf8_decode($_POST['nome']);
$nome = mb_strtoupper($nome);
$siape= utf8_decode($_POST['siape']);
$telefone= utf8_decode($_POST['telefone']);
$email= utf8_decode($_POST['email']);
$email = mb_strtoupper($email);
$lotacao= utf8_decode($_POST['lotacao']);
$lotacao = mb_strtoupper($lotacao);
$cpf= utf8_decode($_POST['cpf']);

$buscasiape = mysql_query("SELECT * FROM professor_orientador WHERE id_professor LIKE '$id_professor'");
$siapeant = mysql_fetch_object($buscasiape);


$up2 = mysql_query("UPDATE termo_compromisso SET prof_orientador = '$nome', siape = '$siape' WHERE siape = '$siapeant->siape'");
$up3 = mysql_query("UPDATE termo_c_coletivo SET prof_orientador = '$nome', siape = '$siape' WHERE siape = '$siapeant->siape'");
$up4 = mysql_query("UPDATE usuarios_agencia SET nome = '$nome', login = '$siape', senha = '$cpf' WHERE login = '$siapeant->siape'");

$up = mysql_query("UPDATE professor_orientador SET nome ='$nome', siape = '$siape', fone = '$telefone', email = '$email', lotacao = '$lotacao', cpf = '$cpf' WHERE id_professor ='$id_professor'");



header("location:professores.php");
?>