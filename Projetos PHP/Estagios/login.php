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
// mysql_select_db('estagios');
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];

/* $consulta = mysqli_query("SELECT * FROM usuarios_agencia WHERE login LIKE '$matricula' and senha LIKE '$cpf'"); */
$consulta = mysqli_query($conn,"SELECT * FROM usuarios_agencia WHERE login LIKE '$matricula'");
$result = mysqli_num_rows($consulta);

$array = mysqli_fetch_array($consulta);
$tipo = $array['tipo_usuario'];
$permissao = $array['status'];

if ($result != 0) {
	if($permissao == "Autorizado"){
		if($tipo == "administrador"){
			session_start();
			$_SESSION['sesaomatricula'] = $matricula;
			$_SESSION['sesaocpf'] = $cpf;
			header("location:CpanelAdm/index.php");
		} else if($tipo == "aluno"){
			session_start();
			$_SESSION['sesaomatricula'] = $matricula;
			$_SESSION['sesaocpf'] = $cpf;
			header("location:CpanelAluno/index.php");
		}
	} else if($permissao == "Pendente"){
		echo "<script>alert('SEU CADASTRO ESTÃ� PENDENTE DE AUTORIZAÃ‡ÃƒO, AGUARDE O PRAZO DE 72 HORAS!'); </script>";
 		echo "<script>direct(); </script>";
	}
} else if ($result == 0) {
	echo "<script>alert('ERRO NO LOGIN! TENTE NOVAMENTE!'); </script>";
 	echo "<script>direct(); </script>";

 	echo "$matricula";
 	echo "$cpf";
}
?>
</body>
</html>

