
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
$curso=utf8_decode(strtoupper($_POST['curso']));
$instituicao=utf8_decode(strtoupper($_POST['instituicao']));
$setor=utf8_decode(strtoupper($_POST['setor']));
$nome=utf8_decode(strtoupper($_POST['nome']));
$matricula=utf8_decode($_POST['matricula']);
$cpf=utf8_decode($_POST['cpf']);
$rg=utf8_decode($_POST['rg']);
$mae=utf8_decode(strtoupper($_POST['mae']));
$telefone=utf8_decode($_POST['telefone']);
$email=utf8_decode($_POST['email']);
$endereco=utf8_decode(strtoupper($_POST['endereco']));
$cidade=utf8_decode(strtoupper($_POST['cidade']));
$uf=utf8_decode(strtoupper($_POST['uf']));
	
	$consulta_id = mysql_query("SELECT * FROM cursos WHERE curso = '$curso'");
	$conta = mysql_num_rows($consulta_id);

	if($conta == 0){
		echo '<script> alert("CURSO NÃO EXISTENTE!"); </script>';
		echo "<script>direct(); </script>";
	} else if($conta != 0){
		$dados = @mysql_fetch_array($consulta_id);
		$id_curso = $dados['id_curso'];
		

		$up = mysql_query("INSERT INTO alunos VALUES('','$nome', '$cpf','$rg','$matricula','$id_curso', '$curso','$instituicao', '$setor','EXTERNO', '$mae', '$telefone', '$email' ,'$endereco', '$cidade','$uf')");
	if ($up) { echo'<script type="text/javascript">alert("Cadastrado com sucesso, você ja pode realizar a consulta!");</script>';
	} elseif (!$up) {$erro = mysql_error(); echo "Ocorreu o seguinte erro: ". '"'. $erro. '"';} 
   		echo "<script>direct(); </script>";
	}

?>
</body>
</html>
