<?php 
include("../../../conn.php");
mysql_select_db('estagios');
session_start();
$escolha_dia = $_POST['dia'];
$mes = $_SESSION['escolha_mes'];
$ano = date('Y');

$excluir = mysql_query("DELETE FROM vagas_agend WHERE dia LIKE '$escolha_dia' AND mes LIKE '$mes' AND ano LIKE '$ano'");

header('location:gerenciar_vagas_agendamento.php');
?>