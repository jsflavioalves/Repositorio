<?php
require('../../../conn.php');
mysql_select_db('estagios');

$id_preceptor=$_POST['id_preceptor'];
$nome= utf8_decode($_POST['nome']);
$nome = mb_strtoupper($nome);
$cpf= utf8_decode($_POST['cpf']);

$buscacpf = mysql_query("SELECT * FROM preceptores WHERE id_preceptor LIKE '$id_preceptor'");
$cpfant = mysql_fetch_object($buscacpf);


$up2 = mysql_query("UPDATE termo_compromisso SET preceptor = '$nome', cpf_preceptor = '$cpf' WHERE cpf = '$cpfant->cpf'");
$up3 = mysql_query("UPDATE termo_c_coletivo SET preceptor = '$nome', cpf_preceptor = '$cpf' WHERE cpf = '$cpfant->cpf'");

$up = mysql_query("UPDATE preceptores SET nome ='$nome', cpf = '$cpf' WHERE id_preceptor ='$id_preceptor'");

header("location:preceptores.php");
?>