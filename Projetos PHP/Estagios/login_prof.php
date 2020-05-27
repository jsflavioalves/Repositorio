<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/prof_orientador.php',3000");}</script>
</head>
<body>
<?php 
require("conn.php"); 
mysql_select_db('estagios');
$nome = $_POST['nome'];
$siape = $_POST['siape'];

$consulta = mysql_query("SELECT * FROM termo_compromisso WHERE prof_orientador LIKE '$nome' and siape LIKE '$siape'");

$result = @mysql_num_rows($consulta);

if ($result != 0) {
	session_start();
	$_SESSION['sesaosiape'] = $siape;
	header("location:CpanelProfessor/index.php");
	
}if ($result == 0) {
	echo "<script>alert('ERRO NO LOGIN! TENTE NOVAMENTE!'); </script>";
 	echo "<script>direct(); </script>";
}
?>
</body>
</html>

