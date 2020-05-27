<?php
require('../../../conn.php');
mysql_select_db('estagios');
$id_convenios_arquivados=$_POST['id_convenios_arquivados'];
$dt_abertura=$_POST['dt_abertura'];
$processo=$_POST['processo'];
$interessado=utf8_decode($_POST['interessado']);
$saida_procuradoria=$_POST['saida_procuradoria'];
$retorno_procuradoria=$_POST['retorno_procuradoria'];
$saida_prex=$_POST['saida_prex'];
$retorno_prex=$_POST['retorno_prex'];
$pendencia=utf8_decode($_POST['pendencia']);
$data_arquivamento=utf8_decode($_POST['data_arquivamento']);
$observacao=utf8_decode($_POST['observacao']);
$status=utf8_decode($_POST['status']);

$up = mysql_query("UPDATE convenios_arquivados SET dt_abertura='$dt_abertura', processo='$processo', interessado='$interessado', saida_procuradoria='$saida_procuradoria', retorno_procuradoria='$retorno_procuradoria', saida_prex='$saida_prex',retorno_prex='$retorno_prex',pendencia='$pendencia',data_arquivamento='$data_arquivamento',observacao='$observacao', status='$status' WHERE id_convenios_arquivados='$id_convenios_arquivados'");

header("location:convenios_arquivados.php");
?>