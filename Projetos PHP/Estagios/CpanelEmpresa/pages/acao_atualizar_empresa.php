<?php
require('conn.php');
mysql_select_db('estagios');
$id=$_POST['id'];
$nome=utf8_decode(strtoupper($_POST['nome_empresa']));
$cnpj=$_POST['cnpj'];
$endereco=utf8_decode(strtoupper($_POST['endereco']));
$tel=$_POST['fone'];
$email=$_POST['email'];
//$cep=$_POST['cep'];
//$tipo_empresa=utf8_decode($_POST['tipo_empresa']);
//$agente=utf8_decode($_POST['agente']);


$up = mysql_query("UPDATE empresas SET nome='$nome', cnpj='$cnpj', endereco='$endereco', tel='$tel', email='$email' WHERE CD_EMPRESA='$id'");
header("location:../index.php");
?>