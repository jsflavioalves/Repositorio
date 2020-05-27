
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">function direct(){setTimeout("window.location='termo_compromisso.php',3000");}</script>
</head>
<body>
<?php 

require('../../../conn.php');
mysql_select_db('estagios');
$curso=utf8_decode($_POST['curso']);
$nome=utf8_decode($_POST['nm']);
$matricula=utf8_decode($_POST['matricula']);
$cpf=utf8_decode($_POST['cpf']);
$rg=utf8_decode($_POST['rg']);

	$up = mysql_query("UPDATE alunos SET nome='$nome', cpf='$cpf',rg='$rg',matricula='$matricula',curso='$curso',  WHERE nome='$nome'");
    echo'<script type="text/javascript">alert("Atualizado com sucesso!");</script>';	
    echo "<script>direct(); </script>";

?>
</body>
</html>
