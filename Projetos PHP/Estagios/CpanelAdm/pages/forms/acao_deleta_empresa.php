<?php
require('../../../conn.php');
mysql_select_db('estagios');

$nome = utf8_decode($_POST['nome1']);

$busca = mysql_query("SELECT * FROM empresas WHERE nome like '$nome'");

$result = mysql_fetch_array($busca);
$CD_EMPRESA = $result['CD_EMPRESA'];

$up = mysql_query("DELETE FROM empresas WHERE CD_EMPRESA ='$CD_EMPRESA'");


header("location:cadastro_empresas_agentes.php");
?>