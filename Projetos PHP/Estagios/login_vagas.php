<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/',3000");}</script>
</head>
<body>
<?php 

require("conn.php"); 
mysql_select_db('estagios');
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];

$consulta = mysql_query("SELECT * FROM usuarios_agencia WHERE login LIKE '$matricula' and senha LIKE '$cpf'");
$result = mysql_num_rows($consulta);

$array = mysql_fetch_array($consulta);
$tipo = $array['tipo_usuario'];

if ($result != 0) {
	/* if($tipo == "aluno"){ */
		session_start();
		$_SESSION['sesaomatricula'] = $matricula;
		$_SESSION['sesaocpf'] = $cpf;
		header("location:MostraVagas.php");
	/* } */
} else if ($result == 0) {
	echo "<script>alert('ERRO NO LOGIN! TENTE NOVAMENTE!'); </script>";
 	echo "<script>direct(); </script>";

 	echo "$matricula";
 	echo "$cpf";
}
?>
</body>
</html>

