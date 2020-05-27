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
$cnpj = $_POST['cnpj'];
$senha = $_POST['senha'];

$consulta = mysql_query("SELECT * FROM usuarios_agencia WHERE login LIKE '$cnpj' and senha LIKE '$senha'");
$result = mysql_num_rows($consulta);

$array = mysql_fetch_array($consulta);
$tipo = $array['tipo_usuario'];
$permissao = $array['status'];


if ($result != 0) {
	if($permissao == "Autorizado"){
		if($tipo == "empresa"){
			session_start();
			$_SESSION['cnpj'] = $cnpj;
			header("location:CpanelEmpresa/index.php");
		}
	}else if($permissao == "Pendente"){
		echo "<script>alert('SEU CADASTRO ESTÁ PENDENTE DE AUTORIZAÇÃO, LIGUE: (85) 3366-7413'); </script>";
 		echo "<script>direct(); </script>";
	}
} else if ($result == 0) {
	echo "<script>alert('ERRO NO LOGIN! TENTE NOVAMENTE!'); </script>";
 	echo "<script>direct(); </script>";

 	echo "$cnpj";
 	echo "$senha";
}
?>
</body>
</html>

