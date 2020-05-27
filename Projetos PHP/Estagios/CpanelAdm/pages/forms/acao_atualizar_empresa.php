<?php
require('../../../conn.php');
mysql_select_db('estagios');
$CD_EMPRESA=$_POST['CD_EMPRESA'];
$nome=utf8_decode($_POST['nome']);
$cnpj=$_POST['cnpj'];
$endereco = utf8_decode($_POST['endereco']);
$representante = utf8_decode($_POST['representante']);
$uf = utf8_decode($_POST['uf']);
$tel=$_POST['tel'];
$email=$_POST['email'];
$cep=$_POST['cep'];
$tipo_empresa=utf8_decode($_POST['tipo_empresa']);
$agente=utf8_decode($_POST['agente']);

$up = mysql_query("UPDATE empresas SET nome='$nome', cnpj='$cnpj', endereco='$endereco', cidade_uf='$uf', cep='$cep', tel='$tel',email='$email', CD_TIPO='$tipo_empresa',AGENTE_INTEGRADOR='$agente', representante='$representante' WHERE CD_EMPRESA='$CD_EMPRESA'");
header("location:cadastro_empresas_agentes.php");
?>