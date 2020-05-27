
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type="text/javascript">function direct(){setTimeout("window.location='http://www.estagios.ufc.br/siges/public_html/',3000");}</script>
</head>
<body>
<?php 

require('conn.php');
mysql_select_db('estagios');

// INÍCIO CADASTRO DO PROFESSOR
$nome_professor = utf8_decode(strtoupper($_POST['nome_professor']));
$cpf = $_POST['cpf'];
$siape = $_POST['siape'];
$fone = $_POST['fone'];
$email = utf8_decode(strtoupper($_POST['email']));
$lotacao = utf8_decode(strtoupper($_POST['lotacao']));



$consulta = mysql_query("SELECT * FROM professor_orientador WHERE siape LIKE '$siape'");
$conta = mysql_num_rows($consulta);

if($conta != 0){
	echo'<script type="text/javascript">alert("PROFESSOR JÁ CADASTRADO COM ESSE SIAPE!");</script>';	
    echo "<script>direct(); </script>";
} else if($conta == 0){
	$inserir_usuario2 = mysql_query("INSERT INTO usuarios_agencia VALUES('', '$nome_professor', '$siape', '$cpf', 'professor', '', 'user_padrao.jpg', 'Pendente')");
	$inserir_professor = mysql_query("INSERT INTO professor_orientador VALUES('', '$nome_professor', '$siape', '$fone' ,'$email', '$lotacao', '$cpf')");

	echo'<script type="text/javascript">alert("Professor(a) cadastrado(a) com sucesso, você já pode realizar seu primeiro login!");</script>';	
    echo "<script>direct(); </script>";
}
// FIM CADASTRO DO PROFESSOR
?>
</body>
</html>
