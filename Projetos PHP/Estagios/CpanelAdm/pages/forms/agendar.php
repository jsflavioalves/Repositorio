<?php 
include("../../../conn.php");
mysql_select_db('estagios');

$matricula_aluno = $_POST['matricula_aluno'];
$escolha_dia = $_POST['escolha_dia'];
$escolha_mes = $_POST['escolha_mes'];
$escolha_ano = date('Y');
$escolha_hora = $_POST['escolha_hora'];

$busca_aluno = mysql_query("SELECT * FROM alunos WHERE matricula LIKE '$matricula_aluno'");
$array = mysql_fetch_array($busca_aluno);
$nome_aluno = $array['nome'];


$agendar = mysql_query("INSERT INTO agendamentos VALUES('', '$matricula_aluno', '$nome_aluno', '$escolha_dia/$escolha_mes/$escolha_ano', '$escolha_hora')");

$x = 1;
$atualizar = mysql_query("UPDATE vagas_agend SET qt_vagas=qt_vagas-'$x' WHERE dia='$escolha_dia' AND hora='$escolha_hora'");

header("location:realizar_agendamento.php");

?>