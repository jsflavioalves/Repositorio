<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function redi() {
			alert("MATRÍCULA ATUALIZADA COM SUCESSO!");	
			window.location="termo_compromisso.php"
		}
	</script>
</head>
<body>
<?php
require('../../../conn.php');
mysql_select_db('estagios');

header("Content-type: text/html; charset=utf-8");

$nome_aluno = $_POST['nome_aluno'];
$matricula_antiga = $_POST['matricula_antiga'];
$nova_matricula = $_POST['nova_matricula'];

$update1 = mysql_query("UPDATE alunos SET matricula='$nova_matricula' WHERE matricula='$matricula_antiga'");

$busca_tce = mysql_query("SELECT * FROM termo_compromisso WHERE matricula_aluno LIKE '$matricula_antiga'");
while($array = mysql_fetch_array($busca_tce)){
	$update2 = mysql_query("UPDATE termo_compromisso SET matricula_aluno='$nova_matricula' WHERE matricula_aluno='$matricula_antiga'");
}

echo "<script> redi(); </script>";
?>

</body>
</html>

