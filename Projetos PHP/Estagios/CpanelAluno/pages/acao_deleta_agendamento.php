<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function ok() {
			alert("AGENDAMENTO CANCELADO COM SUCESSO!");
			location.href="realizar_agendamento.php";
		}

	</script>
</head>
<body>

</body>
</html>

<?php
header("Content-type: text/html; charset=utf-8");
require('conn.php');
mysql_select_db('estagios');

$id_agendamento = $_POST['id_agendamento'];
$data = $_POST['data'];
$partes = explode("/", $data);
$dia = $partes[0];
$mes = $partes[1];
$ano = $partes[2];
$hora = $_POST['hora'];

$x=1;
$atualizar = mysql_query("UPDATE vagas_agend SET qt_vagas = qt_vagas+'$x' WHERE dia = '$dia' AND mes = '$mes' AND ano = '$ano' AND hora = '$hora'");
$deletar = mysql_query("DELETE FROM agendamentos WHERE id_agendamento = '$id_agendamento'");
echo "<script> ok(); </script>"; 
?>